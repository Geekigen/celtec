<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientOrderController;
use App\Http\Controllers\ImageAdcontroller;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeConroller;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\CategoriesComponent;
use App\Http\Livewire\ImageAd;
use App\Http\Livewire\LocationPriceForm;
use App\Http\Livewire\ProductsComponent;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeConroller::class,'welcome']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/search', [SearchController::class,'searchProducts'])->name('products.search');
// cart functionallity
Route::resource('products', ProductsController::class);
Route::post('checkout', [CartController::class, 'order'])->name('checkout');
Route::get('wish', [CartController::class, 'wishlist'])->name('wish');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}',[CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart',[CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart',[CartController::class, 'remove'])->name('remove.from.cart');
    Route::get('/myorders', [ClientOrderController::class, 'index'])->name('myorders');
    // web.php

Route::get('orders/{order}', [ClientOrderController::class, 'show'])->name('orders.show');
Route::post('/save-rating', [RatingController::class,'saveRate'])->name('saveRating');
Route::get('/prod/sort/{categoryId}', [ProductsController::class, 'sort'])->name('prod.sort');
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blog.show');
});
// admin
Route::middleware('auth','admin')->group(function () {
    Route::resource('imageads', ImageAdController::class);
    // Route::get('/', ImageAd::class)->name('adimage.upload');
    Route::get('/writeblog', BlogComponent::class)->name('writeblog');
    Route::get('/category', CategoriesComponent::class)->name('categories');
    Route::get('/createprod', ProductsComponent::class)->name('products');
    Route::get('/location-price', LocationPriceForm::class)->name('location-price');
    Route::get('/admin', [AdminController::class, 'index']);
});
Route::middleware(['checkAdminEmail'])->group(function () {
    // Admin panel routes
    // Route::get('/admin', [AdminController::class, 'index']);
    // Add other admin routes here
});


require __DIR__.'/auth.php';
