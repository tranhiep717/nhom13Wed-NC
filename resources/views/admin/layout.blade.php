<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Admin Panel')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link type="text/css" rel="stylesheet" href="{{ asset('css/my_style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}">
    
  <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}">
    
</head>
<body>

  <div class="navbar">
    @include('admin.partials.navbar')
  </div>

 <div class="div-content">
    <div class="sidebar">
      @include('admin.partials.sidebar')
    </div>

    <div class="content-wrapper">
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
 </div>

  @include('admin.partials.footer')

</body>
</html>
