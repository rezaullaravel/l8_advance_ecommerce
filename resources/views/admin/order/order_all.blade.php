@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.order.all') }}" method="GET">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date"  name="date" value="{{ Request::get('date') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        <option value="all" {{ Request::get('status')=='all' ? 'selected':'' }}>All</option>

                                        <option value="0" {{ Request::get('status')=='0' ? 'selected':'' }}>Pending</option>

                                        <option value="1" {{ Request::get('status')=='1' ? 'selected':'' }}>Received</option>

                                        <option value="2" {{ Request::get('status')=='2' ? 'selected':'' }}>Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4" style="margin-top:31px;">
                                <div class="form-group">
                                    <input type="submit" value="Filter" class="btn btn-info btn-block">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>{{-- row end --}}
        <div class="row">
            <div class="col-sm-12">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2 class="card-title">Order List</h2>
                      </div>

                      <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">Sl no.</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Order Total</th>
                                    <th class="text-center">Payment Type</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($orders as $key=>$row)
                                  <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->c_phone }}</td>
                                    <td>{{ $row->user->email }}</td>
                                    <td>{{ $row->total }} TK.</td>
                                    <td>{{ $row->payment_type }} </td>
                                    <td>{{ date('d-m-Y',strtotime($row->date)) }} </td>
                                    <td>
                                        @if ($row->status=='0')
                                         <span class="text-danger">Pending</span>

                                        @endif

                                        @if ($row->status=='1')
                                          <span class="text-info">Received</span>

                                         @endif

                                       @if ($row->status=='2')
                                        <span class="text-success">Completed</span>

                                       @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.order-details',$row->id) }}" class="btn btn-success btn-sm" title="View order details"><i class="fa fa-eye"></i></a>

                                        <a href="{{ route('admin.order-status.change',$row->id) }}" class="btn btn-info btn-sm" title="Edit order staus"><i class="fa fa-pen"></i></a>

                                        <a href="{{ route('admin.order-delete',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>

                                    </td>
                                  </tr>

                               @endforeach
                            </tbody>
                        </table>
                      </div>
                   </div>
                {{-- data table end --}}
            </div>
        </div>
    </div>
 </div>


@endsection
