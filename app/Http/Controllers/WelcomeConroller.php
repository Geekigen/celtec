<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageAd;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeConroller extends Controller
{


    public function welcome(){
        $categories = Category::paginate('3');
       $Ads=ImageAd::inRandomOrder()
       ->take(3)
       ->get();

        $category1= Category::where('id', 1)->get();
        $category2 = Category::where('id', 2)->get();
        $category3 = Category::where('id', 3)->get();
        $category4 = Category::where('id', 4)->get();
        $category5 = Category::where('id', 5)->get();
        $category6 = Category::where('id', 4)->get();
        // 
        $popular = Product::where('is_featured', 1)
    ->inRandomOrder()
    ->take(4)
    ->get();
    $cat1 = Product::where('category_id', 1)
    ->inRandomOrder()
    ->take(4)
    ->get();
    $cat2 = Product::where('category_id', 2)
    ->inRandomOrder()
    ->take(4)
    ->get();
    $cat3 = Product::where('category_id', 3)
    ->inRandomOrder()
    ->take(4)
    ->get();
    $cat4 = Product::where('category_id', 4)
    ->inRandomOrder()
    ->take(4)
    ->get();
    $cat5 = Product::where('category_id', 5)
    ->inRandomOrder()
    ->take(4)
    ->get();
    $cat6 = Product::where('category_id', 6)
    ->inRandomOrder()
    ->take(4)
    ->get();
        
        return view('welcome', compact
        (
        'categories',
        'cat1',
        'cat2',
        'cat3',
        'cat4',
        'cat5',
        'cat6',
    'popular',
'category1',
'category2',
'category3',
'category4',
'category5',
'category6',
'Ads'
));
    }
   
    
      
}
