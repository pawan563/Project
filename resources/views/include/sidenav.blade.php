
    <div class="col-sm-3 sidenav">
    </br>
      <!-- <h2 class="text-center">Ecom</h2> -->
      </br> 
      <ul id="" class="nav nav-pills nav-stacked">
      <li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}">
        <a href="{{route('dashboard.index')}}">Dashboard</a></li></br>

        <li class="{{ (request()->is('category*')) ? 'active' : '' }}">
        <a href="{{route('category.index')}}">Category</a></li></br> 
        
        <li class="{{ (request()->is('products*')) ? 'active' : '' }}">
        <a href="{{route('products.index')}}">Products</a></li></br> 
        
        <li class="">       
        <a href="{{route('logout')}}">Logout</a></li></br> 

      </ul><br>
    </div>