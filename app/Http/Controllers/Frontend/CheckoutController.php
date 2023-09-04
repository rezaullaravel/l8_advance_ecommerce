<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Orderdetails;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //checkout page
    public function checkout(){
       if(Auth::check()){
        return view('frontend.checkout.checkout');
       } else{
        return redirec()->back()->with('message','You have to login first');
       }
    }//end method


    //apply coupon
    public function applyCoupon(Request $request){
        if(Auth::check()){
            $check = Coupon::where('coupon_code',$request->coupon_code)->first();
            if($check){
             if(date('Y-m-d')<=date('Y-m-d',strtotime($check->valid_date))){
                Session::put('coupon',[
                 'coupon_code' => $check->coupon_code,
                 'amount' => $check->amount,
                ]);
                return redirect()->back()->with('message','Coupon has been successfully applied');

             } else{
                 return redirect()->back()->with('message','Coupon validity expired');
             }
            } else {
             return redirect()->back()->with('message','Invalid Coupon Code');
            }
        }

    }//end method


    //remove coupon
    public function removeCoupon(){
        if(Session('coupon')){
            Session::forget('coupon');
            return redirect()->back()->with('message','Coupon removed successfully');
        } else{
            return redirect()->back()->with('error','You have not applied any coupon');
        }

    }//end method


    //place order
    public function placeOrder(Request $request){

        //order insert
        $order = new Order();
          $order->user_id = Auth::user()->id;

          $order->c_name = Auth::user()->name;

          $order->c_phone = $request->c_phone;

          $order->c_country = $request->c_country;

          $order->c_shipping_address = $request->c_shipping_address;

          $order->c_email = $request->c_email;

          $order->c_zipcode = $request->c_zipcode;

          $order->c_extra_phone = $request->c_extra_phone;

          $order->c_city = $request->c_city;

         if(Session('coupon')){
            $order->coupon_code = Session::get('coupon')['coupon_code'];
            $order->coupon_discount = Session::get('coupon')['amount'];
         }
          $order->subtotal = $request->subtotal;

          $order->total = $request->total;

          $order->payment_type = $request->payment_type;

          $order->date = date('Y-m-d');

          $order->status = 0;

          $order->save();

          //order details insert
          $cartproducts = ShoppingCart::where('user_id',Auth::user()->id)->get();

          foreach($cartproducts as $product){
            Orderdetails::insert([
                'order_id' => $order->id,
                'product_id' => $product->product_id,
                'product_quantity' => $product->quantity,
                'price' => $product->product->selling_price,
                'color' => $product->color,
                'size' => $product->size,
            ]);
          }

          return redirect()->back()->with('message','Your order has been successfully submitted');
    }//end method









}//end method
