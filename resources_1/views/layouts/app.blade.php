<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/styles.css') }}">
@yield('styles')
<title>@yield('title')</title>
</head>
<body class="hold-transition sidebar-collapse layout-fixed">
<div class="wrapper"> 
@include('inc.global.navbar')
@include('inc.global.sidebar')
@yield('content')
@include('inc.global.footer')
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('dist/js/app.js') }}"></script>
@yield('scripts')
</body>
</html>