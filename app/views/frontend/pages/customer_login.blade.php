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
    <style>
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #eee;
    }

    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    </style>

    <link rel="shortcut icon" href="/frontend-assets/images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="/frontend-assets/js/html5shiv.js"></script>
      <script src="/frontend-assets/js/respond.min.js"></script>
      <![endif]-->
  </head>

  <body>

    <div class="container" id="content">

    @if(Session::has('flash_message'))
      <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{Session::get('flash_message')}}
      </div>
        
    @endif

      {{Form::open(['route'=>'customer_login', 'class'=>"form-signin"])}}
        <h2 class="form-signin-heading" style="font-size: 25px; margin-bottom: 20px;">THÔNG TIN ĐĂNG NHẬP</h2>
        <input type="email" class="form-control" name="email" placeholder="Email address" required autofocus>
        {{error_for('email',$errors)}}
        <input type="password" class="form-control" name="password" placeholder="Password" style="margin-top: 5px;" required>
                {{error_for('password',$errors)}}

        <p>
            <input type="checkbox" name="remember" value="true" style="margin-left: 20px;"> Lưu thông tin đăng nhập
        </p>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
      </form>

    </div> <!-- /container -->


@include('frontend.layouts.footer')