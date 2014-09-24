@extends('frontend.customer.layouts.master')
@section('footer')

<script src="/admin_assets/plugins/bootbox/bootbox.min.js"></script>
<script>
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
            <h1 class="page-title">
                Quản lý tên miền
                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#add-new-domain">Thêm tên miền mới</a>
            </h1>
    @if(Session::has('flash_message'))
    <div class="row">
        <div class="col-md-12">
            {{bootstrap_message()}}
        </div>
    </div>
    @endif
        <table class="table table-striped table-hover dataTable" id="domains-table">
            <thead>
                <th>#</th>
                <th style="width:20px"></th>
                <th>Tên miền</th>
                <th>Số bản ghi</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php $i=1 ?>
            @if(Customer::current()->domains)
            @foreach(Customer::current()->domains as $domain)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{Form::checkbox('domains[]','domain.com',false)}}</td>
                    <td><a href="{{URL::route('customer.domains.show',$domain->id)}}">{{$domain->name}}</a></td>
                    <td><a href="#">4</a></td>
                    <td>Good</td>
                    <td><a href="#" class="btn btn-primary btn-sm">Edit</a></td>
                    <td><a data-src="{{URL::route('customer_delete_domain',$domain->id)}}" class="btn btn-danger btn-sm delete-button">Delete</a></td>
                </tr>
                <?php $i++; ?>
            @endforeach
             @else
               <tr>Không có domain nào</tr>
              @endif
            </tbody>
        </table>
    </div>

    @include('frontend.customer.modals.add-domain')



@stop
