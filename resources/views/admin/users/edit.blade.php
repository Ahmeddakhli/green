
     @extends('layouts.admin')

@section('content')

  <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header with-border " style="text-align:center" >
                  <h3 class="box-title" >تعديل البيانات</h3>
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
                    <form  method="POST" role="form" class="form-horizontal" action="{{ route('users.update',$user->id) }}">
                                    @csrf
                                  
                                    @method("PUT")
                  <div class="box-body">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">اسم المسؤل</label>
                      <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text"name="username" class="form-control" id="exampleInputEmail1"  value="{{ $user->username }}" autofocus>

                      </div>
                    </div>
                  
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">الاسم بالكامل</label>
                      <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" name="full_name" class="form-control" id="exampleInputEmail1" value="{{ $user->full_name }}">

                      </div>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">البريد الاليكترونى</label>
                      <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}">

                      </div>
                    </div>
                 <div class="form-group">
                      <label for="exampleInputPassword1">كلمة المرور </label>
                      <input type="password"  name="password" class="form-control" id="exampleInputPassword1"  autocomplete="new-password" placeholder="اترك الحقل فارغا ادا كنت لاتريد تغير كلمة المرور">
                       <br>
                       <input type="checkbox" onclick="myFunction()" style="padding = '25px'">اظهار كلمة المرور
                      

                              <script>
                              function myFunction() {
                                var x = document.getElementById("exampleInputPassword1");
                                if (x.type === "password") {
                                  x.type = "text";
                                } else {
                                  x.type = "password";
                                }
                              }
                              </script>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">تاكيد كلمة المرور</label>
                      <input type="password" name="password_confirmation" class="form-control" id="exampleInputPallssword1" >
                    </div>
                  
                   
                    <div class="col-md-6">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">رقم الموبيل</label>
                      <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="number"   name="phone_number" class="form-control" id="exampleInputEmail1"  value="{{$user->phone_number  }}">

                      </div>
                    </div>
                    </div>
                        
                    <div class="col-md-6">
                        <div class="form-group">
                      <label>الدولة</label>
                      <select  value="{{$user->country_code }}"  name="country_code" class="form-control">
                        <option>مصر</option>
                        <option>السعوديه</option>
                        <option>الكويت</option>
                        
                      </select>
                       <input type="hidden" name="country" value="1" >

                    </div>
                 
                    </div>
                  
              
                   
                 
                  </div><!-- /.box-body -->

                  <div class="box-footer" style="text-align:left">
                    <button type="submit" class="btn btn-primary" >حفظ التغيرات</button>
                  </div>
                </form>
              </div><!-- /.box -->

       


        

            </div><!--/.col (left) -->
            <!-- right column -->
            
          </div>   <!-- /.row -->
        </section>

@endsection