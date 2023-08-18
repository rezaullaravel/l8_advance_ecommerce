<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    //view shopping cart
    public function viewShoppingCart(){
            return view('frontend.shopping_cart.index');
    }//end method



    //product add to cart
    public function productAddToCart(Request $request){

            $product = ShoppingCart::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->first();

            if($product){
                return redirect()->back()->with('info-message','This product has been already added to shopping cart');
            } else {
                ShoppingCart::insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $request->product_id,
                    'color' => $request->color,
                    'size' => $request->size,
                    'quantity' => $request->quantity,
                ]);

                return redirect()->back()->with('message','Product added to shopping cart');
            }

    }//end method


    //product add to cart from wishlist
    public function addTocartFromWishlist(Request $request){
        $wishlist = Wishlist::find($request->rowId);
        $product = Product::where('id',$wishlist->product_id)->first();
       $cartProduct = ShoppingCart::where('user_id',Auth::user()->id)->where('product_id',$product->id)->first();

        if($cartProduct){
            return response()->json([
                'status'=>'This product is already exists in shopping cart',
            ]);
            } else {
                ShoppingCart::insert([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                    'color' => $request->color,
                    'size' => $request->size,
                ]);

                return response()->json([
                    'status'=>'This product added to shopping cart',
                ]);
            }


    }//end method



    //cart quantity increment
    public function incrementQuantity(Request $request){
        $product = ShoppingCart::find($request->rowId);

        $product->quantity=$product->quantity+1;
        $product->save();
        return response()->json($product);
    }//end method


    //cart quantity decrement
    public function decrementQuantity(Request $request){
        $product = ShoppingCart::find($request->rowId);

        $product->quantity=$product->quantity-1;
        $product->save();
        return response()->json($product);
    }//end method



    //cart item delete
    public function cartItemDelete(Request $request){
        $product = ShoppingCart::find($request->rowId)->delete();
        $products = ShoppingCart::where('user_id',Auth::user()->id)->count();
        return response()->json([
            'products'=>$products,
        ]);
    }//end method


    //cart product color update
    public function cartProductColorUpdate(Request $request){
        ShoppingCart::find($request->rowId)->update([
            'color' => $request->color,
        ]);

        return response()->json([
          'status' => 'Cart product color updated',
        ]);
    }//end method








}//end class
