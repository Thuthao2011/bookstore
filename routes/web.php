<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Users\SignController;
use App\Http\Controllers\Admin\LoginnController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::resource('index', BookController::class);






Route::get('/input-email',[LoginController::class,'getInputEmail'])->name('getInputEmail'); // Tuyến đường GET
Route::post('/input-email',[LoginController::class,'postInputEmail'])->name('postInputEmail');

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #User
        Route::prefix('users')->group(function () {
            Route::get('add', [LoginnController::class, 'create']);
            Route::post('add', [LoginnController::class, 'store']);
            Route::get('list', [LoginnController::class, 'index']);
            Route::get('edit/{user}', [LoginnController::class, 'show']);
            Route::post('edit/{user}', [LoginnController::class, 'update']);
            Route::delete('/admin/users/destroy/{id}', [LoginnController::class, 'destroy'])->name('users.destroy');
        });

        #Contact
        Route::prefix('contacts')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('lienhe.index');
            Route::get('edit/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'show']);
            Route::post('contacts/contact/{id}/reply', [\App\Http\Controllers\Admin\ContactController::class, 'replyToContact'])->name('lienhe.replyToContact');
            Route::get('contacts/view/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'show'])->name('lienhe.reply');
            Route::get('update-status/{id}/{status}', [\App\Http\Controllers\Admin\ContactController::class, 'updateContactStatus'])->name('lienhe.updateStatus');
            Route::post('contacts/contact/{id}/reply', [\App\Http\Controllers\Admin\ContactController::class, 'replyToContact'])->name('lienhe.replyToContact');
            Route::delete('destroy/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');
        });
        
  
        
   

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
        Route::delete('/admin/customers/destroy/{id}', [\App\Http\Controllers\Admin\CartController::class, 'destroy'])->name('customer.destroy');
        Route::get('admin/customers/edit/{id}', [\App\Http\Controllers\Admin\CartController::class, 'showUpdate'])->name('admin.customers.edit');
        Route::post('admin/customers/edit/{id}', [\App\Http\Controllers\Admin\CartController::class, 'update'])->name('admin.customers.update');
        
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

// đăng kí 
Route::get('/admin/users/signup',[SignController::class,'index'])->name('signup');
Route::post('/admin/users/signup/store', [SignController::class, 'store']);

// tìm kiếm 
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

// yêu thích
Route::get('product/{id}/add-to-favorites', [FavoritesController::class, 'addToFavorites'])->name('addToFavorites');
Route::post('product/{id}/add-to-favorites', [FavoritesController::class, 'addToFavorites'])->name('addToFavorites');
Route::get('favorites', [FavoritesController::class, 'getFavoriteProducts'])->name('getFavoriteProducts');
Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites.index');
Route::get('product/{id}/remove-from-favorites', [FavoritesController::class, 'removeFromFavorites'])->name('favorite.remove');

//Liên hệ
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('contacts/list/store', [ContactController::class, 'store'])->name('contacts.store');


