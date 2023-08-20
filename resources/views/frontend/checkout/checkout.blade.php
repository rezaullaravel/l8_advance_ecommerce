@extends('frontend.frontend_master')
@section('title')
    Checkout Page
@endsection

<style>
    .card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.card-body {
  padding: 2px 16px;
}

td, th {
    padding: 0;
    padding-left: 11px !important;
}

</style>

@section('main-content')
    <div class="container" style="margin-top: 40px; margin-bottom:40px;">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <h3 class="text-center text-success" style="margin-top: 10px;">Billing Address</h3>
                      <form action="{{ url('/place/order') }}" method="POST">
                        @csrf


                        <div class="row" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Customer Name <span class="text-danger">*</span></label>
                                        <input type="text" name="c_name" class="form-control" value="{{ Auth::user()->name }}" required disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Customer Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="c_phone" class="form-control"  required>
                                    </div>
                                </div>
                        </div>

                        <div class="row" style="margin-top:20px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country<span class="text-danger">*</span></label>
                                        <input type="text" name="c_country" class="form-control" required >
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Shipping Address <span class="text-danger">*</span></label>
                                        <textarea name="c_shipping_address" class="form-control"  required rows="4"></textarea>
                                    </div>
                                </div>
                        </div>

                        <div class="row" style="margin-top:20px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Customer Email</label>
                                        <input type="email" name="c_email" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" name="c_zipcode" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top:20px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Extra Phone</label>
                                        <input type="text" name="c_extra_phone" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Customer City</label>
                                        <input type="text" name="c_city" class="form-control" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <table>
                                            <tr>
                                                <th>Payment Type</th>
                                                <td><input type="radio" name="payment_type" value="paypal">Paypal</td>
                                                <td><input type="radio" name="payment_type" value="ssl_commerze">Bkash/Rocket/Nagad</td>
                                                <td><input type="radio" name="payment_type" value="hand_cash" checked>Cash On Delivery</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="sub" value="Place Order" class="btn btn-primary btn-block">
                                </div>
                            </div>


                    </div>
                  </div>
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                    <div style="display: none;">
                        @php
                            $cartproducts = App\Models\ShoppingCart::where('user_id',Auth::user()->id)->get();
                            $subtotal = 0;
                         @endphp

                           <table class="table">
                             <thead>
                                <th>qty</th>
                                <th>price</th>
                             </thead>
                             <tbody>
                                @foreach ( $cartproducts as $product)
                                    <tr>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->product->selling_price*$product->quantity }}</td>
                                    </tr>
                                    @php
                                        $subtotal =  $subtotal+ $product->product->selling_price*$product->quantity;
                                    @endphp
                                @endforeach
                             </tbody>
                           </table>
                    </div>

                    <div style="margin-top: 10px;">
                        <p>Sub Total: <span style="float: right">{{ $subtotal }} TK.</span></p>
                        <p style="margin-top:5px;">Coupon(@if (Session('coupon'))
                            {{ Session::get('coupon')['coupon_code'] }}
                        @endif) <a href="{{ url('coupon/remove') }}" title="Remove Coupon"><span class="text-danger">x</span></a> <span style="float: right">@if (Session('coupon'))
                            {{ Session::get('coupon')['amount'] }} TK.
                        @endif</span></p>

                      <?php
                        if(Session('coupon')){
                            $total= $subtotal-Session::get('coupon')['amount'];
                        } else{
                            $total = $subtotal;
                        }
                      ?>


                        <p style="margin-top:5px;">Total: <span style="float: right">{{ $total }} TK.</span></p>


                      <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                      <input type="hidden" name="total" value="{{ $total }}">


                    </div>
                </form>
                    <hr>

                  @if(!Session('coupon'))
                    <form action="{{ url('/apply/coupon') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label>Coupon Code</label>
                                <input type="text" name="coupon_code" class="form-control" placeholder="Enter Coupon Code">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="sub" value="Apply Coupon" class="btn btn-info">
                            </div>
                        </form>
                  @endif
                  </div>
               </div>
            </div>
        </div>
    </div>
@endsection
