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
					Bảng điều khiển.
				</h3>
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{URL::route('admin')}}">
							Trang chủ
						</a>
						<i class="fa fa-angle-right"></i>
					</li>

				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		{{flash_message()}}

<!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->
</div>


@stop