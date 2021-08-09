@extends('layouts.front')

@section('content')


<div class="construction-mini-banner">
<div class="container">
<div class="row">
<div class="col-md-4">
<h2>منتجاتنا</h2>
</div>
<div class="col-md-8  justify-content-left">
<div class="construction-breadcumb">
<a href="{{route('/')}}">الرئيسة</a> /منتجاتنا
</div>
</div>
</div>
</div>
</div> 

<div class="construction-content-area">
<div class="container">



<div class="section-title">
<h2>منتجاتنا</h2>
 <form  method="POST"   action="{{ route('searchs.store') }}" >
  @csrf
    <h3>بحث ب اسم المنتج</h3>

<div class="blog-serch-form single-page input-group col-md-6">

  <input type="text"  name="word" placeholder="ابحث باسم المنتج....." value="{{old('word')}}">
<button type="submit"><i class="fa fa-search"></i></button>



</div>
  </form>


<div class="row">

<div class="col-lg-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
 <label class="input-group-text d-flex justify-content-center" >
    
    
    اختر القسم او الصنف</label>
<div class="shorting-menu "  >
   

  @foreach ($categores as $categore)
 

 <a  href="{{ route('searchs.show',$categore->categore) }}">
 
    
    
     {{$categore->categore}} |
 
 
 </a>
 @endforeach
   

</div>
</div>
</div>
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
<div class="row col-12" >
<div class="d-flex justify-content-center" >
{!! $products->links() !!}
</div>
</div>
</div>
</div> 


@endsection