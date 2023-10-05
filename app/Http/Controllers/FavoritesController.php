<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorites;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FavoritesController extends Controller
{

// Trong controller
public function index()
{
    $favorites = auth()->user()->favorites; // Lấy danh sách sản phẩm yêu thích của người dùng

    return view('favorites', compact('favorites'));
}

    
    
    




public function getProduct()
{
    $favorites = Session::get('favorites');
    if (is_null($favorites)) return [];

    $productId = array_keys($favorites);
    return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
        ->where('active', 1)
        ->whereIn('id', $productId)
        ->get();
}

public function addToFavorites($productId)
{
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (auth()->check()) {
    // Lấy thông tin sản phẩm từ database dựa trên ID
    $product = Product::find($productId);

    // Kiểm tra xem sản phẩm đã tồn tại trong danh sách yêu thích của người dùng hay chưa
    $isFavorite = auth()->user()->products()->where('product_id', $product->id)->exists();

    if (!$isFavorite) {
        // Thêm sản phẩm vào danh sách yêu thích của người dùng trong Session
        $favorites = Session::get('favorites', []);
        $favorites[$productId] = $product;
        Session::put('favorites', $favorites);

        // Thêm sản phẩm vào cơ sở dữ liệu nếu chưa tồn tại
        auth()->user()->products()->attach($product->id);

        return redirect()->back()->with('success', 'Đã thêm vào mục yêu thích thành công!');
    } else {
        return redirect()->back()->with('error', 'Sản phẩm này đã nằm trong danh sách yêu thích của bạn!');
    }
}

}

public function removeFromFavorites($id)
{
    try {
        $product = Product::findOrFail($id);
        
        // Xóa sản phẩm khỏi danh sách yêu thích của người dùng
        auth()->user()->favorites()->detach($product);
        
        // Cập nhật biến session favorites sau khi xóa
        $favorites = Session::get('favorites', []);
        if (($key = array_search($id, $favorites)) !== false) {
            unset($favorites[$key]);
            Session::put('favorites', $favorites);
        }
        
        return redirect()->route('favorites.index')->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích.');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->route('favorites.index')->with('error', 'Không tìm thấy sản phẩm.');
    }
}






}
