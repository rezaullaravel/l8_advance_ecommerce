@extends('admin.admin_master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3><strong>Edit Pickup Point</strong>
                        <a href="{{ url('/admin/pickup/point') }}" class="btn btn-dark" style="float: right"><strong>Back</strong></a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ url('/admin/pickup-point/update') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $pickup_point->id }}">
                    <div class="card-body">
                        <div class="form-group">
                                <label>Pickup Point Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $pickup_point->name }}" class="form-control">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                        </div>

                        <div class="form-group">
                                <label>Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ $pickup_point->phone }}"  class="form-control">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                        </div>

                        <div class="form-group">
                                <label>Address<span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control"   rows="5">{{ $pickup_point->address }}</textarea>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>{{-- end row --}}
      </div>
</section>
@endsection
