<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Admin\PickupPointController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Frontend\FrontendHomeController;
use App\Http\Controllers\Frontend\ShoppingCartController;







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




/*================================= Admin all route =======================================================*/

Route::get('/admin/login',[LoginController::class,'showAdminLoginForm']);
Route::post('/admin/login',[LoginController::class,'adminLogin'])->name('admin.login');


Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/logout',[AdminController::class,'adminLogout'])->name('admin.logout');

    //category
    Route::get('/category/add',[CategoryController::class,'addCategory'])->name('admin/category/add');
    Route::post('/category/store',[CategoryController::class,'storeCategory'])->name('admin.category.store');
    Route::get('/category/manage',[CategoryController::class,'manageCategory'])->name('admin.category.manage');
    Route::get('/category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('admin.category.delete');
    Route::get('/category/edit/{id}',[CategoryController::class,'editCategory'])->name('admin.category.edit');
    Route::post('/category/update',[CategoryController::class,'updateCategory'])->name('admin.category.update');

    //subcategory
    Route::get('/subcategory/add',[SubcategoryController::class,'add'])->name('admin.subcategory.add');
    Route::post('/subcategory/store',[SubcategoryController::class,'store'])->name('admin.subcategory.store');
    Route::get('/subcategory/manage',[SubcategoryController::class,'index'])->name('admin.subcategory.manage');
    Route::get('/subcategory/edit/{id}',[SubcategoryController::class,'edit'])->name('admin.subcategory.edit');
    Route::post('/subcategory/update',[SubcategoryController::class,'update'])->name('admin.subcategory.update');
    Route::get('/subcategory/delete/{id}',[SubcategoryController::class,'delete'])->name('admin.subcategory.delete');


    //child category
    Route::get('/childcategory/add',[ChildcategoryController::class,'add'])->name('admin.childcategory.add');
    Route::post('/childcategory/store',[ChildcategoryController::class,'store'])->name('admin.childcategory.store');
    Route::get('/childcategory/manage',[ChildcategoryController::class,'index'])->name('admin.childcategory.manage');
    Route::get('/childcategory/edit/{id}',[ChildcategoryController::class,'edit'])->name('admin.childcategory.edit');
    Route::post('/childcategory/update',[ChildcategoryController::class,'update'])->name('admin.childcategory.update');
    Route::get('/childcategory/delete/{id}',[ChildcategoryController::class,'delete'])->name('admin.childcategory.delete');

    //global route
    Route::get('/category/subcategory/ajax/{category_id}',[ChildcategoryController::class,'subcategoryAutoSelect']);
    Route::get('/subcategory/childcategory/ajax/{subcategory_id}',[ChildcategoryController::class,'childcategoryAutoSelect']);


    //brand
    Route::get('/brand/add',[BrandController::class,'add'])->name('admin.brand.add');
    Route::post('/brand/store',[BrandController::class,'store'])->name('admin.brand.store');
    Route::get('/brand/manage',[BrandController::class,'manage'])->name('admin.brand.manage');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('admin.brand.edit');
    Route::post('/brand/update',[BrandController::class,'update'])->name('admin.brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('admin.brand.delete');


    //warehouse
    Route::get('/warehouse',[WarehouseController::class,'index'])->name('admin.warehouse');
    Route::get('/warehouse/add',[WarehouseController::class,'add']);
    Route::post('/warehouse/store',[WarehouseController::class,'store']);
    Route::get('/warehouse/edit/{id}',[WarehouseController::class,'edit']);
    Route::post('/warehouse/update',[WarehouseController::class,'update']);
    Route::get('/warehouse/trash/{id}',[WarehouseController::class,'trash']);


    //coupon
    Route::get('/coupon',[CouponController::class,'index']);
    Route::get('/coupon/add',[CouponController::class,'add']);
    Route::post('/coupon/store',[CouponController::class,'store']);
    Route::get('/coupon/edit/{id}',[CouponController::class,'edit']);
    Route::post('/coupon/update',[CouponController::class,'update']);
    Route::get('/coupon/trash/{id}',[CouponController::class,'trash']);


    //pickup point
    Route::get('/pickup/point',[PickupPointController::class,'index']);
    Route::get('/pickup/point/add',[PickupPointController::class,'add']);
    Route::post('/pickup-point/store',[PickupPointController::class,'store']);
    Route::get('/pickup-point/edit/{id}',[PickupPointController::class,'edit']);
    Route::post('/pickup-point/update',[PickupPointController::class,'update']);
    Route::get('/pickup-point/trash/{id}',[PickupPointController::class,'trash']);


    //product
    Route::get('/product/add',[ProductController::class,'add']);
    Route::post('/product/store',[ProductController::class,'store']);
    Route::get('/product/edit/{id}',[ProductController::class,'edit']);
    Route::get('/product/delete/{id}',[ProductController::class,'delete']);
    Route::post('/product/update',[ProductController::class,'update']);
    Route::get('/product/manage',[ProductController::class,'manage']);
    Route::get('/product/filter/by-category',[ProductController::class,'filterBycategory']);
    Route::get('/product/filter/by-brand',[ProductController::class,'filterByBrand']);
    Route::get('/product/filter/by-status',[ProductController::class,'filterByStatus']);
    Route::get('/product-status/deactive/{id}',[ProductController::class,'productStatusDeactive']);
    Route::get('/product-status/active/{id}',[ProductController::class,'productStatusActive']);
    Route::get('/product-featured/deactive/{id}',[ProductController::class,'productFeaturedDeactive']);
    Route::get('/product-featured/active/{id}',[ProductController::class,'productFeaturedActive']);
    Route::get('/today-deal/deactive/{id}',[ProductController::class,'productDealDeactive']);
    Route::get('/today-deal/active/{id}',[ProductController::class,'productDealActive']);
    Route::get('/multiImg/delete/{id}',[ProductController::class,'ProductMultiImgDelete']);


});

/*================================= Admin all route end =======================================================*/


/*===================================== Frontend all route start   ==============================================*/

//home page
Route::get('/',[FrontendHomeController::class,'index']);

//product single page
Route::get('/product/single/{id}',[FrontendHomeController::class,'productSingle']);

//category wise product view
Route::get('/category-wise/product/show/{id}',[FrontendHomeController::class,'categoryWiseProductShow'])->name('category-wise/product/show');
//subcategory wise product view
Route::get('/subcategory-wise/product/show/{id}',[FrontendHomeController::class,'subcategoryWiseProductShow'])->name('subcategory-wise/product/show');
//childcategory wise product view
Route::get('/childcategory-wise/product/show/{id}',[FrontendHomeController::class,'childcategoryWiseProductShow'])->name('childcategory-wise/product/show');


//product review by user
Route::post('/product/review',[ReviewController::class,'reviewStore']);


//wishlist
Route::middleware(['auth'])->group(function () {
Route::post('/product/wishlist/store',[WishlistController::class,'store']);
Route::get('/wishlist',[WishlistController::class,'wishlist']);
Route::get('/wishlist-product/delete/{id}',[WishlistController::class,'wishlistProductDelete']);

//shopping cart
Route::get('/cart/view',[ShoppingCartController::class,'viewShoppingCart']);
Route::post('/addTo/cart',[ShoppingCartController::class,'productAddToCart']);
Route::post('/quantity/increment',[ShoppingCartController::class,'incrementQuantity']);
Route::post('/quantity/decrement',[ShoppingCartController::class,'decrementQuantity']);
Route::get('/cart-item/delete',[ShoppingCartController::class,'cartItemDelete']);
Route::post('/addTocart-from/wishlist',[ShoppingCartController::class,'addTocartFromWishlist']);
Route::post('/cart-color/update',[ShoppingCartController::class,'cartProductColorUpdate']);
Route::post('/cart-product/size/update',[ShoppingCartController::class,'cartProductSizeUpdate']);
Route::get('/cart/empty',[ShoppingCartController::class,'emptyCart']);
});

//checkout page
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::post('/apply/coupon',[CheckoutController::class,'applyCoupon']);
Route::get('/coupon/remove',[CheckoutController::class,'removeCoupon']);
Route::post('/place/order',[CheckoutController::class,'placeOrder']);

/*===================================== Frontend all route end   ==============================================*/
