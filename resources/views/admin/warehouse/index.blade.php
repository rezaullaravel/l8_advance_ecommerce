@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2><b>Warehouse List</b>
                            <a href="{{ url('/admin/warehouse/add') }}" class="btn btn-dark" style="float: right"><b>Add New</b></a>
                        </h2>
                      </div>

                      <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">Sl no.</th>
                                    <th class="text-center">Warehouse Name</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($warehouses as $key=>$warehouse)
                                  <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $warehouse->name }}</td>
                                    <td>{{ $warehouse->address }}</td>
                                    <td>{{ $warehouse->phone }}</td>
                                    <td>
                                        <a href="{{ url('admin/warehouse/edit',$warehouse->id) }}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                                        <a href="{{ url('admin/warehouse/trash',$warehouse->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>
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
