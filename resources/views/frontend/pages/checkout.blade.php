@extends('frontend.templates.master', [
    'title' => 'Thanh toán',
    'include'=>[],

])
@section('content')
<?php 

    $weight =0;
    foreach (Cart::content() as $value) {
        $weight += $value->options->weight;
    }    
?>
<div class="columns-container">
    <div class="container" id="columns">
        <h3 class="checkout-sep">2. Thông tin giao hàng</h3>
        <form action="{{url('add-customer')}}" method="POST">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="hidden" value="{{$weight}}" id="weight">
         <input type="hidden" value="" name="feeship" id="value-fee-ship">
         <input type="hidden" value="{{Cart::total()}}" name="total" id="total">
         <div class="row">
             <div class="col-sm-8">
                  <div class="box-border">
                <ul>
                    <li class="row">
                        <div class="col-sm-6">
                            <label for="first_name" class="required">Họ tên đầy đủ</label>
                            <input type="text" class="input form-control" value="{{old('name')}}" name="name" id="first_name" required>
                            @if ($errors->has('name'))
                                <p class="error">{{ $errors->first('name') }}</p>
                            @endif
                        </div><!--/ [col] -->
                        <div class="col-sm-6">
                            <label for="telephone" class="required">Số Điện Thoại</label>
                            <input class="input form-control" type="text" name="phone" value="{{old('phone')}}" id="telephone" required>
                            @if ($errors->has('phone'))
                                <p class="error">{{ $errors->first('phone') }}</p>
                            @endif
                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row">
                        <div class="col-sm-6">
                            <label for="company_name">Công ty</label>
                            <input type="text" name="company" class="input form-control" id="company_name">
                        </div>
                        <div class="col-sm-6">
                            <label for="email_address" class="required">Email</label>
                            <input type="text" class="input form-control" value="{{old('email')}}" name="email" id="email_address" required>
                            @if ($errors->has('email'))
                                <p class="error">{{ $errors->first('email') }}</p>
                            @endif
                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row"> 
                        <div class="col-xs-12">

                            <label for="address" class="required">Địa chỉ</label>
                            <input type="text" class="input form-control" name="address" placeholder="Làng - Xã " value="{{old('address')}}" id="address" required>
                            @if ($errors->has('address'))
                                <p class="error">{{ $errors->first('address') }}</p>
                            @endif

                        </div><!--/ [col] -->

                    </li><!-- / .row -->

                    <li class="row">                        
                        <div class="col-sm-6">
                            <label class="required">Tỉnh</label>
                                <select class="input form-control state" name="state" required>
                                    <option>-- Vui lòng chọn tỉnh --</option>
                                    @foreach($states as $state)
                                        <option distance="{{$state->distance}}" value="{{$state->value}}">{{$state->name}}</option>
                                    @endforeach
                                    @if ($errors->has('state'))
                                        <p class="error">{{ $errors->first('state') }}</p>
                                    @endif
                                    {{-- <option value="hanoi">Hà Nội</option>
                                    <option value="hochiminh">Hồ Chí Minh</option>
                                    <option value="danang">Đà Nẵng</option>
                                    <option value="haiphong">Hải Phòng</option>
                                    <option value="thainguyen">Thái Nguyên</option>
                                    <option value="angiang">An Giang</option>
                                    <option value="vungtau">Bà Rịa - Vũng Tàu</option>
                                    <option value="bacgiang">Bắc Giang</option>
                                    <option value="baccan">Bắc Cạn</option>
                                    <option value="baclieu">Bạc Liêu</option>
                                    <option value="bacninh">Bắc Ninh</option>
                                    <option value="bentre">Bến Tre</option>
                                    <option value="binhdinh">Bình Định</option>
                                    <option value="binhduong">Bình Dương</option>
                                    <option value="binhphuoc">Bình Phước</option>
                                    <option value="binhthuan">Bình Thuận</option>
                                    <option value="camau">Cà Mau</option>
                                    <option value="caobang">Cao Bằng</option>
                                    <option value="daclak">Đắc Lắk</option>
                                    <option value="dacnong">Đắc Nông</option>
                                    <option value="dienbien">Điện Biên</option>
                                    <option value="dongnai">Đồng Nai</option>
                                    <option value="dongthap">Đồng Tháp</option>
                                    <option value="gialai">Gia Lai</option>
                                    <option value="hagiang">Hà Giang</option>
                                    <option value="hanam">Hà Nam</option>
                                    <option value="hatinh">Hà Tĩnh</option>
                                    <option value="haiduong">Hải Dương</option>
                                    <option value="haugiang">Hậu Giang</option>
                                    <option value="hoabinh">Hòa Bình</option>
                                    <option value="hungyen">Hưng Yên</option>
                                    <option value="khachhoa">Khách Hòa</option>
                                    <option value="kiengiang">Kiên Giang</option>
                                    <option value="kontum">Kon Tum</option>
                                    <option value="laichau">Lai Châu</option>
                                    <option value="lamdong">Lâm Đồng</option>
                                    <option value="langson">Lạng Sơn</option>
                                    <option value="laocai">Lào Cai</option>
                                    <option value="longan">Long An</option>
                                    <option value="namdinh">Nam Định</option>
                                    <option value="nghean">Nghệ An</option>
                                    <option value="ninhbinh">Ninh Bình</option>
                                    <option value="ninhthuan">Ninh Thuận</option>
                                    <option value="phutho">Phú Thọ</option>
                                    <option value="quangbinh">Quảng Bình</option>
                                    <option value="quangnam">Quảng Nam</option>
                                    <option value="quangngai">Quảng Ngãi</option>
                                    <option value="quangninh">Quảng Ninh</option>
                                    <option value="quangtri">Quảng Trị</option>
                                    <option value="soctrang">Sóc Trăng</option>
                                    <option value="sonla">Sơn La</option>
                                    <option value="tayninh">Tây Ninh</option>
                                    <option value="thaibinh">Thái Bình</option>
                                    <option value="thanhhoa">Thanh Hóa</option>
                                    <option value="hue">Thừa Thiên Huế</option>
                                    <option value="tiengiang">Tiền Giang</option>
                                    <option value="travinh">Trà Vinh</option>
                                    <option value="tuyenquang">Tuyên Quang</option>
                                    <option value="vinhlong">Vĩnh Long</option>
                                    <option value="vinhphuc">Vĩnh Phúc</option>
                                    <option value="yenbai">Yên Bái</option>
                                    <option value="phuyen">Phú Yên</option> --}}
                                </select>
                        </div><!--/ [col] -->
                        <div class="col-sm-6">
                            <label for="city" class="required">Huyện</label>
                                <select id="city" class="input form-control" name="district" required>
                                {{-- <option value=""> Chọn thành phố</option> --}}
                                </select>
                                @if ($errors->has('district'))
                                    <p class="error">{{ $errors->first('district') }}</p>
                                @endif
                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <br>
                    <li class="row">                        
                        <div class="col-sm-6">
                            <label class="required">Phương thức thanh toán</label><br>
                            <input type="radio" name="methodpayment" id="cod" value="cod" checked>COD
                            <input type="radio" name="methodpayment" id="ctnh" value="ctnh">Chuyển tiền qua ngân hàng
                            <div id="show-cod">
                                <i>Là dịch vụ sử dụng kèm theo một trong các dịch vụ chuyển phát trong nước. Thay người bán giao hàng đến tận tay người mua .</i>
                            </div>
                            <div id="show-ctnh">
                                
                            </div>
                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <br>
                    <li>
                        <button type="submit" class="button">Continue</button>
                    </li>
                </ul>
            </div>
             </div>
             <div class="col-sm-4 box-border">
                 <h3>Thông tin đơn hàng ({{Cart::count()}} sản phẩm)</h3>
                 <table class="table table-condensed">
                    <tr>
                        <th><b>Sản phẩm</b></th>
                        <th><b>Số lượng</b></th>
                        <th><b>Giá</b></th>
                    </tr>
                    @foreach(Cart::content() as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->qty}}</td>
                            <td>{{number_format($item->price,0,",",".")}}</td>
                        </tr>    
                    @endforeach
                </table>
                <div class="row">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Tạm tính :</td>
                                <td>{{number_format(Cart::total(),0,",",".")}} VNĐ</td>
                            </tr>
                            <tr>
                                <td>Phí Vận chuyển</td>
                                <td value="" id="fee-ship"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
             </div>
         </div>
           
        </form>
    </div>
</div>        
@endsection    