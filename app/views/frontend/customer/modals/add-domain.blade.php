<!--Modals-->

    <div class="modal fade" id="add-new-domain">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Đăng kí tên miền free mới</h4>
          </div>
          <div class="modal-body">
            {{Form::open(['route'=>'customer_add_domain'])}}
                <!-- Domain Form Input -->
                <div class="form-group">
                	{{Form::label('domain','Tên miền của bạn:')}}
                	{{Form::text('domain',null,['class'=>'form-control'])}}
                </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Bỏ qua</button>
            <input type="submit" class="btn btn-success" value="Thêm" />
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
        {{Form::close()}}
    </div><!-- /.modal -->