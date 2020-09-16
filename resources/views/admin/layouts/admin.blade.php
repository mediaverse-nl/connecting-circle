<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="web-assembled.nl">

    <title>Admin panel</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Page level plugin CSS-->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/css/admin/sb-admin.css" rel="stylesheet">

    <meta name="robots" content="noindex,nofollow" />
    <!-- Styles -->
    @stack("css")

</head>
<body class="{{Auth()->check() ? '' : 'bg-dark'}} fixed-nav sticky-footer" id="page-top">

@include('admin.components.page-loader')

@if(Auth()->check())
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" style="">
        <a class="navbar-brand" href="{!! route('admin.dashboard') !!}">Admin Panel v2.5</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            @include('admin.components.menu-left')
            @include('admin.components.menu-top')
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs -->
            @yield('breadcrumb')
            <!-- Content -->
            @yield('content')
        </div>
    </div>

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © web-assembled.nl {{date('Y')}}</small>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
        <i class="fa fa-angle-up"></i>
    </a>
@else
    @yield('content')
@endif

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- Bootstrap core JavaScript-->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        var LoaderElement = function(){
            $(".se-pre-con").fadeOut("slow");
        };
        $(window).on("load", function (e) {
            LoaderElement();
        });
        setInterval(function() {
            LoaderElement();
        }, 500);
    });
</script>
<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="/vendor/chart.js/Chart.min.js"></script>
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
{{--<script src="/js/admin/datatables-plugin.js"></script>--}}
<script src="/js/admin/sb-admin.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trunk8/1.3.3/trunk8.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.ckeditor.com/4.14.1/full-all/ckeditor.js"></script>

<!-- Custom scripts for all pages-->
@stack("scripts")

<style>
    @page { size: auto}
</style>

</body>
</html>
