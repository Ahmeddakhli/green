@extends('layouts.front')

@section('content')




<div class="construction-mini-banner">
<div class="container">
<div class="row">
<div class="col-md-4">
<h2>طلب منتج</h2>
</div>
<div class="col-md-8">
<div class="construction-breadcumb">
<a href="{{route('/')}}">الرئسية</a> / <a href="{{route('siteproducts.index')}}">المنتجات</a> /
  <a href="{{route('siteproducts.show',$product->id)}}">{{$product->product_name}}</a>
</div>
</div>
</div>
</div>
</div> 

<div class="construction-content-area">
<div class="container">
<div class="row">



<div class="col-lg-8 wow fadeInUp">
<div class="contact-form-area">
<h2>يرجى ادخال بيانتكم الشخصيه للتواصل معكم
<span>علما بان بيناتكم ستكون فى سرية تامة</span>
</h2>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <form  method="POST" role="form" class="form-horizontal" action="{{ route('siteproducts.store') }}">
                                    @csrf
                                    <div class="row">
                      <input type="hidden" name="product_id" value="{{$product->id}}" >
                      <input type="hidden" name="country_code" value="1" >
                                            <input type="hidden" name="country" value="1" >

                      <input type="hidden" name="status" value="3" >
                    

<div class="col-lg-6">
<label for="name">سوف يتم طلب المنتج الذى اسمه</label>
<input type="text" id="contact_name" value="{{$product->product_name}}" placeholder="الالتلتالالغ" disabled required>
</div>
<div class="col-lg-6">
<label for="name">سعر المنتج</label>
<input type="email"   value="{{$product->price}}" id="contact_email" disabled required>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<label for="name">اسم حضرتك</label>
<input type="text" name="username" id="contact_subject" placeholder="الاسم:" value="{{ old('username') }}" required autocomplete="email" autofocus >
</div>
<div class="col-lg-6">
<label for="name">رقم الموبيل</label>
<input type="number" name="phone_number" id="contact_phone" placeholder=" الموبيل:"value="{{ old('phone_number') }}" required restrict="A-Z\a-z\0-9">
</div>
</div>
<div class="row">
<div class="col-lg-6">
<label for="name">الكميه المطلوبه</label>
<input type="number" name="number" id="contact_subject" placeholder="الكميه التى تريد شرائها من هذا المنتج:"  value="{{ old('number') }}"required>
</div>
<div class="col-lg-6">
<label for="name">المحافظة</label>
<input type="text" name="city" id="contact_phone" placeholder="المحافظه التى سيتم توصيل المنتج اليها" required value="{{ old('city') }}">
</div>
</div>
<div class="row">
<div class="col-lg-12">
<label for="name">العنوان بالتفصيل</label>
<input type="text" name="addres_detailes" id="contact_subject" placeholder="ادخل تفصيل العنوان مثلا 'مصر\الجيزه\المنيب \شارع ...'" value="{{ old('addres_detailes') }} "required>
</div>
<div class="col-lg-12">
<label for="name">البريد الاليكترونى</label>
<input type="email" name="email" id="contact_subject" placeholder="البريد الاليكترونى ...'" value="{{ old('email') }} ">
</div>
</div>
<div class="row">
<div class="col-lg-12">
<label for="name">رسالة او استفسار</label>
<textarea name="message" id="contact_message" cols="30" rows="4" placeholder="اترك رسالة او استفسار ليتم الرد فى اقرب وقت" required>
{{ old('addres_detailes') }}
</textarea>
</div>
<div class="col-lg-12">
<div id="contact_send_status"></div>

<span>للاستفسار يمكنك الاتصال على الرقم</span>
<span><i class="fa fa-phone"></i> Tel: 0111111111111</span>
<input class="send-btn" type="submit" value="ارسال الطلب">
 </div>
</div>
</form>
</div>
</div> 

<div class="col-lg-4 wow fadeInUp">
<div class="contact-info-left">
<address>
<strong>Our Address</strong><br>
Construction Limited<br>
210-2750 Quadra Street Victoria,<br>
Canada
</address>
<address>
<strong>Call Us</strong><br>
Phone: +324-5442-415<a href="#"></a><br>
Fax: +324-5442-415<a href="#"></a>
</address>
<address>
<strong>Email</strong><br>
<a href="#"><span class="__cf_email__" data-cfemail="73000603031c010733101c1d0007010610071a1c1d5d101c1e">[email&#160;protected]</span></a><br>
<a href="#"><span class="__cf_email__" data-cfemail="b3daddd5dcf3d0dcddc0c7c1c6d0c7dadcdd9dd0dcde">[email&#160;protected]</span></a><br>
<a href="#"><span class="__cf_email__" data-cfemail="59383d343037193a36372a2d2b2c3a2d303637773a3634">[email&#160;protected]</span></a>
</address>
</div>
</div> 
</div>
</div>
</div> 







@endsection



