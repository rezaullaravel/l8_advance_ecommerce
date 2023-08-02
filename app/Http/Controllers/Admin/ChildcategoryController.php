<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Http\Controllers\Controller;

class ChildcategoryController extends Controller
{
    //add child category
    public function add(){
        $categories = Category::all();
        return view('admin.childcategory.childcategory_add',compact('categories'));
    }//end method


    //sub category auto select by ajax
    public function subcategoryAutoSelect($category_id){
        $subcategories = Subcategory::where('category_id',$category_id)->get();
        return json_encode($subcategories);
    }//end method


    //child category auto select by ajax
    public function childcategoryAutoSelect($subcategory_id){
        $childcategories = Childcategory::where('subcategory_id',$subcategory_id)->get();
        return json_encode($childcategories);
    }//end method


    //store child category
    public function store(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'childcategory_name'=>'required|unique:childcategories',
        ],[
            'category_id.required'=>'Category name is required',
            'subcategory_id.required'=>'Subcategory name is required',
            'childcategory_name.required'=>'Child category name is required',
            'childcategory_name.unique'=>'This Child category name is already exists',
        ]);

        $data = [];
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_name'] = $request->childcategory_name;

        Childcategory::insert($data);

        return redirect()->back()->with('message','Child category created successfully');
    }//end method


    //manage child category
    public function index(){
        $childcategories = Childcategory::all();
        return view('admin.childcategory.index',compact('childcategories'));
    }//end method


    //edit child category
    public function edit($id){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $childcategory = Childcategory::find($id);
        return view('admin.childcategory.edit',compact('categories','subcategories','childcategory'));
    }//end method


    //update child category
    public function update(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'childcategory_name'=>'required|unique:childcategories,childcategory_name,'.$request->id,
        ],[
            'category_id.required'=>'Category name is required',
            'subcategory_id.required'=>'Subcategory name is required',
            'childcategory_name.required'=>'Child category name is required',
            'childcategory_name.unique'=>'This Child category name is already exists',
        ]);

        $data = [];
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_name'] = $request->childcategory_name;

        Childcategory::find($request->id)->update($data);

        return redirect('/admin/childcategory/manage')->with('message','Child category updated successfully');
    }//end method


    //delete child category
    public function delete($id){
        Childcategory::find($id)->delete();
        return redirect('/admin/childcategory/manage')->with('message','Child category deleted successfully');
    }//end method
}
