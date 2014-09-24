@extends('frontend.layouts.master')
@section('content')
<div class="jumbotron">
        <div class="container">
            <h1 id="jumbotron-slogan">Easy DNS <span>Chưa bao giờ dễ hơn thế</span></h1>
            <p>Bạn muốn Server, IP Camera System của mình luôn online 24/7 mà không cần IP tĩnh.<br/> Bạn cần một giải pháp về DNS dễ dàng và tiện dụng, chi phí hợp lý?</p>
            <p><a class="btn btn-lg btn-success" href="{{URL::route('customer_register')}}" role="button">ĐĂNG KÍ NGAY ĐỂ DÙNG MIỄN PHÍ</a></p>
        </div>
    </div>
    <div class="container">
            <div class="row demo-tiles">
            <div class="col-md-3 col-sm-6 col-sx-12">
                    <div class="tile">
                        <img src="/frontend-assets/images/icons/svg/compas.svg" alt="Compas" class="tile-image big-illustration">
                        <h3 class="tile-title">Cập nhật nhanh</h3>
                        <p>Thông tin DNS luôn được cập nhật tức thời.</p>
                        <a class="btn btn-primary btn-large btn-block" href="http://designmodo.com/flat">Xem thêm</a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-sx-12">
                    <div class="tile">
                        <img src="/frontend-assets/images/icons/svg/loop.svg" alt="Infinity-Loop" class="tile-image">
                        <h3 class="tile-title">Online 24/7</h3>
                        <p>Hệ thống luôn chạy ổn định. Bảm bảo chất lượng phục vụ.</p>
                        <a class="btn btn-primary btn-large btn-block" href="http://designmodo.com/flat">Xem thêm</a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-sx-12">
                    <div class="tile">
                        <img src="/frontend-assets/images/icons/svg/paper-bag.svg" class="tile-image">
                        <h3 class="tile-title">Giá cả hợp lý</h3>
                        <p>Chất lượng và giá cả chăc chắn làm vừa lòng bạn. </p>
                        <a class="btn btn-primary btn-large btn-block" href="http://designmodo.com/flat">Xem thêm</a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-sx-12">
                    <div class="tile">
                        <img src="/frontend-assets/images/icons/svg/gift-box.svg" alt="Gift-Box"  class="tile-image">
                        <h3 class="tile-title">Miễn phí</h3>
                        <p>Free DNS, Sẵn sàng hỗ trợ  bạn bất kì lúc nào.</p>
                        <a class="btn btn-primary btn-large btn-block" href="http://designmodo.com/flat">Xem thêm</a>
                    </div>

                </div>
            </div>
    </div>
    <!-- /.container -->


@stop