@extends('admin.layouts.master')
@section('footer')

@stop
@section('content')
<div class="page-content-wrapper">
	<div class="page-content">


		<!-- BEGIN PAGE HEADER-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
						Edit: {{$product->name}}
				</h3>
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{URL::route('admin')}}">
							Trang chủ
						</a>
						<i class="fa fa-angle-right"></i>
						<a href="{{URL::route('admin.products.index')}}">
							Products
						</a>
						<i class="fa fa-angle-right"></i>
						Edit: {{$product->name}}

					</li>

				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		{{portlet_open('Product information','blue')}}
		{{flash_message()}}
		<div class="row">
			<div class="col-md-12">

				<!-- Product name -->
				{{Form::model($product,['route'=>['admin.products.update',$product->id],'method'=>'PUT'])}}
				<div class="row">
				{{HForm::input([
                					'name'=>'name',
                					'title'=>'Tên gói sản phẩm',
                					'width'=>'6',
                					],$errors
                				)}}
				</div>
				<!-- Product domains amount -->

				<div class="row">
				{{HForm::input([
                					'name'=>'domains_amount',
                					'title'=>'Số lượng Domain',
                					'width'=>'6',
                					],$errors
                				)}}

				</div>
				<!-- Hạn sử dụng Form Input -->
				<div class="row">
					<div class="form-group col-md-6">
						{{Form::label('duration','Hạn sử dụng:')}}
						{{Form::text('duration',null,['class'=>'form-control'])}}
                        {{error_for('duration',$errors)}}

					</div>
				</div>

				<!-- Status Form Input -->
				<div class="row">
					<div class="form-group col-md-6">
						{{Form::label('status','Trạng thái:')}}
						{{Form::text('status',null,['class'=>'form-control'])}}
                        {{error_for('status',$errors)}}

					</div>
				</div>

				<!-- Price Form Input -->
				<div class="row">
					<div class="form-group col-md-6">
						{{Form::label('price','Giá tiền:')}}
						{{Form::text('price',null,['class'=>'form-control'])}}
						{{error_for('price',$errors)}}
					</div>
				</div>
                <div class="row">
                    <div class="col-md-12 col-md-offset-2">
                    {{Form::submit('Update',['class'=>'btn blue'])}}
                    </div>
                </div>




				{{Form::close()}}

				</div>
			</div>
			{{portlet_close()}}


			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>


@stop