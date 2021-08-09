@extends('layouts.front')

@section('content')




<div class="construction-mini-banner">
<div class="container">
<div class="row">
<div class="col-md-4">
<h2>Projects</h2>
</div>
<div class="col-md-8">
<div class="construction-breadcumb">
<a href="{{route('/')}}">الرئيسية</a> / <a href="{{route('siteproducts.index')}}">المنتجات</a> /{{$product->product_name}}
</div>
</div>
</div>
</div>
</div> 

<div class="construction-content-area">
<div class="container">
<div class="row">
<div class="col-lg-8 wow fadeInUp">

<div class="single-service-info">
<div class="single-service-inner-content">
<div class="row">
<div class="col-lg-12">
<div class="big-image">

<a class="gallery-item" href="{{asset('/storage/images/'.array_first($imgs))}}">
<img   src="{{asset('/storage/images/'.array_first($imgs))}}" alt="Image" class="img-responsive">
</a>
</div>

</div>
  @foreach ($imgs as $img)
               
               <div class="col-lg-4 col-md-6">
                <a class="gallery-item" href="{{asset('storage/images/'.$img)}}">
                <img  style="height:200px"src="{{asset('storage/images/'.$img)}}" alt="Image" class="img-responsive">
                </a>
                </div>
            @endforeach




</div>
<h3> اسم المنتج<h2>{{$product->product_name}}</h2></h3> 
<h3>يستخدم فى</h3>
<p>{!!$product->discription!!}</p>
</div>
</div> 
</div>
<div class="col-lg-4 wow fadeInUp">

<div class="projects-details">
<h3 class="projects-details-title">تفاصيل المنتج</h3>
<h4>تصتيع شركة: {{$product->made_by}}</h4>
<p>اسم المنتج: {{$product->product_name}}</p>
<p>تاريخ الانتاج: {{$product->created_at}}</p>
<p>السعر :{{$product->price}}</p>
<p>الخصم بالجنيه : {{$product->discound }}</p>
<div class="col-lg-12">
<div id="contact_send_status"></div>


<a  href="{{route('siteproducts.edit',$product->id)}}">
<input class="send-btn" type="submit" value="طلب المنتج">

</a>
 </div>
</div>



</div>
</div>
</div>
</div> 


@endsection