<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title') | Ecommerce Admin Panel</title>
    <link href="{{ asset('backEndAssets') }}/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">


@include('backEnd.includes.header')
<div id="layoutSidenav">
    @include('backEnd.includes.left-sidebar')
    <div id="layoutSidenav_content">
        @yield('main-content')

        @include('backEnd.includes.footer')
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset('backEndAssets') }}/assets/demo/chart-area-demo.js"></script>
<script src="{{ asset('backEndAssets') }}/assets/demo/chart-bar-demo.js"></script>
<script src="{{ asset('backEndAssets') }}/js/scripts.js"></script>
<script src="{{ asset('backEndAssets') }}/js/datatables-simple-demo.js"></script>
</body>
</html>
