@extends('ecom.ecommerce')
@section('title', 'Add Category')

@section('content')
        <div class='col-md-9 outer_div'>        
            <form action="{{url('category')}}/{{$result->id ?? ''}}" method="post">
        {{ csrf_field() }}
        @if(isset($result))
            {{ method_field('PUT') }}
        @endif            
               <div class="text-center"><h2>Add Product Category</h2></div><br>
                    <div class="outer_div" style="background:#ddd" >
                        <div class="form-group col-md-12 row">
                        <label for="category_name" class="col-md-3 col-form-label text-md-right">{{ __('Category name') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="category_name"  value="{{ $result->category_name ?? old('category_name')}}"  autocomplete="category_name" autofocus>
                            {{$errors->first('category_name')}}<br>  
                        </div>
                    </div>


                    <div class="form-group col-md-12 row">
                        <label for="job_description" class="col-md-3 col-form-label text-md-right" >{{ __('Category Description') }}</label>

                        <div class="col-md-9">
                            <input type="text" class="form-control" name="category_desc" value="{{ $result->category_desc ?? old('category_desc')}}"  autocomplete="category_desc" autofocus>
                            {{$errors->first('category_desc')}}<br>    
                        </div>
                    </div>

                    <div class="form-group col-md-12 row">
                        <label for="job_description"  class="col-md-3 col-form-label text-md-right" >{{ __('Status') }}</label>

                        <div class="col-md-9">
                            <select name="status" class="form-control" value="{{ $result->status ?? old('status')}}">
                            {{$errors->first('status')}} 
                            <option value="1">Active</option>
                            <option value="2">In-Active</option>
                            </select>  
                        </div>
                    </div>              

                    <button type="submit"  class="btn btn-primary btn-md pull-right">Save</button>

                      
                </form>
        </div>
    </div><!-- /.row -->
@endsection
