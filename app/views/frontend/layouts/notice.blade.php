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
    <META http-equiv="refresh" content="5;{{URL::to('home')}}">


@stop
@section('content')
<div class="container" id="content">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default" id="notice">
              <div class="panel-heading">{{$title}}</div>
              <div class="panel-body">
                   {{$body}}
                   <p style="text-align: center;"><a href="{{URL::route('home')}}">Click vào đây để trở về trang chủ</a></p>
              </div>
        </div>
    </div>
</div>
@stop