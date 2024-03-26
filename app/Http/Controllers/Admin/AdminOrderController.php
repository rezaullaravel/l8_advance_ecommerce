<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\ReceiveOrderMail;
use App\Http\Controllers\Controller;
use Mail;

class AdminOrderController extends Controller
{
    //all order
    public function allOrder(Request $request){
        $orders = '';
        $query = Order::orderBy('id','desc');

        if($request->status == 'all'){
            $query = Order::orderBy('id','desc');
        }

        if($request->status == '0'){
            $query = Order::where('status',0)->orderBy('id','desc');
        }

        if($request->status == '1'){
            $query = Order::where('status',1)->orderBy('id','desc');
        }

        if($request->status == '2'){
            $query = Order::where('status',2)->orderBy('id','desc');
        }

        if($request->date){
            $date = date('Y-m-d',strtotime($request->date));
            $query = Order::where('date', $date)->orderBy('id','desc');
        }

        if($request->date && $request->status=="0"){
            $date = date('Y-m-d',strtotime($request->date));
            $query = Order::where('date', $date)->where('status',0)->orderBy('id','desc');
        }

        if($request->date && $request->status=="1"){
            $date = date('Y-m-d',strtotime($request->date));
            $query = Order::where('date', $date)->where('status',1)->orderBy('id','desc');
        }

        if($request->date && $request->status=="2"){
            $date = date('Y-m-d',strtotime($request->date));
            $query = Order::where('date', $date)->where('status',2)->orderBy('id','desc');
        }

        if($request->date && $request->status=='all'){
            $date = date('Y-m-d',strtotime($request->date));
            $query = Order::where('date', $date)->orderBy('id','desc');
        }

        $orders = $query->get();
        return view('admin.order.order_all',compact('orders'));
    }//end method


    //change order status
    public function changeOrderStatus($id){
        $order = Order::find($id);
        return view('admin.order.order_status_change',compact('order'));
    }//end method


    //update order status
    public function updateOrderStatus(Request $request){
        $id = $request->id;
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();

        //mail sending to customer email
        if($request->status=='1'){
            Mail::to($order->user->email)->send(new ReceiveOrderMail($order));
        }

        return redirect()->route('admin.order.all')->with('message','Order status changed successfully');
    }//end method
}//end method
