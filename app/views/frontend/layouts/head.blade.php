<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title','DNS | STV')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="/frontend-assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="/frontend-assets/css/flat-ui.css" rel="stylesheet">
    <link href="/frontend-assets/css/main.css" rel="stylesheet">
    @yield('head')
<link href="{{URL::to('admin_assets')}}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="shortcut icon" href="/frontend-assets/images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="/frontend-assets/js/html5shiv.js"></script>
      <script src="/frontend-assets/js/respond.min.js"></script>
      <![endif]-->
  </head>