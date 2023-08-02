@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Child Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.childcategory.store') }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                            <label>Category Name<span class="text-danger">*</span></label>
                            <select name="category_id" class="form-control">
                                <option value="" selected disabled>Select</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>

                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>

                            @enderror
                      </div>

                      <div class="form-group">
                        <label>Sub Category Name<span class="text-danger">*</span></label>
                        <select name="subcategory_id" class="form-control">
                            <option value="">Select</option>

                        </select>
                        @error('subcategory_id')
                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                  </div>

                      <div class="form-group">
                            <label>Child category name<span class="text-danger">*</span></label>
                            <input type="text"  class="form-control" name="childcategory_name" placeholder="Enter child category name">

                            @error('childcategory_name')
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

{{-- javascript for sub category auto select --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id=$(this).val();
            if(category_id){
                $.ajax({
                    url:"{{ url('/admin/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d=$('select[name="subcategory_id"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="subcategory_id"]').append(
                                '<option value="'+value.id+'">'+
                                value.subcategory_name+'</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });
    });
</script>
{{-- javascript for sub category auto select end --}}
@endsection
