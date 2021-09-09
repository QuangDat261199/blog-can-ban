<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Tech Blog - Stylish Magazine Blog Template</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

@include('web.layout.style')
@stack('styles')
</head>
<body>

<div id="wrapper">
    @include('web.layout.header')

    @yield('content')

    <div class="dmtop">Scroll to Top</div>

    @include('web.layout.footer')

</div><!-- end wrapper -->

@include('web.layout.script')
@stack('scripts')
</body>
</html>
