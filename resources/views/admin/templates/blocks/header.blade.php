<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Vui lòng chờ...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" target="_blank" href="{{url('/')}}">Shop võ thuật Việt Bắc</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            {{-- <ul class="nav navbar-nav navbar-right">
                <li><a href="javascritp:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
            </ul> --}}
        </div>
    </div>
</nav>
<!-- #Top Bar -->

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset('admin')}}/images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                <div class="email">{{Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        {{-- <li><a href="{{url('/profile')}}"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li role="seperator" class="divider"></li> --}}
                        <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                {{-- <li class="header">MAIN NAVIGATION</li> --}}
                <li class="active">
                    <a href="{{url('admin/dashboard')}}">
                        <i class="material-icons">home</i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">folder</i>
                        <span>Danh mục</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{asset('admin/category/list')}}">Danh sách danh mục</a>
                        </li>
                        <li>
                            <a href="{{asset('admin/category/add')}}">Thêm danh mục</a>
                        </li>
                    </ul>
                </li> --}}
                
                <li>
                    <a href="{{asset('admin/order/list')}}">
                        <i class="material-icons">add_shopping_cart</i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
                
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">local_offer</i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{asset('admin/product/list')}}">Danh sách sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{asset('admin/category/list')}}">Danh sách danh mục</a>
                            {{-- <a href="{{asset('admin/product/add')}}">Thêm sản phẩm</a> --}}
                        </li>
                    </ul>
                </li>

                

                <li>
                    <a href="{{asset('admin/customer/list')}}">
                        <i class="material-icons">people</i>
                        <span>Khách hàng</span>
                    </a>
                    {{--<ul class="ml-menu">--}}
                        {{--<li>--}}
                            {{--<a href="{{asset('admin/user/list')}}">List User</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                </li>

                <li>
                    <a href="{{asset('admin/contact/list')}}">
                        <i class="material-icons">mail</i>
                        <span>Liên hệ</span>
                    </a>
                </li>

                <li>
                    <a href="{{asset('admin/state/list')}}">
                        <i class="material-icons">location_city</i>
                        <span>Danh sách tỉnh thành</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">burst_mode</i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{asset('admin/post/list')}}">Bài viết</a>
                        </li>
                        <li>
                            <a href="{{asset('admin/page/list')}}">Trang</a>
                            {{-- <a href="{{asset('admin/product/add')}}">Thêm sản phẩm</a> --}}
                        </li>
                    </ul>
                </li>

{{--                 <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">swap_calls</i>
                        <span>Tỉnh thành</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{asset('admin/state/list')}}">Danh sách tỉnh</a>
                        </li>
                        <li>
                            <a href="{{asset('admin/district/list')}}">Danh sách Huyện</a>
                        </li>
                    </ul>
                </li> --}}


            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
{{--         <div class="legal">
            <div class="copyright">
                &copy; 2016 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.4
            </div>
        </div> --}}
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

    <!-- Right Sidebar -->
    
    <!-- #END# Right Sidebar -->
</section>