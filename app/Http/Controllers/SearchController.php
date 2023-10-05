<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Menu;
use App\Models\Contact;

use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        
        // Thực hiện tìm kiếm sản phẩm dựa trên từ khóa (keyword)
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        
        // Trả về view và truyền kết quả tìm kiếm vào view
        return view('search.index', ['products' => $products, 'keyword' => $keyword]);
    }
    
    
}
