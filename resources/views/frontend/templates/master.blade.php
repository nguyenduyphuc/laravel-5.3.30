<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/lib/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/lib/jquery.bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/lib/owl.carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/lib/fancyBox/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/responsive.css" />
    
    <title>{{$title}}</title>
</head>
@inject('request', 'Illuminate\Http\Request')
<?php
$arr=explode('/', $request->path());
?>
<body class="<?php if ($arr[0] == '') {
    echo "home";
} elseif ($arr[0] == 'product-detail') {
    echo "product-page";
} else {
    echo "category-page";
} ?>">
<!-- TOP BANNER -->
<!--<div id="top-banner" class="top-banner">
    <div class="bg-overlay"></div>
    <div class="container">
        <h1>Special Offer!</h1>
        <h2>Additional 40% OFF For Men & Women Clothings</h2>
        <span>This offer is for online only 7PM to middnight ends in 30th July 2015</span>
        <span class="btn-close"></span>
    </div>
</div>-->
<!-- HEADER -->
    @include('frontend.templates.blocks.header')
<!-- end header -->
    @if(in_array('slider', $include))
        <!-- Home slideder-->
        @include('frontend.templates.blocks.slider')
        <!-- END Home slideder-->
    @endif
    @if(in_array('service', $include))
        <!-- servives -->
        @include('frontend.templates.blocks.service')
        <!-- end services -->
    @endif

<!---->

@yield('content')

<!-- Footer -->
<footer id="footer">
     <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <a href="#"><img src="{{asset('frontend')}}/assets/data/introduce-logo.png" alt="" /></a>
                {{--         <div id="address-list">
                            <div class="tit-name">Address:</div>
                            <div class="tit-contain">Example Street 68, Mahattan, New York, USA.</div>
                            <div class="tit-name">Phone:</div>
                            <div class="tit-contain">+00 123 456 789</div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain">support@business.com</div>
                        </div> --}}
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="">Liên hệ với chúng tôi</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="">Giới thiệu về chúng tôi</a>
                        </div>
                    </div>
                </div>
{{--                 <div class="col-md-3">
                    <div id="contact-box">
                        <div class="introduce-title">Newsletter</div>
                        <div class="input-group" id="mail-box">
                          <input type="text" placeholder="Your Email Address"/>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">OK</button>
                          </span>
                        </div>
                        <div class="introduce-title">Let's Socialize</div>
                        <div class="social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    
                </div> --}}
            </div><!-- /#introduce-box -->
    
            
            <div id="footer-menu-box">
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Company Info - Partnerships</a></li>
                    </ul>
                </div>
                <p class="text-center">Copyrights &#169; 2017 Shop võ thuật Việt Bắc. All Rights Reserved. Designed by Khoa Trần</p>
            </div><!-- /#footer-menu-box -->
        </div> 
</footer>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<script type="text/javascript" src="{{asset('frontend')}}/assets/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/lib/select2/js/select2.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/lib/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/lib/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/lib/jquery.countdown/jquery.countdown.min.js"></script>

<script type="text/javascript" src="{{asset('frontend')}}/assets/js/jquery.actual.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/lib/fancyBox/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/lib/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/js/theme-script.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/assets/js/frontend.js"></script>




</body>
</html>