<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\CategoriesComponent;
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

Route::get('/', function () {
   
$products =Product::take(4)->get();
return view('welcome', compact('products'));

  
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/search', [SearchController::class,'searchProducts'])->name('products.search');
// cart functionallity
Route::post('checkout', [CartController::class, 'order'])->name('checkout');
Route::get('wish', [CartController::class, 'wishlist'])->name('wish');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}',[CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart',[CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart',[CartController::class, 'remove'])->name('remove.from.cart');
    Route::get('/category', CategoriesComponent::class)->name('categories');
    Route::get('/createprod', ProductsComponent::class)->name('products');
});

require __DIR__.'/auth.php';
