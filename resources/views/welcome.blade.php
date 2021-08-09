@extends('layouts.front')

@section('content')

<div class="hompage-slides-wrapper" style=" border-radius: 90px !important; ">
<div class="construction-slide-preloader-wrap" style=" border-radius: 90px !important; ">
<div class="spinner" style=" border-radius: 90px; "></div>
</div>
<div class="homepage-slides">
<div class="single-slider-item slide-bg-1"  style=" border-radius:  100px; background-image:url({{asset('assets/img/slide-bg-1.jpg')}})" >
<div class="slide-item-table" >
<div class="slide-item-tablecell" >
<div class="container" >
<div class="row">
<div class="col-lg-6 offset-lg-6">
<h1>تم بحمد الله افتتاح موقع الشركه</h1>
<p>  تم بحمد الله افتتاح موقع الشركه وتوفير انواع كثيره من الاسمده الزراعية </p>
<a href="contact-us.html" class="construction-btn slide-btn">اتصل بنا</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="single-slider-item slide-bg-2">
<div class="slide-item-table">
<div class="slide-item-tablecell">
<div class="container">
<div class="row">
<div class="col-lg-10 offset-lg-1 text-center">
<h1>Powerfull Minimal Construction HTML Template</h1>
<p>We endeavour to realise our client's dreams, by combining their ideas, lifestyle, and budget with our own experience.</p>
<a href="contact-us.html" class="construction-btn slide-btn">Request A Quote</a>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div> 



<div class="construction-content-area">
<div class="container">
<div class="section-title">
<h2>احدث منتجاتنا <div class="load-more-wrap text-center wow fadeInUp">
<a class="construction-btn" href="{{ route('siteproducts.index') }}">عرض كل المنتجات</a>
</div></h2>


</div>
<div class="row">
    @foreach ($products as $product)
    @php
       $imgs= json_decode( $product->img);
    @endphp
      <div class="col-lg-4 col-md-6 wow fadeInUp">
      <a class="single-project-item" href="{{route('siteproducts.show',$product->id)}}">
      <div class="single-project-preview single-project-bg-1"  
      style=" border-radius:  20px; background-image:url({{asset('/storage/images/'.array_first($imgs))}})"></div>
      <div class="single-project-info">
      <h4>{{$product->product_name}}</h4>
      installation
      </div>
      </a>
      </div>
    @endforeach





</div>
<div class="load-more-wrap text-center wow fadeInUp">
<a class="construction-btn" href="{{ route('siteproducts.index') }}">عرض كل المنتجات</a>
</div>
</div>
</div> 

<div class="construction-content-area" id="about">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-4 col-md-5">
<div class="section-title wow fadeInUp">
<h2>Done & Dusted</h2>
</div>
<div class="project-info wow fadeInUp">
<p class="wow fadeInUp">We endeavour to realise our client's dreams, by combining their ideas, lifestyle, and budget with our own experience, expertise, and best practice to create a home that is enjoyable, practical, sustainable, and of lasting value.</p>
<a href="projects.html" class="construction-btn pro-btn wow fadeInUp">View all Projects <i class="fa fa-long-arrow-right"></i></a>
</div>
</div>
<div class="col-lg-7 col-md-7 offset-lg-1">
<div class="project-slides">
<div class="single-project-slide">
<img class="img-responsive" src="assets/img/slider1 .jpg" alt="project image">
</div>
<div class="single-project-slide">
<img class="img-responsive" src="assets/img/slider2.jpg" alt="project image">
</div>
<div class="single-project-slide">
<img class="img-responsive" src="assets/img/slider3.jpg" alt="project image">
</div>
</div>
</div>
</div>
</div>
</div>


 


<div class="who-we-are who-we-are-bg">
<h2 class="who-heading">who we are</h2>
<div class="who-item-table">
<div class="who-item-tablecell">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<a href="https://vimeo.com/90691438" class="play-btn popup-youtube">
<i class="fa fa-play"></i>
</a>
</div>
</div>
</div>
</div>
</div>
</div> 



@endsection