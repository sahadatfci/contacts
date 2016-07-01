<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ trans('config.site_title') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('public/assets/css/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('pagecss')
            <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/assets/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('elements.admin_header')
    @include('elements.left_menu')
    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>
</div>






<!-- Scripts -->
<!-- jQuery 2.1.4 -->
<script src="{{asset('public/assets/js/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('public/assets/js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/assets/js/fastclick.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/assets/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/assets/js/demo.js')}}"></script>
<!-- custom script -->
<script src="{{asset('public/assets/js/custom.js')}}"></script>

@yield('pagejs')
</body>
</html>