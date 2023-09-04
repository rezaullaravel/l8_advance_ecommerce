<style>
    /* styling navlist */
    #search_bar {
    width: 100%;
    overflow: hidden;
    display: inline-block;
    margin-top: 19px;
    }
    /* styling search bar */
    .searching input[type=text]{
    border-radius: 25px;
    border: 1px solid #000;
    padding: 6px 67px;
    }
    .searching{
    /* float: right; */
    margin: 0 auto;
    }
    .searching-submit {
    background-color: #ffa500;
    color: #ffffff;
    font-weight: 700;
    text-decoration: none;
    white-space: normal;
    -webkit-transition: none;
    transition: none;
    cursor: pointer;
    outline: 0;
    padding: 12px 24px 11px;
    font-size: 1rem;
    line-height: 1.25rem;
    border-radius: 8px;
    border-width: 0;
    font-size: 13px;
    border-top-left-radius: 2;
    border-bottom-left-radius: 1;
    }
 </style>
 <style>
    .social_icon{
    clear: both;
    margin-right: 50px
    }
    .head_style{
    padding-left: 25rem;
    font-size: 12px;
    }
    .head_style ul{}
    .head_style ul li{}
    .head_style ul li a{}
 </style>


{{-- dropdown menu start --}}
<style>
    .parent {
     display: block;
     position: relative;
     float: left;
     line-height: 30px;
     background-color: #ffa500;
     border-right: #CCC 1px solid;
     padding: 8px 0;
     font-size: 16px;
     z-index: 9999999;
     border-radius: 16px;
    font-weight: 600;

 }

 .parent a {
     margin: 10px;
     color: #FFFFFF;
     text-decoration: none;
 }

 .parent:hover>ul {
     display: block;
     position: absolute;
 }

 .child {
     display: none;
     margin-top:10px;
 }

 .child li {
     background-color: #E4EFF7;
     line-height: 30px;
     border-bottom: #CCC 1px solid;
     border-right: #CCC 1px solid;
     width: 20rem;
     z-index: 999999;
 }

 .child li a {
     color: #000000;
 }

 ul {
     list-style: none;
     margin: 0;
     padding: 0px;
     min-width: 7em;
 }

 ul ul ul {
     left: 100%;
     top: 0;
     margin-left: 1px;
 }

 li:hover {
     background-color: #95B4CA;
 }

 .parent li:hover {
     background-color: #F0F0F0;
 }

 .expand {
     font-size: 12px;
     float: right;
     margin-right: 5px;
 }



 .menu_active{
  background-color: #83a8b1;
  color: #fff;
  border: none;
  padding: 8px 11px;
    cursor: pointer;
    font-size: 18px;
}

 </style>
{{-- dropdown menu end --}}

 <a href="offer.html"><img src="{{asset('/')}}frontend/images/download.png" class="img-head" alt=""></a>
 <div class="header">
    <div class="container" style="text-align: center;">
       <div class="logo">
          <h1 ><a href="{{ url('/') }}" style="padding-left: 15px;"><b>T<br>H<br>E</b> Nice Store <span>The Best Supermarket</span></a></h1>
       </div>
       <div class="head_style">
          <div class="head-t">
             <ul class="card" style="float: left">
                <li><a href="{{ url('/wishlist') }}" ><i class="fa fa-heart" aria-hidden="true"></i>Wishlist
                    @if (Auth::check())
                    <span class="btn btn-sm btn-success">
                        @php
                            $wishlist_count = App\Models\Wishlist::where('user_id',Auth::user()->id)->count();
                        @endphp
                        {{ $wishlist_count }}
                </span>
                @endif
            </a></li>
                <li><a href="about.html" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
                <li><a href="shipping.html" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>

               @if (!Auth::check())
                    <li><a href="{{ url('/login') }}" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
                    <li><a href="{{ url('/register') }}" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
                @else
                <li><a href="{{ url('/home') }}" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Dashboard</a></li>
               @endif

             </ul>
          </div>
       </div>
       <div id="search_bar">
          <div class="searching">
             <form action="#">
                <input type="text" placeholder="Search Courses" name="search">
                <input type="submit" class="searching-submit" value="Search">
             </form>
          </div>
       </div>
       <div class="header-ri">
          <div class="social_icon">
             <ul class="social-top">
                <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon pinterest"><i class="fa fa-brands fa-linkedin"></i><span></span></a></li>
                <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
             </ul>
          </div>
       </div>
       <div class="nav-top">
          <nav class="navbar navbar-default">
             <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
             </div>


             {{-- menu start --}}
             <ul id="menu">
                <li class="parent"><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'menu_active' : '' }}">Home</a></li>

                @foreach ($categories as $category)
                <li class="parent"><a href="{{ url('category-wise/product/show',$category->id) }}"  class="{{ Request::is('category-wise/product/show/'.$category->id) ? 'menu_active' : '' }}">{{ $category->category_name }}</a>
                    @php
                      $subcategories = App\Models\Subcategory::where('category_id',$category->id)->get();
                      @endphp

                  @if (count($subcategories)>0)
                    <ul class="child">
                        @foreach ( $subcategories as  $subcategory)
                        <li class="parent"><a href="{{ url('subcategory-wise/product/show',$subcategory->id) }}" class=""> {{ $subcategory->subcategory_name }} <span class="expand">»</span></a>
                            @php
                            $childcategories = App\Models\Childcategory::where('subcategory_id',$subcategory->id)->get();
                            @endphp
                            @if(count($childcategories)>0)
                            <ul class="child">
                                @foreach ( $childcategories as  $childcategory)
                                <li><a href="{{ url('childcategory-wise/product/show',$childcategory->id) }}">{{ $childcategory->childcategory_name }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
             {{-- menu start end --}}
          </nav>
          <div class="cart" >

                <a href="{{ url('/cart/view') }}" class="btn btn-success" title="Shopping Cart"><i class="fa fa-shopping-cart"></i>
                    <span class="cartCount">
                        @if (Auth::check())
                        @php
                          $products =App\Models\ShoppingCart::where('user_id',Auth::user()->id)->count();
                        @endphp
                            {{ $products }}
                        @endif
                    </span>
                </a>
          </div>

       </div>
    </div>
 </div>



