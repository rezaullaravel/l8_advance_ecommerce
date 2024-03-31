@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h4>Order Details
                            <a href="{{ url('/admin/order/all') }}" class="btn btn-dark" style="float: right;">Back</a>
                        </h4>
                      </div>

                      <div class="card-body">
                        <table  class="table table-striped table-bordered table-sm" style="width:100%">
                            <tbody>

                                    <tr class="text-center">
                                        <th>Customer Name</th>
                                        <td>{{ $order->user->name }}</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Phone</th>
                                        <td>{{ $order->c_phone }}</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Email</th>
                                        <td>{{ $order->user->email }}</td>
                                    </tr>


                                    <tr class="text-center">
                                        <th>Shipping Address</th>
                                        <td>{{ $order->c_shipping_address }}</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Zip Code</th>
                                        <td>{{ $order->c_zipcode }}</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Order Date</th>
                                        <td>{{ $order->date }}</td>
                                    </tr>


                                    <tr class="text-center">
                                        <th>Payment Type</th>
                                        <td>{{ $order->payment_type }}</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th>Delivery Status</th>
                                        <td>
                                            @if ($order->status=='0')
                                            <a href="javascript:void(0)" class="btn btn-success"><span>Pending</span></a>

                                            @elseif($order->status=='1')
                                            <a href="javascript:void(0)" class="btn btn-danger"><span>Received</span></a>

                                            @elseif($order->status=='2')
                                            <a href="javascript:void(0)" class="btn btn-danger"><span>Completed</span></a>
                                            @endif
                                        </td>
                                    </tr>



                            </tbody>
                        </table>
                      </div>
                   </div>
                {{-- data table end --}}
            </div>
        </div>{{-- end row --}}

        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                    <th>Color</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $sum = 0;
                                @endphp
                                @foreach ($orderDetails as $detail)
                                    <tr class="text-center">
                                        <td>
                                            {{ $detail->product->name }}
                                        </td>

                                        <td>
                                            <img src="{{ asset($detail->product->thumbnail) }}" alt="" width="100">
                                        </td>

                                        <td>{{ $detail->product_quantity }}</td>
                                        <td>{{ $detail->product->selling_price }} TK.</td>
                                        <td>
                                            {{$detail->product->selling_price*
                                              $detail->product_quantity }} TK.
                                        </td>
                                        @php
                                            $sum = $sum + $detail->product->selling_price*
                                              $detail->product_quantity;
                                        @endphp
                                        <td>{{ $detail->product->color }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tr>
                                <th colspan="4"> <span style="float: right;">Order Total</span></th>
                                <td colspan="2"  style="font-weight: 600;">
                                    {{ $sum }} Tk.
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>{{-- end row --}}
    </div>
 </div>


@endsection
