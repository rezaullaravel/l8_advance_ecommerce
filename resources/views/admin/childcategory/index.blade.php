@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2 class="card-title">Child category List</h2>
                      </div>

                      <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Sl no.</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Subcategory Name</th>
                                    <th class="text-center">Child Category</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($childcategories as $key=>$child)
                                  <tr class="text-center">
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $child->subcategory->category->category_name }}</td>
                                    <td>{{ $child->subcategory->subcategory_name }}</td>
                                    <td>{{ $child->childcategory_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.childcategory.edit',$child->id) }}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                                        <a href="{{ route('admin.childcategory.delete',$child->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>
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
