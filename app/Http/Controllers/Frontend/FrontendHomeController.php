<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Http\Controllers\Controller;

class FrontendHomeController extends Controller
{
    //home page
    public function index(){
        $categories = Category::all();
        $products = Product::where('status',1)->orderBy('id','desc')->limit(8)->get();
        $featuredProducts = Product::where('status',1)->where('featured',1)->orderBy('id','desc')->limit(8)->get();
        $popularProducts = Product::where('status',1)->orderBy('product_view','desc')->limit(8)->get();
        return view('frontend.home.index',compact('categories','products','featuredProducts','popularProducts'));
    }//end method


    //product single page
    public function productSingle($id){
        $product = Product::find($id);
                   Product::where('id',$id)->increment('product_view');
        $product_reviews = Review::where('product_id',$product->id)->get();
        return view('frontend.product.product_single',compact('product','product_reviews'));
    }//end method


    //category wise product show
    public function categoryWiseProductShow($id){
        $category = Category::where('id',$id)->first();
        $products = Product::where('category_id',$id)->limit(8)->get();
        return view('frontend.product.categorywise_product_show',compact('products','category'));
    }//end method


    //subcategory wise product show
    public function subcategoryWiseProductShow($id){
        $subcategory = Subcategory::where('id',$id)->first();
        $products = Product::where('subcategory_id',$id)->limit(8)->get();
        return view('frontend.product.subcategorywise_product_show',compact('products','subcategory'));
    }//end method


    //childcategory wise product show
    public function childcategoryWiseProductShow($id){
        $childcategory = Childcategory::where('id',$id)->first();
        $products = Product::where('childcategory_id',$id)->limit(8)->get();
        return view('frontend.product.childcategorywise_product_show',compact('products','childcategory'));
    }//end method


    //about us page
    public function aboutUs(){
        return view('frontend.about.about');
    }//end method













}//end class
