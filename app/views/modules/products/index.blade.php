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
					Create new Product
				</h3>
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{URL::route('admin')}}">
							Trang chủ
						</a>
						<i class="fa fa-angle-right"></i>
						Products
					</li>

				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
		<div class="col-md-12">
		    <a href="{{URL::route('admin.products.create')}}" class="btn green" style="margin-bottom: 20px;">Tạo gói sản phẩm mới</a>
		</div>
		</div>
		{{portlet_open('Các gói sản phẩm','green')}}
		{{flash_message()}}
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Tên</th>
								<th>Domain</th>
								<th>Thời hạn</th>
								<th>Giá</th>
								<th class="col-md-1"></th>
								<th class="col-md-1"></th>
							</tr>
						</thead>
						<tbody>
						@foreach(Product::orderBy('name')->get() as $product)
							<tr>
								<td>{{$product->name}}</td>
								<td>{{$product->domains_amount}} domains</td>
								<td>{{$product->duration}} ngày</td>
								<td>{{$product->price}} VNĐ</td>
								<td><a href="{{URL::route('admin.products.edit',$product->id)}}" class="btn btn-sm blue">EDIT</a></td>
								<td><a href="#" class="btn btn-sm red">DELETE</a></td>

							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
                

				</div>
			</div>
			{{portlet_close()}}


			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>


@stop