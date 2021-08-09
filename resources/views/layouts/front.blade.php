<!DOCTYPE html>
<html lang="ar" dir="rtl">

<!-- Mirrored from templates.envytheme.com/runhill/rtl/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 17:46:41 GMT -->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>الفلاح</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
</head>
<body>

<div class="construction-site-preloader-wrap">
<div class="sk-folding-cube">
<div class="sk-cube1 sk-cube"></div>
<div class="sk-cube2 sk-cube"></div>
<div class="sk-cube4 sk-cube"></div>
<div class="sk-cube3 sk-cube"></div>
</div>
</div>


<div class="header-top-area wow fadeInDown">
<div class="container">
<div class="row">
<div class="col-lg-9">
<i class="fa fa-map-marker"></i> 210-2750 Quadra Street Victoria, Canada <span class="seprator">|</span>
<a href="#"><i class="fa fa-envelope"></i> <span class="__cf_email__" data-cfemail="32414742425d404672515d5c4146404751465b5d5c1c515d5f">[email&#160;protected]</span></a> <span class="seprator">|</span>
<a href="#"><i class="fa fa-phone"></i> +324-5442-415</a>
</div>
<div class="col-lg-3 text-end">
<div class="social-icon">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-google-plus"></i></a>
<a href="#"><i class="fa fa-pinterest"></i></a>
</div>
</div>
</div>
</div>
</div> 

<div class="mainmenu-area">
<div class="container">
<div class="row">
<div class="col-lg-3">
<div class="logo">
<a href="{{ route('/') }}">
       
                    <h1 class="text-darck">
                           <img src="{{ asset('assets/img/logo.png')}}"
                             style="height:50px;" alt="" class="img-fluid">
                            الفلاح
                 </h1>
                            

            
</a>
</div>
<div class="responsive-menu-wrap"></div>
</div>
<div class="col-lg-9">
<div class="mainmenu">
<ul id="navigation">
<li class="active"><a href="{{ route('/') }}">الرئيسه</a></li>

<li><a href="#">الاقسام <i class="fa fa-long-arrow-down"></i></a>
@php
use App\Models\Product;
   $categores=Product::all()->unique("categore");

@endphp
<ul>
  @foreach ($categores as $categore)
 
<li><a href="{{ route('searchs.show',$categore->categore) }}">{{$categore->categore}} </a></li>

 @endforeach

</ul>
</li>
<li><a href="{{ route('siteproducts.index')}}">منتجاتنا </a>
</li>
 <li><a href="#about">عن الشركه</a></li>
</ul>
</div>

</div>
</div>
</div>
</div>
</div>


            @yield('content')
     

<a href="#" id="back-to-top" title="Back to Top"><i class="fa fa-fighter-jet"></i></a>


<footer class="site-footer">

<div class="footer-top-area">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6">
<div class="footer-wid">
<h2 class="footer-logo"><img src="{{ asset('assets/img/logo.png')}}" alt="logo"></h2>
<p>We are always ready to help you.</p>

<div class="address-info">
<span>Phone: +324-5442-415</span>
<span>Fax: +324-5442-415</span>
<span>Email: <a href="https://templates.envytheme.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="35464045455a474175565a5b4641474056415c5a5b1b565a58">[email&#160;protected]</a></span>
<div class="social-icos">
<ul>
<li><a href="#"><i class="fa  fa-facebook"></i></a></li>
<li><a href="#"><i class="fa  fa-twitter"></i></a></li>
<li><a href="#"><i class="fa  fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa  fa-linkedin"></i></a></li>
<li><a href="#"><i class="fa  fa-youtube"></i></a></li>
<li><a href="#"><i class="fa  fa-pinterest"></i></a></li>
</ul>
</div>

</div>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="footer-wid footer-menu">
<h3 class="footer-wid-title">روابط سريعه</h3>
<ul>
<li><a href="index.html"><i class="fa  fa-angle-right"></i> الرئيسيه</a></li>
<li><a href="about.html"><i class="fa  fa-angle-right"></i> عن الشركة</a></li>

<li><a href="projects.html"><i class="fa  fa-angle-right"></i> منتجاتنا</a></li>

</ul>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="footer-wid" >
<h3 class="footer-wid-title">موقعنا على الخريطه</h3>
<div id="map">
<iframe  style="height:300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2646.831677800613!2d-123.36224778415745!3d48.44057023798773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548f7380e2b98f65%3A0xbc600f1f70d246fa!2sBritish%20Columbia%20Regional%20Council%20of%20Carpenters!5e0!3m2!1sen!2sbd!4v1622389492701!5m2!1sen!2sbd"></iframe>
</div>
</div>
</div>


<div class="footer-copyright-area">
<div class="container">
<div class="row">
<div class="col-lg-6">
&copy; جميع الحقوق محفوظه لدى شركة الفلاح
</div>
<div class="col-lg-6 text-end">
<a href="#"> تمت برمجه الموقع بواسطة مهندس </a> <span class="seprator">|</span> <a href="#">احمد داخلى</a>
</div>
</div>
</div>
</div> 
</footer> 

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/bootstrap.min.js"></script>

<script src="{{ asset('assets/js/popper.min.js') }}"></script>

<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

<script src="{{ asset('assets/js/mixitup.min.js') }}"></script>

<script src="{{ asset('assets/js/wow.min.js') }}"></script>

<script src="{{ asset('assets/js/active.js') }}"></script>
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
@include('sweetalert::alert')
</body>

<!-- Mirrored from templates.envytheme.com/runhill/rtl/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 17:47:04 GMT -->
</html>