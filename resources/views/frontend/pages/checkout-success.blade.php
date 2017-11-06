@extends('frontend.templates.master', [
    'title' => 'Đã nhận đơn hàng',
    'include'=>[],

])
@section('content')
    <div class="columns-container">
    @if(session('cart') != null && session('order') != null && session('customer') != null )
        <div class="container" id="columns">
            <h3 class="page-heading no-line">
                <span class="page-heading-title2">Đơn hàng của quý khách đã được đặt thành công với thời gian dự kiến giao hàng từ 5 - 7 ngày làm việc (tùy khu vực giao hàng)</span>
            </h3>
            <div style="padding-top: 50px;">
                
                <p>1. Shop võ thuật Việt Bắc sẽ không gửi tin nhắn xác nhận đơn hàng đến quý khách. Nếu quý khách có nhu cầu xem lại thông tin mua hàng, vui lòng kiểm tra xác nhận đơn hàng đã được gửi qua email.</p>
                {{-- <p>2. Thời gian giao hàng dự kiến sẽ được cập nhật liên tục qua email và tin nhắn điện thoại. Quý khách hoàn toàn kiểm tra được tình trạng đơn hàng <a style="color: #2980b9;" href="{{url('/order-trackig')}}">tại đây</a></p> --}}
                <p>3. Khi có nhu cầu thay đổi thông tin cá nhân, quý khách vui long liên hệ với chung tôi để được thay đổi SĐT :0977701666</p>
            </div>

            <!-- ../page heading-->
            <div class="page-content page-order" style="padding-top: 5px;">
                <div class="order-detail-content">
                <h3>Chi tiết đơn hàng {{session('order')->name}}</h3>
                    <p>{{session('customer')->name}}</p>
                    <p>{{session('customer')->address}}</p>
                    <p>{{DB::table('districts')->where('value', session('customer')->district)->first()->name}} - {{DB::table('states')->where('value',session('customer')->state)->first()->name}}</p>
                    <p><b>Thư xác nhận được gửi</b> tới địa chỉ email : {{session('customer')->email}}</p>
                    <table class="table table-bordered table-responsive cart_summary">
                        @foreach(session('cart') as $cart)
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{$cart->options->image}}" alt="{{$cart->name}}">
                            </div>
                            <div class="col-md-5">
                                <a style="color: #2980b9; size: 25px;" href="{{url('product', ['id'=>$cart->id])}}">{{$cart->name}}</a>
                                <p>Số lượng  : {{$cart->qty}}</p>
                                <p>Đơn Giá  : {{$cart->price}}</p>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        @else
            <div class="row" style="padding-top: 40px; padding-bottom: 60px;">
                <div class="col-md-5 col-md-offset-4">
                    <h2 class="page-heading no-line ">
                Không có sản phẩm nào trong giỏ hàng
                </h2>
                <a class="btn btn-primary" href="{{url('/')}}">TIẾP TỤC MUA HÀNG</a>
                </div>
                
            </div>
        @endif
    </div>
@endsection
