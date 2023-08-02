<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;
use App\Models\Pickuppoint;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Models\ProductMultiImage;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //add product
    public function add(){
        $categories = Category::all();
        $brands = Brand::all();
        $pickup_points = Pickuppoint::all();
        $warehouses = Warehouse::all();
        return view('admin.product.add',compact('categories','brands','pickup_points','warehouses'));
    }//end method


    //store
    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:products',
            'code' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'unit' => 'required',
            'color' => 'required',
            'description' => 'required',
            'selling_price' => 'required',
        ],[
            'category_id.required' =>'The category field is required.',
            'subcategory_id.required' =>'The subcategory field is required.',
            'brand_id.required' =>'The brand field is required.',
        ]);




         //product thumbnail image upload
         if($request->file('thumbnail')){
            $image = $request->file('thumbnail');
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(620,620)->save('upload/product_images/'.$imageName);
            $thumbnail_path = 'upload/product_images/'.$imageName;
        }


        //data insert
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->childcategory_id = $request->childcategory_id;
        $product->brand_id = $request->brand_id;
        $product->pickup_point_id = $request->pickup_point_id;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->unit = $request->unit;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->tags = $request->tags;
        $product->video = $request->video;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->warehouse = $request->warehouse;
        $product->description = $request->description;
        $product->thumbnail = $thumbnail_path;


        if($request->featured==1){
            $product->featured = 1;
        } else{
            $product->featured = 0;
        }

        if($request->today_deal==1){
            $product->today_deal = 1;
        } else{
            $product->today_deal = 0;
        }

        if($request->status==1){
            $product->status = 1;
        } else{
            $product->status = 0;
        }

        $product->save();


        //product multiple image upload
        if($request->file('images')){
            $images = $request->file('images');
           foreach($images  as $image){
            $imageName = rand().'.'.$image->getClientOriginalName();
            Image::make($image)->resize(620,620)->save('upload/product_images/'.$imageName);
            $image_path = 'upload/product_images/'.$imageName;

            ProductMultiImage::create([
                'product_image' =>  $image_path,
                'product_id' =>   $product->id,
            ]);

           }
        }

        return redirect()->back()->with('message','Product added successfully');
    }//end method


    //manage
    public function manage(Request $request){
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::all();


        return view('admin.product.index',compact('products','categories','brands'));
    }//end method


    //product filter by category
    public function filterBycategory(Request $request){

            $products = Product::where('category_id',$request->category_id)->get();

            if(count($products)>0){
                return view('admin.product.filter_by_category',compact('products'))->render();
            } else{
                return response()->json([
                    'status'=>'No data found',
                ]);
            }
    }//end method


    //product filter by brand
    public function filterByBrand(Request $request){
        $products = Product::where('brand_id',$request->brand_id)->get();

        if(count($products)>0){
            return view('admin.product.filter_by_category',compact('products'))->render();
        } else{
            return response()->json([
                'status'=>'No data found',
            ]);
        }
    }//end method


    //product filter by status
    public function filterByStatus(Request $request){
        $products = Product::where('status',$request->status)->get();

        if(count($products)>0){
            return view('admin.product.filter_by_category',compact('products'))->render();
        } else{
            return response()->json([
                'status'=>'No data found',
            ]);
        }
    }//end method


    //product status deactive
    public function productStatusDeactive($id){
        $product = Product::find($id);
        $product->status=0;
        $product->save();
        return redirect()->back()->with('message','Product status deactive successfully');
    }//end method


    //product status active
    public function productStatusActive($id){
        Product::find($id)->update([
            'status'=>1,
        ]);

        return redirect()->back()->with('message','Product status active successfully');
    }//end method


    //product featured deactive
    public function productFeaturedDeactive($id){
        Product::find($id)->update([
            'featured'=>0,
        ]);

        return redirect()->back()->with('message','Product featured deactive successfully');
    }//end method


    //product featured active
    public function productFeaturedActive($id){
        Product::find($id)->update([
            'featured'=>1,
        ]);

        return redirect()->back()->with('message','Product featured active successfully');
    }//end method


    //product today deal deactive
    public function productDealDeactive($id){
        Product::find($id)->update([
            'today_deal'=>0,
        ]);

        return redirect()->back()->with('message','Product today deal deactive successfully');
    }//end method


    //product today deal active
    public function productDealActive($id){
        Product::find($id)->update([
            'today_deal'=>1,
        ]);

        return redirect()->back()->with('message','Product today deal active successfully');
    }//end method







}//end class
