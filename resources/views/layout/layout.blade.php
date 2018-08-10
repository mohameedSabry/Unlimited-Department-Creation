<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <link rel="stylesheet" href="{{ asset('depttree/src/themes/default/style.css')}}" type="text/css">

    <link rel="stylesheet" href="{{asset('/')}}css/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="{{asset('/')}}css/dist/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/')}}css/dist/font-awesome/css/font-awesome.min.css">


    <!-- Styles -->


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @yield('content')

</div>

</body>


</html>
