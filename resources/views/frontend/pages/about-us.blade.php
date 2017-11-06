
@extends('frontend.templates.master', [
    'title' => 'Liên hệ với chúng tôi',
    'include'=>[],

])
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="{{url('/')}}" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Giới thiệu về chúng tôi</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Giới thiệu về chúng tôi</span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-12" id="contact_form_map">
                    <h3 class="page-subheading">Thông tin về chúng tôi</h3>
                    <p>Shop Việt Bắc bán hàng online các sản phẩm võ thuật phục vụ cho việc thi đấu và tập luyện võ thuật của các môn võ như Boxing, Kick - Boxing, Muay Thái, MMA, BJJ, Võ Cổ Truyền Việt Nam, Vovinam - Việt Võ Đạo, Karate, Taekwondo, Vịnh Xuân, Hồng Gia, Thái Lý Phật và các môn võ thuật khác. </p>
                    <br/>
                    <ul>
                        <li>HLV cao cấp: Võ sư - Phạm Viết Phương</li>
                        <li>HLV trung cấp: Trần Đăng Khoa</li>
                    </ul>
                    <br/>
                    <ul class="store_info">
                        <li><i class="fa fa-home"></i>Tổ dân phố 23, Đường cách mạng tháng 8, Tp.Thái Nguyên</li>
                        <li><i class="fa fa-phone"></i><span>0977.016.6666</span></li>
                        <li><i class="fa fa-phone"></i><span>0989.261.028</span></li>
                        <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:%73%75%70%70%6f%72%74@%6b%75%74%65%74%68%65%6d%65.%63%6f%6d">vietphuongpham@gmail.com</a></span></li>
                    </ul>                
                    </div>
            </div>
            <div class="row">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyANEWfKXpbbX_XfI_MHa7OxWmaSljgP8xw'></script><div style='overflow:hidden;height:500px;width:1136px;'><div id='gmap_canvas' style='height:500px;width:1163px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embedmaps.org/'>add bing map to website</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=8e59698b36548c74adc12dc5539b496aed54ff41'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(21.5671559,105.82520380000005),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(21.5671559,105.82520380000005)});infowindow = new google.maps.InfoWindow({content:'<strong>Map cua hang</strong><br>thai nguyen<br> Thái nguyên<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
        </div>
    </div>
</div>
    
@endsection
