@extends('frontend.templates.master', [
    'title' => 'Giỏ hàng sản phẩm của bạn',
    'include'=>[],

])
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="#" title="Return to Home">Trang chủ</a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page">Giỏ hàng của bạn</span>
            </div>
            <!-- ./breadcrumb -->
            <!-- page heading-->
            <h2 class="page-heading no-line">
                <span class="page-heading-title2">Tóm tắt giỏ hàng</span>
            </h2>
            <!-- ../page heading-->
            <div class="page-content page-order">
                <ul class="step">
                    <li class="current-step"><span>01. Tóm tắt</span></li>
                    <li><span>02. Đăng nhập</span></li>
                    <li><span>03. Địa chỉ</span></li>
                    <li><span>04. Vận chuyển</span></li>
                    <li><span>05. Thanh toán</span></li>
                </ul>
                <div class="heading-counter warning">Giỏ hàng của bạn:
                    <span>{{$content->count()}} Sản phẩm</span>
                </div>
                <div class="order-detail-content">
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                        <tr>
                            <th class="cart_product">Sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th  class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($content as $item)
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="{{asset($item->options->image)}}" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="{{url('product', ['id'=>$item->id])}}" style="color: #3498db;">{{$item->name}} </a></p>
                                {{-- <small class="cart_ref">SKU : #123654999</small><br> --}}
                                <small><a href="#">Khối lượng : {{$item->options->weight/1000}} kg</a></small><br>
                                {{-- <small><a href="#">Size : S</a></small> --}}
                            </td>
                            <td class="cart_avail"><span class="label label-success">In stock</span></td>
                            <td class="price"><span>{{number_format($item->price,0,",",".")}} VNĐ</span></td>
                            <td class="qty">
                                <input class="form-control input-sm input-quantity-{{$item->id}}" type="text" value="{{$item->qty}}">
                                <a href="{{url('update-item-cart')}}" rowId="{{$item->rowId}}" pId="{{$item->id}}"  class="btn btn-success update-cart">Cập nhật</a>
                            </td>
                            <td class="action">
                                <a href="{{url('remove-item-cart', ['rowId'=>$item->rowId])}}">Delete item</a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        {{--<tr>--}}
                            {{--<td colspan="2" rowspan="2"></td>--}}
                            {{--<td colspan="3">Total products (tax incl.)</td>--}}
                            {{--<td colspan="2">122.38 €</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3"><strong>Tổng tiền</strong></td>
                            <td colspan="2" class="total"><strong>{{number_format($total,0,",",".")}} VNĐ</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="cart_navigation">
                        <a class="prev-btn" href="{{url()->previous()}}">Tiếp tục mua hàng</a>
                        <a class="next-btn" href="{{url('check-out')}}">Hoàn tất thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
