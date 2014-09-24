@extends('frontend.layouts.master')

@section('title')
    Đăng kí tài khoản thành công!
@stop

@section('head')
<style>
    #notice {
        margin-top: 50px;
    }
    #notice .panel-heading {
        background-color: #16a085;
        color:#fff;
        text-align: center;
    }

</style>

@stop
@section('content')
<div class="container" id="content">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" id="notice">
              <div class="panel-heading">Bạn đã đăng kí tài khoản thành công!</div>
              <div class="panel-body">
                   Chúng tôi đã gửi email kích hoạt tài khoản cho bạn. Mời bạn check mail để kích hoạt tài khoản.
                   <p style="text-align: center;"><a href="{{URL::route('home')}}">Click vào đây để trở về trang chủ</a></p>
              </div>
        </div>
    </div>
</div>
@stop