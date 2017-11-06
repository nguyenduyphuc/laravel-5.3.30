@extends('frontend.templates.master', [
    'title' => 'Chi tiết sản phẩm '.$product->name,
    'include'=>[]
])

@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{url('/')}}" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="{{url('category', ['id'=>$product->category->id])}}" title="quay lai danh muc">{{$product->category->name}}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="#" title="">{{$product->name}}</a>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-12" id="center_column">
                <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-5">
                                <!-- product-imge-->
                                <div class="product-image">
                                    <div class="product-full">
                                        <img id="product-zoom" src='{{asset($product->getMedia('image')[0]->getUrl())}}' height="512px" width="420px" data-zoom-image="{{asset($product->getMedia('image')[0]->getUrl())}}"/>
                                    </div>
                                    <div class="product-img-thumb" id="gallery_01">
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="21" data-loop="false">
                                        @if($product->getMedia('image')->isEmpty()== false)
                                            @foreach($product->getMedia('image') as $media)
                                            <li>
                                                <a href="#" data-image="{{asset($media->getUrl())}}" data-zoom-image="{{asset($media->getUrl())}}">
                                                    <img id="product-zoom"  src="{{asset($media->getUrl())}}" /> 
                                                </a>
                                            </li>
                                            @endforeach
                                        @endif
                                        </ul>
                                    </div>
                                </div>
                                <!-- product-imge-->
                            </div>
                            <div class="pb-right-column col-xs-12 col-sm-7">
                                <h1 class="product-name">{{$product->name}}</h1>
                                {{-- <div class="product-comments">
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="comments-advices">
                                        <a href="#">Based  on 3 ratings</a>
                                        <a href="#"><i class="fa fa-pencil"></i> write a review</a>
                                    </div>
                                </div> --}}
                                <div class="product-price-group">
                                    <span class="price">{{number_format($product->price,0,",",".")}} VNĐ</span>
                                    @if($product->compare_price > $product->price)
                                    <span class="old-price">{{number_format($product->compare_price,0,",",".")}} VNĐ</span>
                                    <span class="discount">Tiết kiệm {{number_format($product->compare_price - $product->price,0,",",".")}} VNĐ</span>
                                    @endif
                                    
                                </div>
                                <div class="info-orther">
                                    {{-- <p>Item Code: #453217907</p> --}}
                                    {{-- <p>Availability: <span class="in-stock">In stock</span></p> --}}
                                    {{-- <p>Condition: New</p> --}}
                                </div>
                                <div class="product-desc">
                                    Shop Việt Bắc bán hàng online các sản phẩm võ thuật phục vụ cho việc thi đấu và tập luyện võ thuật của các môn võ như Boxing, Kick - Boxing, Muay Thái, MMA, BJJ, Võ Cổ Truyền Việt Nam, Vovinam - Việt Võ Đạo, Karate, Taekwondo, Vịnh Xuân, Hồng Gia, Thái Lý Phật và các môn võ thuật khác.
                                </div>
                                {{-- <div class="form-option">
                                    <p class="form-option-title">Available Options:</p>
                                    <div class="attributes">
                                        <div class="attribute-label">Color:</div>
                                        <div class="attribute-list">
                                            <ul class="list-color">
                                                <li style="background:#0c3b90;"><a href="#">red</a></li>
                                                <li style="background:#036c5d;" class="active"><a href="#">red</a></li>
                                                <li style="background:#5f2363;"><a href="#">red</a></li>
                                                <li style="background:#ffc000;"><a href="#">red</a></li>
                                                <li style="background:#36a93c;"><a href="#">red</a></li>
                                                <li style="background:#ff0000;"><a href="#">red</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="attributes">
                                        <div class="attribute-label">Qty:</div>
                                        <div class="attribute-list product-qty">
                                            <div class="qty">
                                                <input id="option-product-qty" type="text" value="1">
                                            </div>
                                            <div class="btn-plus">
                                                <a href="#" class="btn-plus-up">
                                                    <i class="fa fa-caret-up"></i>
                                                </a>
                                                <a href="#" class="btn-plus-down">
                                                    <i class="fa fa-caret-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="attributes">
                                        <div class="attribute-label">Size:</div>
                                        <div class="attribute-list">
                                            <select>
                                                <option value="1">X</option>
                                                <option value="2">XL</option>
                                                <option value="3">XXL</option>
                                            </select>
                                            <a id="size_chart" class="fancybox" href="{{asset('frontend')}}/assets/data/size-chart.jpg">Size Chart</a>
                                        </div>
                                        
                                    </div>
                                </div> --}}
                                <div class="form-action">
                                    <div class="button-group">
                                        <a class="btn-add-cart" href="{{url('add-to-cart', ['id'=>$product->id])}}">Thêm vào giỏ hàng</a>
                                    </div>
                                   {{--  <div class="button-group">
                                        <a class="wishlist" href="#"><i class="fa fa-heart-o"></i>
                                        <br>Wishlist</a>
                                        <a class="compare" href="#"><i class="fa fa-signal"></i>
                                        <br>        
                                        Compare</a>
                                    </div> --}}
                                </div>
                                <div class="form-share">
                                    <div class="sendtofriend-print">
                                        <a href="javascript:print();"><i class="fa fa-print"></i> In</a>
                                        {{--<a href="#"><i class="fa fa-envelope-o fa-fw"></i>Chia sẻ lên Facebook</a>--}}
                                    </div>
                                    <div class="network-share">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab product -->
                        <div class="product-tab">
                            <ul class="nav-tab">
                                <li class="active">
                                    <a aria-expanded="false" data-toggle="tab" href="#product-detail">Chi tiết sản phẩm</a>
                                </li>
                            </ul>
                            <div class="tab-container">
                                <div id="product-detail" class="tab-panel active">
                                    {!! html_entity_decode($product->description, ENT_QUOTES, 'UTF-8') !!}
                                </div>
                                <div id="information" class="tab-panel">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td width="200">Compositions</td>
                                            <td>Cotton</td>
                                        </tr>
                                        <tr>
                                            <td>Styles</td>
                                            <td>Girly</td>
                                        </tr>
                                        <tr>
                                            <td>Properties</td>
                                            <td>Colorful Dress</td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="reviews" class="tab-panel">
                                    <div class="product-comments-block-tab">
                                        <div class="comment row">
                                            <div class="col-sm-3 author">
                                                <div class="grade">
                                                    <span>Grade</span>
                                                    <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                                <div class="info-author">
                                                    <span><strong>Jame</strong></span>
                                                    <em>04/08/2015</em>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 commnet-dettail">
                                                Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
                                            </div>
                                        </div>
                                        <div class="comment row">
                                            <div class="col-sm-3 author">
                                                <div class="grade">
                                                    <span>Grade</span>
                                                    <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                                <div class="info-author">
                                                    <span><strong>Author</strong></span>
                                                    <em>04/08/2015</em>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 commnet-dettail">
                                                Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
                                            </div>
                                        </div>
                                        <p>
                                            <a class="btn-comment" href="#">Write your review !</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./tab product -->
                        <!-- box product -->
                        @if(!$product_relas->isEmpty())
                        <div class="page-product-box">
                            <h3 class="heading">Sản phẩm liên quan</h3>
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                           
                            @foreach($product_relas as $product_rela)
                                <li>
                                    <div class="product-container">
                                        <div class="left-block">

                                                
                                                
                                            <a href="{{url('product', ['id'=>$product_rela->id])}}">
                                                @if(!$product_rela->getMedia('image')->isEmpty())
                                                    <img class="img-responsive" alt="product_rela" src="{{asset($product_rela->getMedia()[0]->getUrl())}}" />
                                                @endif
                                            </a>
                                            <div class="add-to-cart">
                                                <a title="Thêm vào giỏ hàng" href="{{url('add-to-cart', ['id'=>$product_rela->id])}}">Thêm vào giỏi hàng</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="{{url('product', ['id'=>$product_rela->id])}}">{{$product_rela->name}}</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">{{number_format($product_rela->price,0,",",".")}} VNĐ</span>
                                                @if($product_rela->compare_price > $product_rela->price)
                                                    <span class="price old-price">{{number_format($product_rela->compare_price,0,",",".")}} VNĐ</span>
                                                @endif
{{--                                                 <span class="price old-price">$52,00</span>
 --}}                                       </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        @endif
                        <!-- ./box product -->
                        <!-- box product -->
                        
                        <!-- ./box product -->
                    </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
@endsection()