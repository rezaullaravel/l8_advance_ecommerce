<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pickuppoint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PickupPointController extends Controller
{
    //pick up point list
    public function index(){
        $pickup_points = Pickuppoint::all();
        return view('admin.pickup_point.index',compact('pickup_points'));
    }//end method


    //add
    public function add(){
        return view('admin.pickup_point.add');
    }//end method


    //store
    public function store(Request $request){
        $this->validate($request,[
            'name' =>'required|unique:pickuppoints',
            'phone' =>'required',
            'address' =>'required',
        ]);

        //data insert
        Pickuppoint::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('message','Pickup point  added successfully');
    }//end method


    //edit
    public function edit($id){
        $pickup_point = Pickuppoint::find($id);
        return view('admin.pickup_point.edit',compact('pickup_point'));
    }//end method


    //update
    public function update(Request $request){
        $this->validate($request,[
            'name' =>'required|unique:pickuppoints,name,'.$request->id,
            'phone' =>'required',
            'address' =>'required',
        ]);

        //data insert
        Pickuppoint::find($request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/admin/pickup/point')->with('message','Pickup point  updated successfully');
    }//end method


    //delete
    public function trash($id){
        Pickuppoint::find($id)->delete();
        return redirect('/admin/pickup/point')->with('message','Pickup point  deleted successfully');
    }//end method
}
