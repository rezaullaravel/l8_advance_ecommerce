@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3>Edit Child Category
                        <a href="{{ url('/admin/childcategory/manage') }}" class="btn btn-dark" style="float: right;">Back</a>
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.childcategory.update') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $childcategory->id }}">
                    <div class="card-body">
                      <div class="form-group">
                            <label>Category Name<span class="text-danger">*</span></label>
                            <select name="category_id"  class="form-control">
                                <option value="" selected disabled>Select</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $childcategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>

                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>

                            @enderror
                      </div>

                      <div class="form-group">
                        <label>Sub Category Name<span class="text-danger">*</span></label>
                        <select name="subcategory_id"  class="form-control">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                             @if ($category->id == $childcategory->category_id)
                                @foreach ($category->subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $childcategory->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->subcategory_name }}</option>
                                @endforeach
                             @endif
                            @endforeach
                        </select>
                        @error('subcategory_id')
                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                  </div>

                      <div class="form-group">
                            <label>Child category name<span class="text-danger">*</span></label>
                            <input type="text"  class="form-control" name="childcategory_name" value="{{ $childcategory->childcategory_name }}">

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


{{-- javascript to show the subcategories under the selected categories --}}
<script>
    $('#categoryList').on('change', function () {
    $("#subcategoryList").attr('disabled', false); //enable subcategory select
    $("#subcategoryList").val("");
    $(".subcategory").attr('disabled', true); //disable all category option
    $(".subcategory").hide(); //hide all subcategory option
    $(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
    $(".parent-" + $(this).val()).show();
});
</script>
@endsection
