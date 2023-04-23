<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <title>{{config('app.name')}}</title>
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('admin/img/favicon.png')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="{{asset('admin/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <link href="{{asset('admin/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="off-canvas-sidebar">
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{asset('admin/img/login.jpg')}}'); background-size: cover; background-position: top center;">
      <div class="container">
        <div class="row">
        @yield('content')
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('admin/js/core/jquery.min.js')}}"></script>
</body>
</html>