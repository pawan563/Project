
        @forelse ($result as $key => $category)
           <tr>
                <td>{{++$key}}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_desc }}</td>
                <td>@if($category->status==1)
                    {{'Active'}}
                    @else
                    {{'inactive'}}
                    @endif
                </td>
                <td>
                <a herf="/category/{destroy}" class="btn btn btn-danger delete" data-id="{{$category->id}}">Delete </a>

                <a href="/category/{{$category->id}}/edit" class="btn btn btn-info">Edit</a>
                </td>
          </tr>
            @empty
               <tr>
                 <td colspan="100%">No Records Exists</td>
               </tr>
            @endforelse  
            <tr>
                <td colspan=5>
                {!! $result->links() !!} 
                </td>
            </tr>      


             
