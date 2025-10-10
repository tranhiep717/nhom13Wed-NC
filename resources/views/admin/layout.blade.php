<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Admin Panel')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- AdminLTE 4 CSS -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
   <link type="text/css" rel="stylesheet" href="{{ asset('css/my_style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

  <div class="wrapper">
    @include('admin.partials.navbar')
    @include('admin.partials.sidebar')

    <main class="content-wrapper">
      @yield('content')
    </main>

    @include('admin.partials.footer')
  </div>

  <!-- AdminLTE 4 JS -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
