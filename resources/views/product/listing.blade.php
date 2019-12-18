<hr>
      <div class='row'> 
        @if($message = Session::get('success'))
        <div class="alert alert-success">{{$message}}</div>
        @endif
     <table class="table table-bordered Job_table">  
        <thead>
               <tr id="table">      
                  <th>Sr No</th>
                  <th>Product Name</th>
                  <th>Product Category</th>
                  <th>Product Description</th>
                  <th>SKV</th>
                  <th>Price</th>                      
                  <th>Status</th>
                  <th>Product Image</th>
                  <th>Action</th> 
              </tr>
          </thead> 
          <tbody>
          @forelse ($result as $key => $product)
            <tr>      
                <th>{{++$key}}</th>
                <th>{{$product->product_name}}</th>
                <th> @foreach($product->categories as $category)
                {{$category->category_name. ','}}
                @endforeach
                </th>
                <th>{{$product->desription}}</th>
                <th>{{$product->vks}}</th>
                <th>{{$product->price}}</th>
                <th>@if($product->status==1)
                    {{'Active'}}
                    @else
                    {{'InActive'}}
                    @endif
                </th>

        <th><img height="100" width="100" src="{{asset('storage/images/'.$product->image)}}"></img></th>
        <th>
            <!-- <button class="btn btn btn-danger delete" data-url="{{route('products.destroy',$product->id)}}">Delete</button> -->
            <a herf="/products/{destroy}" class="btn btn btn-danger delete" data-id="{{$product->id}}">Delete </a>
            <a href="/products/{{$product->id}}/edit" class="btn btn btn-info edit" data-id="{{$product->id}}">Edit</a>
        </th>
      </tr>
      @empty
       <tr>
       <td colspan="100%">No Records Exists</td>
       </tr>   
    @endforelse

        <tr>
            <td colspan=9>
            {{$result->links()}} 
            </td>
        </tr>
    </tbody>          
 </table>