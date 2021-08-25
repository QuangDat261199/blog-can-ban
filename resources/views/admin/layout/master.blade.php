<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 7.x">
    <meta name="author" content="">
    <title>@yield('title')</title>

    @include('admin.layout.style')

    @stack('styles')
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    @include('admin.layout.header')

    <!-- Page Content -->
    @yield('content')
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@include('admin.layout.script')

@stack('scripts')

</body>

</html>
