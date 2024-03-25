<?php

namespace App\Http\Controllers\Frontend;

use Mail;
use App\Models\Order;
use App\Models\Coupon;
use App\Mail\OrderMail;
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
        return redirect()->back()->with('message','You have to login first');
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

        $data = [];
        //order insert
        //   $data['user_id'] = Auth::user()->id;

        //   $data['c_name'] = Auth::user()->name;

        //   $data['c_phone'] = $request->c_phone;

        //   $data['c_country'] = $request->c_country;

        //   $data['c_shipping_address'] = $request->c_shipping_address;

        //   $data['c_email'] = $request->c_email;

        //   $data['c_zipcode'] = $request->c_zipcode;

        //   $data['c_extra_phone'] = $request->c_extra_phone;

        //   $data['c_city'] = $request->c_city;

        //  if(Session('coupon')){
        //     $data['coupon_code'] = Session::get('coupon')['coupon_code'];
        //     $data['coupon_discount'] = Session::get('coupon')['amount'];
        //  }
        //   $data['subtotal'] = $request->subtotal;

        //   $data['total'] = $request->total;

        //   $data['payment_type'] = $request->payment_type;

        //   $data['date'] = date('Y-m-d');

        //   $data['status'] = 0;

        //   $orderId = Order::insertGetId($data);


          //order details insert
          $cartproducts = ShoppingCart::where('user_id',Auth::user()->id)->get();

          foreach($cartproducts as $product){
            Orderdetails::insert([
                'order_id' => $orderId,
                'product_id' => $product->product_id,
                'product_quantity' => $product->quantity,
                'price' => $product->product->selling_price,
                'color' => $product->color,
                'size' => $product->size,
            ]);
          }

          //coupon destroy
          if(Session('coupon')){
            Session::forget('coupon');
           }

           //shopping cart empty
           ShoppingCart::where('user_id',Auth::user()->id)->delete();

           //mail sending to customer email
           Mail::to($request->c_email)->send(new OrderMail($data));

          return redirect()->back()->with('message','Your order has been successfully submitted');
    }//end method









}//end method
