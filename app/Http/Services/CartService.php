<?php


namespace App\Http\Services;

use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));

        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {
        try {
            DB::beginTransaction();
    
            $carts = Session::get('carts');
    
            if (is_null($carts))
                return false;
    
            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]);
    
            $this->infoProductCart($carts, $customer->id);
    
            DB::commit();
            Session::flash('success', 'Đơn hàng đã được đặt thành công. Vui lòng kiểm tra email để xem xác nhận đơn hàng.');
    
            OrderConfirmationMail::dispatch($customer);

            // Send the email immediately
            Mail::to($customer->email)->send(new OrderConfirmationMail($customer));
    
    
            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            // Handle any errors and return an appropriate response
            return false;
        }
    
        return true;
    }
    

    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price != 0 ? $product->price : $product->price
            ];
        }
    
        Cart::insert($data); // Lưu thông tin sản phẩm vào cơ sở dữ liệu
    
        // Xóa sản phẩm khỏi giỏ hàng sau khi đã lưu vào cơ sở dữ liệu
        foreach ($productId as $id) {
            unset($carts[$id]);
        }
        
        Session::put('carts', $carts); // Cập nhật giỏ hàng trong phiên làm việc
        
        return true;
    }
    
    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }


    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'thumb');
        }])->get();
    }
    
}
