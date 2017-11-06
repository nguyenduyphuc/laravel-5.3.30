<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a class="first-item" href="#"><img alt="phone" src="{{asset('frontend')}}/assets/images/phone.png" />0977701666</a>
                <a href="{{url('contact-us')}}"><img alt="email" src="{{asset('frontend')}}/assets/images/email.png" />Liên hệ với chúng tôi ngay hôm nay !</a>
            </div>
{{--             <div class="currency ">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">USD</a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Dollar</a></li>
                        <li><a href="#">Euro</a></li>
                      </ul>
                </div>
            </div>
            <div class="language ">
                <div class="dropdown">
                      <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                      <img alt="email" src="{{asset('frontend')}}/assets/images/fr.jpg" />French
                      
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><img alt="email" src="{{asset('frontend')}}/assets/images/en.jpg" />English</a></li>
                        <li><a href="#"><img alt="email" src="{{asset('frontend')}}/assets/images/fr.jpg" />French</a></li>
                    </ul>
                </div>
            </div> --}}
            
            <div class="support-link">
                <a href="#">Dịch vụ</a>
                <a href="#">Hỗ trợ</a>
            </div>
    
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <?php $cate_menu = App\Category::where('status', 1)->get();?>
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="{{url('/')}}"><img alt="Shop võ thuật Việt Bắc" src="{{asset('frontend')}}/assets/images/introduce-logo.png" /></a>
            </div>
            <div class="col-xs-7 col-sm-7 header-search-box">
                <form class="form-inline"  method="get" action="{{url('search')}}">
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                      <div class="form-group form-category">
                        <select class="select-category" name="category_search">
                            <option value="">Tất cả danh mục</option>
                            @foreach($cate_menu as $search)
                                <option value="{{$search->id}}">{{$search->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group input-serach">
                        <input type="text" name="key"  placeholder="Ao giap ...">
                      </div>
                      <button type="submit" class="pull-right btn-search"></button>
                </form>
            </div>
            {{--Shopping Cart--}}
            <?php $content =  Cart::content();?>
            <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
                <a class="cart-link" href="{{url('cart')}}">
                    <span class="title">Giỏ hàng</span>
                    <span class="total">{{number_format(Cart::total(),0,",",".")}} VNĐ</span>
                    <span class="notify notify-left">{{Cart::count()}}</span>
                </a>
                <div class="cart-block">
                    <div class="cart-block-content">
                        <h5 class="cart-title"> Sản phẩm trong giỏ hàng</h5>
                        <div class="cart-block-list">
                            <ul>
                                @foreach($content as $item)        
                                <li class="product-info">
                                    <div class="p-left">
                                        <a href="{{url('remove-item-cart', ['rowId'=>$item->rowId])}}" class="remove_link"></a>
                                        <a href="{{url('product', ['id'=>$item->id])}}">
                                        <img class="img-responsive" src="{{asset($item->options->image)}}" alt="p10">
                                        </a>
                                    </div>
                                    <div class="p-right">
                                        <p class="p-name">{{$item->name}}</p>
                                        <p class="p-rice">{{number_format($item->price,0,",",".")}} VNĐ</p>
                                        <p>Qty: {{$item->qty}}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="toal-cart">
                            <span>Tổng tiền</span>
                            <span class="toal-price pull-right">{{number_format(Cart::total(),0,",",".")}} VNĐ</span>
                        </div>
                        <div class="cart-buttons">
                            <a href="{{url('check-out')}}" class="btn-check-out">Thanh Toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- END MANIN HEADER -->
    
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">Danh Mục</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                        </h4>
                        <div class="vertical-menu-content is-home">
                            <ul class="vertical-menu-list">
                                @foreach($cate_menu as $category)
                                    <li>
                                        <a class="{{!$category->children->isEmpty() ? 'parent' :''}}" href="{{url('category', ['id'=>$category->id])}}">{{$category->name}}</a>
                                        @if(!$category->children->isEmpty())
                                        <div class="vertical-dropdown-menu">
                                            <div class="vertical-groups col-sm-12">
                                                <div class="mega-group col-sm-4">
                                                    <h4 class="mega-group-header"><span>{{$category->name}}</span></h4>
                                                    <ul class="group-link-default">
                                                    @foreach($category->children as $category2)
                                                        <li><a href="{{url('category', ['id'=>$category2->id])}}">{{$category2->name}}</a></li>
                                                    @endforeach    
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </li>
                                @endforeach
                               {{--  <li class="cat-link-orther">
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="{{asset('frontend')}}/assets/data/5.png">
                                        Television
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="{{asset('frontend')}}/assets/data/7.png">Computers &amp; Networking
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                    <a href="category.html">
                                        <img class="icon-menu" alt="Funky roots" src="{{asset('frontend')}}/assets/data/6.png">
                                        Toys &amp; Hobbies
                                    </a>
                                </li>
                                <li class="cat-link-orther">
                                <a href="category.html"><img class="icon-menu" alt="Funky roots" src="{{asset('frontend')}}/assets/data/9.png">Jewelry &amp; Watches</a></li> --}}
                            </ul>
                            <div class="all-category"><span class="open-cate">Tất cả danh mục</span></div>
                        </div>
                    </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="">
                                        <a class=""  href="{{url('about-us')}}">Giới thiệu về chúng tôi</a>
                                    </li>
                                   
                                    <li><a href="{{url('contact-us')}}">Liên Hệ với chúng tôi</a></li>
                                    <?php $pages = App\Page::where('status', 1)->get();?>
                                    @if(!$pages->isEmpty())
                                        @foreach($pages as $page)
                                            <li><a href="{{url('page',['id'=>$page->id])}}">{{$page->title}}</a></li>
                                        @endforeach
                                    @endif
                                    
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>