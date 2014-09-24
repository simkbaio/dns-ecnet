@extends('frontend.layouts.master' )
@section('content')
    <div class="container" id="content">
        <h1 class="page-title" style="text-align: center;">
            Đăng kí tài khoản
        </h1>
        {{Form::open()}}
        <div class="col-md-6 col-md-offset-3">
            <!-- Họ Form Input -->
            <div class="row">
                <div class="form-group col-md-6">
                    {{Form::label('last_name','Họ:')}}
                    {{Form::text('last_name',null,['class'=>'form-control'])}}
                    {{error_for('last_name',$errors)}}

                </div>
                    <!-- Tên (và tên đệm) Form Input -->
                    <div class="form-group col-md-6">
                        {{Form::label('first_name','Tên (và tên đệm):')}}
                        {{Form::text('first_name',null,['class'=>'form-control'])}}
                        {{error_for('first_name',$errors)}}

                </div>
            </div>

            <!-- Email Form Input -->
                <div class="form-group">
                    {{Form::label('email','Email:')}}
                    {{Form::text('email',null,['class'=>'form-control'])}}
                    {{error_for('email',$errors)}}
                </div>
                <!-- Password Form Input -->
                <div class="form-group">
                    {{Form::label('password','Password:')}}
                    {{Form::password('password',['class'=>'form-control'])}}
                    {{error_for('password',$errors)}}
                </div>

                <!-- Password Confirmation From Input -->
                <div class="form-group">
                    {{Form::label('password','Password Confirmation:')}}
                    {{Form::password('password_confirmation',['class'=>'form-control'])}}
                    {{error_for('password_confirmation',$errors)}}
                </div>
                <div class="form-group" style="text-align: center;">
                    {{Form::submit('Tạo tài khoản',['class'=>'btn btn-primary'])}}
                </div>



        </div>
                
        
        
        {{Form::close()}}
        

    </div>
@stop