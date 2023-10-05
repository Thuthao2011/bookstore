<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
    
        // Lấy danh mục (menu) của sản phẩm
        $menu = $product->menu;
    
        // Lấy danh sách sản phẩm thuộc cùng một menu
        $relatedProducts = $menu->products()->where('id', '!=', $id)->limit(4)->get();
    
        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore,
            'relatedProducts' => $relatedProducts, // Sản phẩm liên quan dựa trên menu
        ]);
    }


    
    
}
