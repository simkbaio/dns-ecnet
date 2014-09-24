@extends('frontend.customer.layouts.master')
@section('footer')
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
</script>

@stop

@section('content')
<div class="container" id="content">
	<h3 class="page-title">
		Thông tin tên miền: {{$domain->name}}
	</h3>
	<div class="col-md-12">
	    {{bootstrap_message()}}
	</div>
	<div class="col-md-12">
	<h4>Các bản ghi</h4>
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
			            {{Form::text('name','',[])}}
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

					</td>
					<td>
						<div class="data-show">
							<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
						</div>
						<div class="data-edit hide">
							<a class="btn btn-default btn-sm update-cancel">Hủy</a>
						</div>
					</td>
					{{Form::close()}}
				</tr>
			    @endforeach
			</tbody>
		</table>       
	</div>
</div>




@stop