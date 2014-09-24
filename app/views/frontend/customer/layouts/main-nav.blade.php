      <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{URL::route('home')}}">Easy DNS</a>
                <button data-target="#navbar-collapse-01" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                </button>
            </div>
            <div id="navbar-collapse-01" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                <?php
                 $main_nav = Menu::whereMenuspackId(3)->whereParent(0)->orderBy('order')->get();

                 ?>

                @foreach($main_nav as $menu)
                    <li
                    @if($menu->id == Menu::currentSelected())
                    class="active"
                    @endif
                    ><a href="{{$menu->link}}">{{$menu->title}}</a></li>
                @endforeach
                    {{--<li class="dropdown">--}}
                        {{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">BẢNG GIÁ<b class="caret"></b></a>--}}
                        {{--<span class="dropdown-arrow"></span>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="#">Action</a></li>--}}
                            {{--<li><a href="#">Another action</a></li>--}}
                            {{--<li><a href="#">Something else here</a></li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="#"></a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào {{Sentry::getUser()->first_name}} <span class="caret"></span></a>
                               <ul class="dropdown-menu" role="menu">
                                 <li><a href="#">gói {{Customer::current()->product()->name}} <span class="label label-success" style="margin-left:20px;">nâng cấp</span></a></li>
                                 <li><a href="{{URL::To('customer/logout')}}">Đăng xuất</a></li>
                               </ul>
                             </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>