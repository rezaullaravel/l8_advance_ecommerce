@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h3><b>Pickup Point List</b>
                            <a href="{{ url('/admin/pickup/point/add') }}" class="btn btn-dark" style="float: right"><b>Add New</b></a>
                        </h3>
                      </div>

                      <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">Sl no.</th>
                                    <th class="text-center">Pickup Point Name</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($pickup_points as $key=>$pickup_point)
                                  <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $pickup_point->name }}</td>
                                    <td>{{ $pickup_point->address }}</td>
                                    <td>{{ $pickup_point->phone }}</td>
                                    <td>
                                        <a href="{{ url('admin/pickup-point/edit',$pickup_point->id) }}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                                        <a href="{{ url('admin/pickup-point/trash',$pickup_point->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>
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
