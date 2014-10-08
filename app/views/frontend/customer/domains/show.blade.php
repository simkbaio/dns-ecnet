@extends('frontend.customer.layouts.master')
@section('footer')
<script src="/admin_assets/plugins/bootbox/bootbox.min.js"></script>

<script>
var parent_tr;
	jQuery(document).ready(function($) {
		$(".edit-record").click(function() {
			$('.data-show').attr('class', 'data-show');
			$('.data-edit').attr('class', 'data-edit hide');

			parent_tr = $(this).parent().parent().parent();
			console.log(parent_tr);
            parent_tr.children().children('.data-show').attr('class', 'data-show hide');
            parent_tr.children().children('.data-edit').attr('class', 'data-edit');

		});
	});
    jQuery(document).ready(function($) {
        $(".delete-button").click(function() {
            var delete_button = $(this);
            bootbox.confirm("Bạn chắc chắn muốn xóa?", function(result) {
                if(result){
                    window.location = delete_button.attr('data-src');
                }
            });
        });
    });
</script>

@stop

@section('content')
<div class="container" id="content">
    <div class="col-md-12">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>
Trang quản lý</a></li>
            <li><a href="{{URL::route('customer.domains')}}">Quản lý tên tên miền</a></li>
            <li class="current">{{$domain->name}}</li>
        </ul>
    </div>
	<h3 class="page-title">
		Thông tin tên miền: {{$domain->name}}
	</h3>

	<div class="col-md-12">
	<h4>Các bản ghi</h4>
		@include('flash::message')
	    <div class="table-responsive">
            <table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Tên</th>
					<th>Loại</th>
					<th>Giá trị</th>
					<th class="col-md-1">TTL</th>
					<th>Status</th>
					<th class="col-md-1"></th>
					<th class="col-md-1"></th>
				</tr>
			</thead>
			<tbody>
			    <tr class="success" id="record-register">
			    {{Form::open(['route'=>'customer.records.store'])}}
			    {{Form::hidden('domain_id',$domain->id)}}
			        <td>
			            {{Form::text('name','',['class'=>'col-md-6'])}} <span class="font-size:24px;">.{{$domain->name}}</span>
			            {{error_for('name',$errors)}}
			        </td>
			        <td>
			            {{Form::select('type',[
			            'A'=>'A',
			            'MX'=>'MX',
			            'TXT'=>'TXT',
			            'CNAME'=>'CNAME',
			            ],'A',[])}}
                        {{error_for('type',$errors)}}

			        </td>
			        <td>
			            {{Form::text('content','',[])}}
                        {{error_for('value',$errors)}}

			        </td>
			        <td>
			            {{Form::text('ttl',120,['class'=>'col-md-12'])}}
			            {{error_for('ttl',$errors)}}
			        </td>
			        <td></td>
			        <td colspan="2"><input type="submit" class="btn btn-success btn-sm" value="Tạo mới"/></td>
                {{Form::close()}}
			    </tr>
                @foreach($domain->records as $record)
				<tr>
				{{Form::open(['route'=>['customer.records.update',$record->id],'method'=>'PUT'])}}
					<td>
											
					<span class="data-show">{{Str::limit($record->name,100)}}</span>{{Form::hidden('id',$record->id)}}{{Form::text('name',$record->name,['class'=>'data-edit hide'])}}</td>
					<td><span class="data-show">{{$record->type}}</span>{{Form::select('type',[
                        'A'=>'A',
                        'MX'=>'MX',
                        'TXT'=>'TXT',
                        'CNAME'=>'CNAME',
					],$record->type,['class'=>'data-edit hide'])}}</td>
					<td><span class="data-show">{{Str::limit($record->content,45)}}</span>{{Form::text('content',$record->content,['class'=>'data-edit hide'])}}</td>
					<td class="col-md-1"><span class="data-show">{{$record->ttl}}</span><div class="data-edit hide">
						{{Form::text('ttl',$record->ttl,['class'=>'col-md-12'])}}
					</div></td>
					<td><span class="label label-warning"><i class="fa fa-ellipsis-h"></i></span></td>
					<td>
						<div class="data-show">
							<a class="btn btn-info btn-sm edit-record"><i class="fa fa-pencil-square-o"></i></a>
						</div>
						
						<div class="data-edit hide">
							<input type="submit" class="btn btn-info btn-sm update-record" value="Lưu" />
						</div>
                        {{Form::close()}}
					</td>
					<td>
						<div class="data-show">

							<a href="#" class="'btn btn-danger btn-sm delete-button" data-src="{{URL::route('customer.records.delete',$record->id)}}">Xóa</a>

						</div>
						<div class="data-edit hide">

							<a class="btn btn-default btn-sm update-cancel">Hủy</a>
						</div>
					</td>

				</tr>
			    @endforeach
			</tbody>
		</table>
		</div>
	</div>
</div>




@stop