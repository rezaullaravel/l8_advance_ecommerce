@extends('admin.admin_master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3>Add Warehouse
                        <a href="{{ url('/admin/warehouse') }}" class="btn btn-dark" style="float: right">Back</a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ url('/admin/warehouse/store') }}" method="POST">
                      @csrf
                    <div class="card-body">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Warehouse Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control"  placeholder="Enter warehouse name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="exampleInputEmail1">Warehouse Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control"  placeholder="Enter warehouse phone number">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                        </div>

                        <div class="form-group">
                                <label for="exampleInputEmail1">Warehouse Address<span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control"  placeholder="Enter warehouse address" rows="5"></textarea>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>{{-- end row --}}
      </div>
</section>
@endsection
