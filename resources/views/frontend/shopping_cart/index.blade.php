@extends('frontend.frontend_master')
@section('title')
Shopping Cart
@endsection
@section('main-content')
{{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
--}}
<style>
   .qtystyle{
   width: 27px;
   text-align: center;
   }
</style>
<!--banner-->
<div class="banner-top" style="margin-top: 15px;">
   <div class="container">
      <h3 >Shopping Cart</h3>
      <h4><a href="{{ url('/') }}">Home</a><label>/</label>Shopping Cart</h4>
      <div class="clearfix"> </div>
   </div>
</div>
<!-- contact -->
<div class="check-out">
   <div class="container">
      <div class="spec ">
         <h3>Shopping Cart</h3>
         <div class="ser-t">
            <b></b>
            <span><i></i></span>
            <b class="line"></b>
         </div>
      </div>
      @if(Auth::check())

        @php
            $products = App\Models\ShoppingCart::where('user_id',Auth::user()->id)->get();
        @endphp
        @php
            $total = 0;
        @endphp

          @if (count($products)>0)
         <table class="table cartTable">
            <tbody>
               <tr>
                  <th class="t-head">Sl no.</th>
                  <th class="t-head head-it ">Products</th>
                  <th class="t-head">Thumbnail</th>
                  <th class="t-head">Price</th>
                  <th class="t-head">Quantity</th>
                  <th class="t-head">Color</th>
                  <th class="t-head">Size</th>
                  <th class="t-head">Action</th>
               </tr>

               @foreach ($products as $key => $product)
               <tr class="cross cartpage">
                  <td class="t-data"> {{ $key+1 }}</td>
                  <td class="t-data">
                     {{ $product->product->name }}
                  </td>
                  <td class="t-data">
                     <img src="{{ asset($product->product->thumbnail) }}" alt="" width="80" height="80">
                  </td>
                  <td class="t-data">{{ $product->product->selling_price*$product->quantity }} TK.</td>
                  <td class="t-data">
                     <div class="input-group quantity">
                        @if ($product->quantity>1)
                        <button class="input-group-text qtyDecrement"
                           data-id="{{ $product->id }}",
                           >-</button>
                        @else
                        <button class="input-group-text"
                           >-</button>
                        @endif
                        <input type="text" class="qty-input qtystyle"  value="{{ $product->quantity }}">
                        <button class="input-group-text qtyIncrement"
                           data-id="{{ $product->id }}",
                           >+</button>
                     </div>
                  </td>

                  <td class="t-data">
                    <select name="color"  class="form-control color" required data-id={{ $product->id }}>
                        <option value="" selected disabled>Select</option>
                        <option value="red" {{ $product->color=='red'?'selected':'' }}>Red</option>
                        <option value="green" {{ $product->color=='green'?'selected':'' }}>Green</option>
                        <option value="blue" {{ $product->color=='blue'?'selected':'' }}>Blue</option>
                    </select>
                   </td>

                   <td class="t-data">
                    <select name="size"  class="form-control size" required>
                        <option value="1" {{ $product->size=='1'?'selected':'' }}>1</option>
                        <option value="2" {{ $product->size=='2'?'selected':'' }}>2</option>
                        <option value="3" {{ $product->size=='3'?'selected':'' }}>3</option>
                    </select>
                   </td>

                  <td class="t-data">
                     <button  class="btn btn-danger" data-id="{{ $product->id }}",  id="deleteCartItem" title="Remove"><i class="fa fa-trash"></i></button>
                  </td>
               </tr>
               @php
               $total = $total + $product->product->selling_price*$product->quantity;
               @endphp
               @endforeach
               <tr>
                  <td colspan="3" class="t-data"><strong>Total Price</strong></td>
                  <td class="t-data"><strong>{{ $total }} TK.</strong></td>
                  <td class="t-data"></td>
                  <td class="t-data"></td>
               </tr>
            </tbody>
         </table>
          @else
           <h4 class="text-danger text-center">Your shopping card is empty</h4>
          @endif
          <h4 class="text-danger text-center cartProductempty" style="display: none;">Your shopping card is empty</h4>

      @endif
   </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
{{-- ajax setup --}}
<script>
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

</script>
{{-- ajax setup end --}}
{{-- cart quantity increment --}}
<script>
   $(document).ready(function(){
      $(document).on('click','.qtyIncrement',function(){
          let rowId = $(this).data('id');

          // console.log(quantity);

          var data = {
              _token: '{{csrf_token()}}',
              'rowId':rowId,

              }

          $.ajax({
              url:'/quantity/increment',
              method:'POST',
              data:data,


              success:function(response){
                 $('.table').load(location.href+' .table');
              //    console.log('success');
              },
          })
      })
   });

</script>
{{-- cart quantity increment end --}}

{{-- cart quantity decrement --}}
<script>
   $(document).ready(function(){
      $(document).on('click','.qtyDecrement',function(){
          let rowId = $(this).data('id');


         // alert(rowId);

          var data = {
              _token: '{{csrf_token()}}',
              'rowId':rowId,

              }

          $.ajax({
              url:'/quantity/decrement',
              method:'POST',
              data:data,


              success:function(response){
                 $('.table').load(location.href+' .table');
              //    console.log('success');
              },
          })
      })
   });

</script>
{{-- cart quantity decrement end --}}

{{-- delete cart item --}}
<!--delete cart item code is situated in frontend master page-->
{{-- delete cart item end --}}


{{-- cart color change --}}
<script>
    $(document).ready(function(){
       $(document).on('change','.color',function(){
           let rowId = $(this).data('id');
           let color = $(this).val();


           //alert(rowId);

           var data = {
               _token: '{{csrf_token()}}',
               'rowId':rowId,
               'color':color,

               }

           $.ajax({
               url:'/cart-color/update',
               method:'POST',
               data:data,


               success:function(response){
                  $('.table').load(location.href+' .table');
                    //toastr start
                    Command: toastr["success"](response.status)

                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    //toastr start end
               },
           })
       })
    });

 </script>
{{-- cart color change end --}}
