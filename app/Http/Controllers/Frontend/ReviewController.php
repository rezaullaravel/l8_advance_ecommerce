<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //review store
    public function reviewStore(Request $request){

        if(Auth::check()){
            $request->validate([
                'review'=>'required',
                'rating_point'=>'required',
            ]);
            Review::insert([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'review' => $request->review,
                'rating_point' => $request->rating_point,
                'created_at' =>  Carbon::now(),
            ]);

            return redirect()->back()->with('info','Thank you for your review');
        } else{
            return redirect()->back()->with('info-sms','Please login first to give a review');
        }
    }//end method
}
