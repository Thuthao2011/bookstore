<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        
        $customers = Customer::all(); // Truy vấn danh sách khách hàng

        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $customers
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }

    
    public function destroy($id)
    {
        // Tìm và xóa user theo id
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Redirect hoặc trả về thông báo thành công
        return redirect('/admin/customers')->with('success', 'Xóa đơn hàng thành công ');
    }

    public function showUpdate($customerId)
    {
        // Lấy thông tin đơn hàng dựa trên $customerId
        $customer = Customer::findOrFail($customerId);

     // Lấy thông tin đơn hàng của khách hàng
     $carts = $customer->carts;

     return view('admin.carts.edit', [
         'title' => 'Cập nhật đơn hàng: ' . $customer->name,
         'customer' => $customer,
         'carts' => $carts,
     ]);
            }


            public function update(Request $request, $id)
            {
                // Lấy thông tin khách hàng dựa trên $id
                $customer = Customer::findOrFail($id);
            
                // Cập nhật thông tin khách hàng từ form
                $customer->update([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'email' => $request->input('email'),
                    'content' => $request->input('content'),
                ]);
            
                // Cập nhật thông tin đơn hàng từ form
                // Lặp qua danh sách các mục giỏ hàng và cập nhật chúng
                foreach ($customer->carts as $cart) {
                    $cart->update([
                        'pty' => $request->input('pty_' . $cart->id),
                        'price' => $request->input('price_' . $cart->id),
                    ]);
                }
            
                // Sau khi cập nhật xong, bạn có thể chuyển hướng hoặc trả về trang gốc
                return redirect()->route('admin.customers.edit', ['id' => $id])->with('success', 'Thông tin đơn hàng đã được cập nhật thành công.');
            }
}
