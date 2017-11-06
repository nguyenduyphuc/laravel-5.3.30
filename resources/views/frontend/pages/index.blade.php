@extends('frontend.templates.master', [
    'title' => 'Trang chủ Shop võ thuật Việt Bắc',
    'include'=>['slider', 'service'],

])
@section('content')

     <div class="content-page">
        <div class="container">
            <!-- featured category fashion -->

            @foreach($categories as $category)
            @if($category->product != null)
            <div class="category-featured">
                <nav class="navbar nav-menu nav-menu-red show-brand">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-brand"><a href="{{url('category', ['id'=>$category->id])}}">{{$category->name}}</a></div>
                  </div><!-- /.container-fluid -->
         
                </nav>
               <div class="product-featured clearfix">
                    <div class="banner-featured">
                        <div class="banner-img">
                            @if(isset($category->getMedia('image')[0]))
                                <a alt="Featurered 1"><img src="{{url('media', ['disk'=> $category->getMedia('image')[count($category->getMedia('image'))-1]->id,'filename'=>$category->getMedia('image')[count($category->getMedia('image'))-1]->file_name])}}"></a>
                            @endif
                        </div>
                    </div>
                    <div class="product-featured-content">
                        <div class="product-featured-list">
                            <div class="tab-container">
                                <!-- tab product -->
                                <div class="tab-panel active" id="tab-4">
                                    <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                    @foreach($category->product as $product)
                                        <li>
                                            <div class="left-block">
                                                <a href="{{url('product', ['id'=>$product->id])}}">
                                                @if(!$product->getMedia()->isEmpty())
                                                <img class="img-responsive" alt="product" src="{{asset($product->getMedia()[0]->getUrl())}}" />
                                                @endif
                                                </a>
                                                {{-- <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                </div> --}}
                                                <div class="add-to-cart">
                                                    <a title="Thêm vào giỏ hàng" href="{{url('add-to-cart', ['id'=>$product->id])}}">Thêm vào giỏ hàng</a>
                                                </div>
                                            </div>
                                            <div class="right-block">
                                                <h5 class="product-name"><a href="{{url('product', ['id'=>$product->id])}}">{{$product->name}}</a></h5>
                                                <div class="content_price">
                                                    <span class="price product-price">{{number_format($product->price,0,",",".")}} VNĐ</span>
                                                    @if($product->compare_price > $product->price)
                                                    <p class="price old-price">{{number_format($product->compare_price,0,",",".")}} VNĐ</p>
                                                    @endif
                                                </div>
                                                {{-- <div class="product-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div> --}}
                                            </div>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
               </div>
            </div>
            @endif
            @endforeach
            <!-- end featured category fashion -->
        </div>
    </div>
@endsection()    