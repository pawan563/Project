@extends('ecom.ecommerce')
@section('title', 'Category')

@section('content')
<div class="col-sm-9">
     <div class="pull-left">
       <input type="text" class="form-controller" placeholder="Search" id="livesearch" name="search"></input>
     </div> 
     <div class="pull-right">
     &nbsp;  &nbsp;<a class="btn btn-warning" href="{{route('export')}}">Export Category Data</a>
     </div>
     
      <div class="pull-right">
     	<a href="{{route('category.create')}}" class="btn btn btn-success">{{ __('Add New Category') }}
        </a>
      </div><br>
      <hr><br>
      <div class='row'> 
        @if($message = Session::get('success'))
        <div class="alert alert-success">{{$message}}</div>
        @endif  
      <table id="table" class="table table-bordered Job_table  background: #337ab7;
    color: #ffff;">
              <thead>
                <tr>        
                    <th>Sr. No.</th>
                    <th>Category Name</th> 
                    <th>Category Description</th>      
                    <th>Status</th> 
                    <th>Action</th> 
                </tr>
              </thead> 
              <tboby>
           
        @include('category.catlisting')
            </tbody>      
         </table>
         </div>
         </div>   

    </div>
   
@endsection

@section('js')
 <script>
     $( document ).ready(function() {
        $(document).on('click',".pagination li a",function(e){
        e.preventDefault();
         var path = $(this).attr('href');
         ajaxRequest(path,'get');

          function ajaxRequest(url,type,data=null){
            $.ajax({
              type : type,
              url : url,
              data:data,
                success:function(data){
                $('tbody').html();
                $('tbody').html(data);
                }
            });
          } 
      });



   $(document).on('click', '.delete', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url = "category/" + id;
   
    swal({
      title: "Are you sure!",
      type: "error",
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes!",
      showCancelButton: true,
     },
     function() {
      $.ajax({
       url: url,
       type: "DELETE" ,
       data: {
        id: id,
        "_token": $('meta[name="csrf-token"]').attr('content')
       },
       dataType: 'json',
       success: function(data) {
        console.log(data); 
        if (data) {
         location.reload();
        }
       },
       error: function(data){
          alert("ERROR")
        }  
      });
     }   
    );
   });


    $('#livesearch').on('keyup',function(){
    $value=$(this).val();
      $.ajax({
      type : 'get',
          url : '{{URL::to('categorysearch')}}',
          data:{'search':$value},
             success:function(data){
             $('tbody').html();
             $('tbody').html(data);
             }
      });
    });
   });
  </script>   
@endsection