@extends('frontend.customer.layouts.master')
@section('content')

    <div class="container" id="content">
        <div class="row">

            <h1 class="page-title">
                Thông tin tài khoản
            </h1>
        </div>
        {{Form::open()}}
            <!-- Password Form Input -->
            <div class="form-group">
                {{Form::label('password','Password:')}}
                {{Form::password('password',['class'=>'form-control'])}}
            </div>
            <!-- Password Confirmation From Input -->
            <div class="form-group">
                {{Form::label('password_confirmation','Password Confirmation:')}}
                {{Form::password('password_confirmation',['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::submit('Update',['class'=>'btn btn-primary'])}}
            </div>


        {{Form::close()}}
    </div>

@stop
