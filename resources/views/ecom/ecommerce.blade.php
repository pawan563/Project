<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title','ecom')</title>
@include('include.head')
</head>
<body>
<div class="container-fluid">
  <div class="row content">
    
  @include('include.sidenav')
  <br>
  @yield('content')
   
  </div>
</div>
<footer class="container-fluid">
@include('include.footer')

</footer>
@yield('js')
</body>
</html>
