<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{

    public function saveRate(Request $request)
    {
        // validate the request data
        $validatedData = $request->validate([
            'Rate' => 'required|numeric|min:1|max:5',
            'productid' => 'required|string|max:255',
        ]);
    
        // check if a Rate already exists for the user
        $Rate = Rating::where('user_id', Auth::id())
             ->where('product_id', $validatedData['productid'])
             ->first();

    
        // if a Rate already exists, update it
        if ($Rate) {
            $Rate->rating = $validatedData['Rate'];
            $Rate->product_id= $validatedData['productid'];
            $Rate->save();
        } 
        // if a Rate doesn't exist, create a new one
        else {
            $Rate = new Rating;
            $Rate->user_id = Auth::id();
            $Rate->rating = $validatedData['Rate'];
            $Rate->product_id = $validatedData['productid'];
            $Rate->save();
        }
    
        // redirect the user to a success page
        return redirect('/');
    }
    
}
