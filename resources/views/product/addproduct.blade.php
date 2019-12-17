@extends('ecom.ecommerce')

@section('title', 'Add Product')

@section('content')
<div class='col-md-9 outer_div'>        
            <form action="{{url('products')}}/{{$data->id ?? ''}}" id="productForm" method="post" enctype="multipart/from-data">
            @csrf
            @if(isset($data))
                {{ method_field('PUT') }}
            @endif
                            
            <div class="text-center"><h2>Add Product Category</h2></div><br>
                <div class="outer_div" style="background:#ddd" >
                    <div class="form-group col-md-12 row">
                        <label for="product_name" class="col-md-3 col-form-label text-md-right">{{ __('Product name') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="product_name" value="{{ $data->product_name ?? old('product_name') }}"  autocomplete="product_name" autofocus>
                            <span class="error_product_name" ></span>
                            <br>
                        </div>

                    </div>


                    <div class="form-group col-md-12 row">
                        <label for="product_category" class="col-md-3 col-form-label text-md-right" >{{ __('Product Category') }}</label>
                        <div class="col-md-9">
                                <select name="product_category[]" placeholder="Select here Product Category" multiple class="chosen-select form-control" value="{{ $data->product_category ?? old('product_category') }}" class="form-control">
                                @foreach($catid as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach    
                                </select>  
                                                            
                                <span class="error_product_category" ></span>      
                             <br>    
                            <br>
                        </div>
                    </div>

                    <div class="form-group col-md-12 row">
                        <label for="desription" class="col-md-3 col-form-label text-md-right">{{ __('Product Description') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="desription" value="{{ $data->desription ?? old('desription') }}"  autocomplete="desription" autofocus>
                            <span class="error_desription" ></span>
                            <br>   
                        </div>
                    </div>

                     <div class="form-group col-md-12 row">
                        <label for="vks" class="col-md-3 col-form-label text-md-right">{{ __('Product SKU') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="vks" value="{{ $data->vks ?? old('vks') }}"  autocomplete="vks" autofocus>
                            <span class="error_vks" ></span>
                            <br>   
                        </div>
                    </div>


                    <div class="form-group col-md-12 row">
                        <label for="price" class="col-md-3 col-form-label text-md-right" >{{ __('Product Price') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="price"  value="{{ $data->price ?? old('price') }}"  autocomplete="price" autofocus>
                            <span class="error_price" ></span>
                            <br>   
                        </div>
                    </div>

                    <div class="form-group col-md-12 row">
                        <label for="image" class="col-md-3 col-form-label text-md-right" >{{ __('Product Image') }}</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="image" id="file" accept="image/*" value=""  autocomplete="image">
                            <span class="error_image" ></span>
                            <br>   
                        </div>
                    </div>


                    <div class="form-group col-md-12 row">
                        <label for="status" class="col-md-3 col-form-label text-md-right" >{{ __('Status') }}</label>

                        <div class="col-md-9">
                            <select name="status" valure="{{ $data->status ?? old('status') }}" class="form-control">
                            <span class="error_status" ></span>
                            <option value="1">Active</option>
                            <option value="0">In-Active</option>
                            </select>  
                        </div>
                    </div>              

                    <button type="submit" name="submit" value="upload"  class="btn btn-primary btn-md pull-right">Save</button>

                      
                </form>
        </div>
    </div>    

@endsection

@section('js')
<script>
$(document).ready(function($) {
    $('#productForm').submit(function(event) {
    var url = $(this).attr('action');
        event.preventDefault();

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            enctype: 'multipart/form-data', 
            contentType: false,
            dataType: 'json',
            success: function(result) {

                // alert(result.message);
                // console.log(result)
                window.location.href = result.path;
                if (result) {
                   window.location.href = products.showproduct;
                }
            },
            error: function(error) {
                console.log(error)
                var errors=error.responseJSON;
                if(error.status==422){
                 $.each(errors.errors,function(key, val){
                    console.log(key+" : "+val);
                    $('.error_'+key).text(val);
                 })
                }
                else{
                    if(error.status == 400){
                        alert(errors.message);
                    
                    }else{
                        //alert('something went wrong');  
                    }
                }
                
            }
          });
    });
    $(".chosen-select").chosen();
        $('button').click(function(){
            $(".chosen-select");
    });
 });

</script>

@endsection
