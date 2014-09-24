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
                	<div class="col-dm-12">
                	    <div class="col-md-5">
                	        {{Form::text('sub-domain',null,['class'=>'form-control'])}}
                	    </div>
                	    <div class="col-md-7">
                	        {{Form::select('domain',[
                	            'free1.com'=>'.free1.com ( miễn phí )',
                	            'free2.com'=>'.free2.com ( miễn phí )',
                	            'free3.com'=>'.domain.com ( thuộc sở hữu )',
                	            ],null,['class'=>'form-control'])}}
                	    </div>
                	</div>
                </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            <input type="submit" class="btn btn-success" value="Thêm" />
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
        {{Form::close()}}
    </div><!-- /.modal -->