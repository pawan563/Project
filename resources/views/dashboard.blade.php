@extends('ecom.ecommerce')
@section('page_title')
    {{ "Dashboard Page" }}
@endsection

@section('content')
        
		<div class='row'>
        <div class='col-md-6'>
  <style>	
   .col-xs-6 {
  background-color: lightgrey;
  width: 238px;
  border: 1px solid #337ab7;
  padding: 50px;
  margin: 30px;
}
</style>
<script type="text/javascript">65
	$(window).load(function() 
	{
		 $("#overlay").fadeOut("slow");
	});
</script>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Admin Controller</small>
      </h1>
    </section>
    <br>
    
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue ">
                <div class="inner">
                <h3>{{$pro.' Products'}}</h3> 
                </div>
                <div class="icon ">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('products.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h3>{{$cat.' Category'}}</h3> 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
       
          </div>
    </section>
</div>
</div>
</div><!-- /.row -->

@endsection