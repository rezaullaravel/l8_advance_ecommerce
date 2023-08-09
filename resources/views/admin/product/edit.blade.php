@extends('admin.admin_master')
@section('content')
<link rel="stylesheet" href="{{ asset('admin/dropify/dropify.css') }}">
<script src="{{ asset('admin/dropify/dropify.js') }}"></script>


{{-- toggle switch button --}}
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


{{-- bootstrap tags input --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput{
        width: 100%;
    }
    .label-info{
        background-color: #007FFF;

    }
    .label {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,
        border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>

{{-- bootstrap tags input end --}}




<section class="content">
    <div class="container-fluid">
        <form action="{{ url('admin/product/update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}" >
            <div class="row">

            <div class="col-sm-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3>Edit Product
                            <a href="{{ url('/admin/product/manage') }}" class="btn btn-dark" style="float:right;">Back</a>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                        <div class="card-body">
                           <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                              </div>{{-- col-sm-6 --}}
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Code<span class="text-danger">*</span></label>
                                    <input type="text" name="code" value="{{ $product->code }}"  class="form-control">
                                    @error('code')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                              </div>{{-- col-sm-6 --}}
                           </div>{{-- row --}}

                           <div class="row">
                             <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Category<span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                          @foreach ($categories as $category)
                                            <option value="{{  $category->id }}"
                                                @if ($product->category_id==$category->id)
                                                  selected

                                                @endif>{{  $category->category_name }}
                                           </option>

                                          @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                             </div>

                             <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Subcategory<span class="text-danger">*</span></label>
                                    <select name="subcategory_id" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($categories as $category)
                                          @if ($product->category_id==$category->id)
                                               @foreach ($category->subcategories as $subcategory)
                                                   <option value="{{ $subcategory->id }}" {{ $product->subcategory_id==$subcategory->id ? 'selected' : '' }}>{{ $subcategory->subcategory_name }}</option>
                                               @endforeach

                                          @endif
                                        @endforeach

                                    </select>

                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                                </div>
                             </div>

                             <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Child category</label>
                                    <select name="childcategory_id" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($categories as $category)
                                        @if ($product->category_id==$category->id)
                                             @foreach ($category->subcategories as $subcategory)
                                                @if ($product->subcategory_id==$subcategory->id)
                                                  @foreach ($subcategory->childcategories as $childcategory)
                                                      <option value="{{ $childcategory->id }}" {{ $product->childcategory_id==$childcategory->id ? 'selected' : '' }}>{{ $childcategory->childcategory_name }}</option>
                                                  @endforeach

                                                @endif
                                             @endforeach

                                        @endif
                                      @endforeach

                                    </select>
                                </div>
                             </div>
                           </div>{{-- row --}}

                           <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                   <label>Brand<span class="text-danger">*</span></label>
                                   <select name="brand_id" class="form-control">
                                       <option value="" selected disabled>Select</option>
                                          @foreach ($brands as $brand)
                                              <option value="{{ $brand->id }}" {{ $product->brand_id==$brand->id ? 'selected':'' }}>{{ $brand->brand_name }}</option>
                                          @endforeach
                                   </select>

                                   @error('brand_id')
                                   <span class="text-danger">{{ $message }}</span>

                                   @enderror
                               </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group">
                                   <label>Pickup point</label>
                                   <select name="pickup_point_id" class="form-control">
                                       <option value="" selected disabled>Select</option>
                                          @foreach ($pickup_points as $pickup)
                                            <option value="{{ $pickup->id }}" {{$product->pickup_point_id==$pickup->id ? 'selected':'' }}>{{ $pickup->name }}</option>

                                          @endforeach
                                   </select>
                               </div>
                            </div>
                          </div>{{-- row --}}

                          <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                   <label>Unit<span class="text-danger">*</span></label>
                                   <input type="text" name="unit"  value="{{ $product->unit }}"   class="form-control">
                               </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group">
                                   <label>Tags</label>
                                   <input type="text" name="tags" value="{{ $product->tags }}"    class="form-control" data-role="tagsinput">
                               </div>
                            </div>
                          </div>{{-- row --}}

                          <div class="row">
                            <div class="col-sm-4">
                               <div class="form-group">
                                   <label>Purchase price</label>
                                   <input type="text" name="purchase_price" value="{{ $product->purchase_price }}"   class="form-control">
                               </div>
                            </div>

                            <div class="col-sm-4">
                               <div class="form-group">
                                   <label>Selling price<span class="text-danger">*</span></label>
                                   <input type="text" name="selling_price" value="{{ $product->selling_price }}"  class="form-control">

                                   @error('selling_price')
                                   <span class="text-danger">{{ $message }}</span>

                                   @enderror
                               </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Discount price</label>
                                    <input type="text" name="discount_price" value="{{ $product->discount_price }}"  class="form-control">
                                </div>
                             </div>
                          </div>{{-- row --}}


                          <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                   <label>Warehouse</label>
                                   <select  name="warehouse" class="form-control">
                                     <option value="">Select</option>
                                       @foreach ($warehouses as $warehouse)
                                          <option value="{{ $warehouse->id }}" {{ $product->warehouse==$warehouse->id ? 'selected' :'' }}>{{ $warehouse->name }}</option>
                                       @endforeach
                                   </select>
                               </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group">
                                   <label>Stock</label>
                                   <input type="text" name="stock_quantity" value="{{ $product->stock_quantity }}"  class="form-control">
                               </div>
                            </div>
                          </div>{{-- row --}}


                          <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group">
                                   <label>Color<span class="text-danger">*</span></label>
                                   <input type="text" name="color" value="{{ $product->color }}"  class="form-control">

                                   @error('color')
                                   <span class="text-danger">{{ $message }}</span>

                                   @enderror
                               </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group">
                                   <label>Size</label>
                                   <input type="text" name="size" value="{{ $product->size }}"  class="form-control">
                               </div>
                            </div>
                          </div>{{-- row --}}


                          <div class="row">
                            <div class="col-sm-12">
                               <div class="form-group">
                                   <label>Product description<span class="text-danger">*</span></label>
                                 <textarea name="description" id="description_editor" >{{ $product->description }}</textarea>

                                 @error('description')
                                 <span class="text-danger">{{ $message }}</span>

                                 @enderror
                               </div>
                            </div>
                          </div>{{-- row --}}

                          <div class="row">
                            <div class="col-sm-12">
                               <div class="form-group">
                                   <label>Video embed code</label>
                                   <input type="text" name="video"  value="{{ $product->video }}" class="form-control">
                               </div>
                            </div>
                          </div>{{-- row --}}
                        </div>{{-- card body --}}



                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <!-- /.card-body -->
                    </div>
            </div>{{-- col-sm-8 --}}

            <div class="col-sm-4">

                <div class="card">
                    <div class="card-body">
                       <div class="form-group">
                          <label>Main Thumbnail</label>
                          <input type="file" name="thumbnail" class="dropify form-control">
                       </div>
                    </div>

                    <table class="table table-bordered table-sm">
                        <tbody class="dynamic_field">
                            <tr>
                                <td>
                                    <label>Add More Images</label>
                                    <input type="file" name="images[]"  class="form-control">
                                </td>
                                <td>
                                    <label for=""></label>
                                    <button type="button" class="btn btn-success" id="add_rows" style="margin-top: 7px;" title="Add more rows"><i class="fas fa-plus"></i></button>
                                </td>
                            </tr>

                             <tr>
                                <td>
                                    @if ($product->productMultiImage)
                                        @foreach ($product->productMultiImage as $multiple)


                                            <img src="{{ asset($multiple->product_image) }}" alt="" width="60" style="border:1px solid #ff0000;"><span><a href="{{ url('/admin/multiImg/delete',$multiple->id) }}" class="text-danger" title="Remove image">X</a></span>
                                        @endforeach
                                    @endif

                                </td>
                             </tr>
                        </tbody>
                    </table>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label style="display: block">Featured Product</label>
                               <input type="checkbox" name="featured" @if ($product->featured==1)
                                   checked
                               @endif data-toggle="toggle" data-onstyle="primary" value="1">
                            </div>
                        </div>
                    </div>{{-- card --}}
                </div>{{-- card --}}

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label style="display: block">Today Deal</label>
                           <input type="checkbox" name="today_deal"   @if ($product->today_deal==1)
                           checked @endif data-toggle="toggle" data-onstyle="primary" value="1">
                        </div>
                    </div>
                </div>{{-- card --}}

                <div class="card">
                   <div class="card-body">
                    <div class="form-group">
                        <label style="display: block">Status</label>
                       <input type="checkbox" name="status" @if ($product->status==1)
                       checked @endif  data-toggle="toggle" data-onstyle="primary" value="1">
                    </div>
                   </div>
                </div>{{-- card --}}
            </div>

            </div>{{-- end row --}}
        </form>
      </div>
</section>

<script>
    $('.dropify').dropify();
</script>

<script>
    const html=`
    <tr>
        <td>
            <label></label>
            <input type="file" name="images[]"    class="form-control">
        </td>
        <td>
            <label for=""></label>
            <button type="button" class="btn btn-danger remove" title="Remove row"><i class="fas fa-trash"></i></button>
        </td>
    </tr>
    `;

    //add rows
    $('#add_rows').on('click',function(e){
        e.preventDefault();
        $('.dynamic_field').append(html);
    });

    //remove rows
    $('body').on('click','.remove',function(e){
        e.preventDefault();
        this.parentElement.parentElement.remove();
    });
</script>

 {{-- ck editor using cdn --}}
 <script src="https://cdn.ckeditor.com/4.22.1/standard-all/ckeditor.js"></script>
 <script type="text/javascript">
    CKEDITOR.replace('description_editor');
</script>


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


{{-- javascript for child category auto select --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="subcategory_id"]').on('change',function(){
            var subcategory_id=$(this).val();
            if(subcategory_id){
                $.ajax({
                    url:"{{ url('/admin/subcategory/childcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d=$('select[name="childcategory_id"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="childcategory_id"]').append(
                                '<option value="'+value.id+'">'+
                                value.childcategory_name+'</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });
    });
</script>
{{-- javascript for child category auto select end --}}

@endsection
