
     @extends('layouts.admin')

@section('content')

  <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header with-border " style="text-align:center" >
                  <h3 class="box-title" >اضافة طلب جديد</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form  method="POST" role="form" class="form-horizontal" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                                    @csrf
                  <div class="box-body">
                    <div class="col-md-5" style=" margin: 10px;">

                    <div class="form-group">
                      <label for="exampleInputEmail1">اسم العميل</label>
                      <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text"name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('username') }}" autofocus>

                      </div>
                    </div>
                  
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">عنوان العميل بالتفصيل </label>
                       <textarea  type="text"  row="20" name="addres_detailes" class="form-control" id="editor">
                             {{ old('addres_detailes') }}
                          </textarea>
                      
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1"> رقم موبيل العميل </label>
                      <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="number"   name="phone_number"  class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('phone_number') }}">

                      </div>
                    </div>
                 <div class="form-group">
                      <label for="exampleInputPassword1">الكميه المطلوبه من هذا المنتج</label>
                      <input type="number" name="number" class="form-control" id="exampleInputPassword1"value="{{ old('number') }}" >
                  
                    </div>
                  
                    </div>
                     <div class="col-md-6" style=" margin: 10px;">
                    
                   
                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">اسم المنتج</label>
                      <input type="number" name="product_id" class="form-control" id="exampleInputPallssword1" value="{{ old('product_id') }}" >
                    </div>
                    
                 <div class="form-group">
                      <label for="exampleInputPassword1">البريد الالكترونى للعميل</label>
                      <input type="email" name="email" class="form-control" id="exampleInputPassword1"value="{{ old('email') }}" >
                  
                    </div>
                        
                    <div class="col-md-6">
                        <div class="form-group">
                      <label>الدولة</label>
                      <select   name="country" value="{{ old('country') }}" class="form-control">
                        <option value="1">مصر</option>
                        <option value="2">السعوديه</option>
                        <option value="3">الكويت</option>
                        
                      </select>
                    </div>
                          <div class="form-group">
                      <label>المحافظة</label>
                      <select   name="city" value="{{ old('city') }}" class="form-control">
                        <option value="1">المنصوره</option>
                        <option value="2">الجيزه</option>
                        <option value="3">الكويت</option>
                        
                      </select>
                    </div>

                  <label>حالة الطلب</label>
                      <select   name="status" value="{{ old('status') }}" class="form-control">
                        <option value="1">اكتمل </option>
                        <option value="2">تم الاتصال</option>
                        <option selected value="3">لم يتم الاتصال</option>
                        
                      </select>
                      <input type="hidden" name="country_code" value="1" >
                    </div>
                    </div>
                  
              
                  
                   
                 
                  </div><!-- /.box-body -->

                  <div class="box-footer" style="text-align:left">
                    <button type="submit" class="btn btn-primary" >اضافه</button>
                  </div>
                </form>
              </div><!-- /.box -->

       


        

            </div><!--/.col (left) -->
            <!-- right column -->
            
          </div>   <!-- /.row -->
        </section>

@endsection