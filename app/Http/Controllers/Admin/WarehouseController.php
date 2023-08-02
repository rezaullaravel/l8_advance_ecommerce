<?php

namespace App\Http\Controllers\Admin;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarehouseController extends Controller
{
    //warehouse list
    public function index(){
        $warehouses = Warehouse::all();
        return view('admin.warehouse.index',compact('warehouses'));
    }//end method

    //warehouse add
    public function add(){
        return view('admin.warehouse.add');
    }//end method


    //warehouse store
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:warehouses',
            'phone'=>'required',
            'address'=>'required',
        ]);

        //data insert
        Warehouse::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('message','Warehouse info added successfully');
    }//end method


    //edit
    public function edit($id){
        $warehouse = Warehouse::find($id);
        return view('admin.warehouse.edit',compact('warehouse'));
    }//end method



    //update
    public function update(Request $request){
        $request->validate([
            'name'=>'required|unique:warehouses,name,'.$request->id,
            'phone'=>'required',
            'address'=>'required',
        ]);
        $warehouse = Warehouse::find($request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/admin/warehouse')->with('message','Warehouse info updated successfully');
    }//end method


    //trash/delete
    public function trash($id){
        $warehouse = Warehouse::find($id)->delete();

        return redirect('/admin/warehouse')->with('message','Warehouse info deleted successfully');
    }//end method





}//end method
