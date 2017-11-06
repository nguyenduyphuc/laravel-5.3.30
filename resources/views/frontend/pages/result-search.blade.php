@extends('frontend.templates.master', [
    'title' => 'Kết quả tìm kiếm cho từ khóa '.$_GET['key'],
    'include'=>[],

])
@section('content')
@inject('request', 'Illuminate\Http\Request')
<div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <!-- ./breadcrumb -->
            <!-- row -->
            <div class="row">
                <!-- Left colunm -->
                
                <!-- ./left colunm -->
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-12" id="center_column">

                    <!-- category-slider -->
                @if($result->isEmpty() != true)
                    <div id="view-product-list" class="view-product-list">
                        <h2 class="page-heading">
                            <span class="page-heading-title">Kết quả tìm kiếm : <b><i>{{$_GET['key']}}</i></b></span>
                        </h2>
                        <ul class="display-product-option">
                            <li class="view-as-grid selected">
                                <span>grid</span>
                            </li>
                            <li class="view-as-list">
                                <span>list</span>
                            </li>
                        </ul>
                        <!-- PRODUCT LIST -->
                        
                        <ul class="row product-list grid">
                            @foreach($result as $product)
                            <li class="col-sx-12 col-sm-3" style="height: 410px;">
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="{{url('product', ['id'=>$product->id])}}">
                                            <img class="img-responsive" alt="product" src="{{asset($product->getMedia()[0]->getUrl())}}" />
                                        </a>
                                        {{-- <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div> --}}
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="{{url('add-to-cart', ['id'=>$product->id])}}">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="{{url('product', ['id'=>$product->id])}}">{{$product->name}}</a></h5>
                                        {{-- <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div> --}}
                                        <div class="content_price">
                                            <span class="price product-price">{{number_format($product->price,0,",",".")}} VNĐ</span>
                                            @if($product->compare_price > $product->price)
                                            <span class="price old-price">{{number_format($product->compare_price,0,",",".")}} VNĐ</span>
                                            @endif
                                        </div>
                              
                                        <div class="info-orther">
                                            <p>Khối lượng: {{$product->weight}} kg</p>
                                            {{-- <p class="availability">Availability: <span>In stock</span></p> --}}
                                            <div class="product-desc">
                                                {!!$product->description!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>                            
                        <!-- ./PRODUCT LIST -->
                    </div>
                    <!-- ./view-product-list-->
                    <div class="sortPagiBar">
                        {{-- <div class="bottom-pagination">
                            <nav>
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">Next &raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}
                        <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                              <?php $i; ?>
                        @if($result != null && empty($result->error))
                            @if($result->currentPage() > 1 )
                                <li>
                                  <a href="{{$request->fullUrlWithQuery([ 'page'=>($result->currentPage()-1)])}}" title="Pre page" aria-label="Pre">
                                      <span aria-hidden="true">&laquo; Pre</span>
                                  </a>
                                </li>
                            @endif

                            @for($i =1; $i<=$result->lastPage(); $i++)
                                <li class="{{ $result->currentPage() == $i ? 'active' :''  }}"><a href="{{$request->fullUrlWithQuery([ 'page'=>$i])}}" title="page {{$i}}">{{$i}}</a></li>
                            @endfor

                            @if($result->lastPage() > $result->currentPage() )
                                <li>
                                  <a href="{{$request->fullUrlWithQuery([ 'page'=>($result->currentPage()+1)])}}" title="Next page" aria-label="Next">
                                      <span aria-hidden="true">Next &raquo;</span>
                                  </a>
                                </li>
                            @endif
                        @endif
                          </ul>
                        </nav>
                    </div>
                    </div>
                    @else
                    <h2 style="padding: 20px;" class="text-center">Không có kết quả nào cho từ khóa tìm kiếm</h2>
                @endif    
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
@endsection