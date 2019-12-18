@extends('ecom.ecommerce')

@section('title', 'Products')

@section('content')
<div class="col-sm-9">

     <form id="filterForm">
        <div class="pull-left">
        <input type="text" class="form-controller" placeholder="Search" id="search" name="search"></input>
        </div>
        <div class="pull-center">
        <level>&nbsp; &nbsp; &nbsp; Group by Search :  </level>
        <select name="status" class="groupsearch" id="groupsearch">
            <option value="">All</option>
            <option value="1">Active</option>
            <option value="0">In-Active</option>
        </select> 
        </div>
    </form>
     <div class="pull-right">
        <a href=" {{route('products.create')}}" class="btn btn btn-success">{{ __('Add New Product') }}
        </a>
      </div>
    <div id="listing">
    @include('product.listing')
    </div>
         
    </div>

@endsection 



@section('js')
 <script>
      //Delete Product
        $(document).on('click', '.delete', function(e) {
          e.preventDefault();
          var id = $(this).data('id');
          var url = "products/" + id;
        
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

  //Pagination
  $( document ).ready(function() {
    $(document).on('click',".pagination li a",function(e){
      e.preventDefault();
      var path = $(this).attr('href');
      ajaxRequest(path,'get');
    });


  // On Click Search
    $('#search').on('keyup',function(){
    $value=$(this).val();
    var path = window.location.href;
    ajaxRequest(path,'get');
    });
 
    // Group wise Search Active/ Inactive and All
    $(document).on('change', '#groupsearch', function() {
      var path = window.location.href;
      ajaxRequest(path,'get');
    });
    function ajaxRequest(url,type,data=null){
      formAllData = $('#filterForm').serialize();

      $.ajax({
        type : type,
            url : url,
            data:formAllData,
              success:function(data){
              $('#listing').html();
              $('#listing').html(data);
              }
        });
    }
});

</script>




@endsection
