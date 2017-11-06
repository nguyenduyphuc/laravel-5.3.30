@extends('frontend.templates.master', [
    'title' => 'Danh Mục '.$category->name,
    'include'=>[],

])
@section('content')
@inject('request', 'Illuminate\Http\Request')
<?php $arr=explode('/', $request->path()); $arr2=explode('-', $arr[1]);?>
<div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">Home</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">{{$category->name}}</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- row -->
            <div class="row">
                <!-- Left colunm -->
                <div class="column col-xs-12 col-sm-3" id="left_column">
                    <!-- block category -->
                    <div class="block left-module">

                        <p class="title_block">Danh Mục</p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-category">
                                <div class="layered-content">
                                    <ul class="tree-menu">
                                    @foreach($categories as $category_parent)
                                        <li class="{{$arr2[0]==$category_parent->id? "active":''}}">
                                            <span></span><a href="{{url('category', ['id'=>$category_parent->id])}}">{{$category_parent->name}}</a>
                                            <ul class="tree-menu">
                                            <?php $categories2 = DB::table('categories')->where('parent_id', $category_parent->id)->get();?>
                                                @foreach($categories2 as $subcategory)
                                                    <li class="{{$arr2[0]==$subcategory->id? "active":''}}"><span></span><a href="{{url('category', ['id'=>$subcategory->id])}}">{{$subcategory->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- ./layered -->
                        </div>
                    </div>

                    <!-- ./block category  -->
                    <!-- block filter -->
                    <div class="block left-module">
                        <p class="title_block">Lựa chọn tìm kiếm</p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-filter-price">
                        
                                <!-- filter price -->
                                <div class="layered_subtitle">Giá</div>
                            <div class="layered-content slider-range">

                                    <div data-label-reasult="Range:" data-min="0" data-max="50000000" data-unit="" class="slider-range-price" data-value-min="1000" data-value-max="5000000"></div>

                                    <div class="amount-range-price" >Khoảng: {{$request->has('filter-price')? $price_min." - ". $price_max:''.number_format(1000, 0, ",", ".").' - '.number_format(5000000, 0, ",", ".") }}</div>
                                    <ul class="list-inline">
                                        <li style="padding-bottom: 4px;">
                                            <input type="number" name="min-price" style="border: 1px solid #95a5a6;" class="min-price" value="{{$request->has('filter-price')?$price_min:1000}}"  placeholder="1000">&nbsp;&nbsp;-
                                        </li>
                                        <li>
                                            <input type="number" name="max-price" style="border: 1px solid #95a5a6;" class="max-price" value="{{$request->has('filter-price')?$price_max:5000000}}"  placeholder="5000000">
                                        </li>
                                        <li><button type="submit" cat_id="{{$category->id}}" id="filter-price"><span class="icon-filter glyphicon glyphicon-play"></span></button></li>
                                    </ul>


                               <!--  <ul class="check-box-list">
                                    <li>
                                        <input type="checkbox" id="p1"  name="cc" />
                                        <label for="p1">
                                        <span class="button"></span>
                                        $20 - $50<span class="count"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p2" name="cc" />
                                        <label for="p2">
                                        <span class="button"></span>
                                        $50 - $100<span class="count"></span>
                                        </label>   
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p3" name="cc" />
                                        <label for="p3">
                                        <span class="button"></span>
                                        $100 - $250<span class="count"></span>
                                        </label>   
                                    </li>
                                </ul>
 -->
                            </div>
                                <!-- ./filter price -->
                                <!-- filter color -->
                                
                                <!-- ./filter color -->
                                <!-- ./filter brand -->
                                
                                <!-- ./filter brand -->
                                <!-- ./filter size -->
                                
                                <!-- ./filter size -->
                            </div>
                            <!-- ./layered -->

                        </div>
                    </div>
                    <!-- ./block filter  -->

                    <!-- left silide -->
        
                    
                </div>
                <!-- ./left colunm -->
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
        
                    <div id="view-product-list" class="view-product-list">
                        <h2 class="page-heading">
                            <span class="page-heading-title">{{$category->name}}</span>
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
                            @foreach($products as $product)
                            
                            <li class="col-sx-12 col-sm-4">
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="{{url('product', ['id'=>$product->id])}}">
                                        @if($product->getMedia()->isEmpty() == false)
                                            <img class="img-responsive" alt="product" src="{{asset($product->getMedia()[0]->getUrl())}}" />
                                        @endif    
                                        </a>
         
                                        <div class="add-to-cart">
                                            <a title="Add to Cart" href="{{url('add-to-cart', ['id'=>$product->id])}}">Thêm vào giỏ hàng</a>
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
                                        <div class="info-orther">
                                            <p>Khối lượng: {{$product->weight/1000}} kg</p>
                                            {{-- <p class="availability">Availability: <span>In stock</span></p> --}}
                                            <div class="product-desc">
                                                {{htmlspecialchars($product->summary)}}
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
                        <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                              <?php $i; ?>
                        @if($products != null && empty($products->error))
                            @if($products->currentPage() > 1 )
                                <li>
                                  <a href="{{$request->fullUrlWithQuery([ 'page'=>($products->currentPage()-1)])}}" title="Pre page" aria-label="Pre">
                                      <span aria-hidden="true">&laquo; Pre</span>
                                  </a>
                                </li>
                            @endif

                            @for($i =1; $i<=$products->lastPage(); $i++)
                                <li class="{{ $products->currentPage() == $i ? 'active' :''  }}"><a href="{{$request->fullUrlWithQuery([ 'page'=>$i])}}" title="page {{$i}}">{{$i}}</a></li>
                            @endfor

                            @if($products->lastPage() > $products->currentPage() )
                                <li>
                                  <a href="{{$request->fullUrlWithQuery([ 'page'=>($products->currentPage()+1)])}}" title="Next page" aria-label="Next">
                                      <span aria-hidden="true">Next &raquo;</span>
                                  </a>
                                </li>
                            @endif
                        @endif
                          </ul>
                        </nav>
                    </div>
                  {{--       <div class="show-product-item">
                            <select name="">
                                <option value="">Show 18</option>
                                <option value="">Show 20</option>
                                <option value="">Show 50</option>
                                <option value="">Show 100</option>
                            </select>
                        </div> --}}
            {{--             <div class="sort-product">
                            <select>
                                <option value="">Tên sản phẩm</option>
                                <option value="">Giá</option>
                            </select>
                            <div class="sort-product-icon">
                                <i class="fa fa-sort-alpha-asc"></i>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>
@endsection