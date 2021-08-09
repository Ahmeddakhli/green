
     @extends('layouts.admin')

@section('content')

  <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary" >
                <div class="box-header with-border " style="text-align:center" >
                  <h3 class="box-title" >تعديل منتج جديد</h3>
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
                    <form  method="POST" role="form" class="form-horizontal" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    @method("PUT")
                  <div class="box-body">
                    <div class="col-md-5" style=" margin: 10px;">

                    <div class="form-group">
                      <label for="exampleInputEmail1">اسم المنتج</label>
                      <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text"name="product_name" class="form-control" id="exampleInputEmail1"  value="{{ $product->product_name }}" autofocus>

                      </div>
                    </div>
                  
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">تفاصيل المنتج وكيفيه الاستخدام(الوصف) </label>
                       <textarea  type="text"  row="20" name="discription" class="form-control"  id="editor" >
                             {{ $product->discription }}
                          </textarea>
                      
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">(سوف يعرض للعميل)سعر البيع</label>
                      <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-price"></i></span>
                      <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $product->price }}"">

                      </div>
                    </div>
                 <div class="form-group">
                      <label for="exampleInputPassword1">اسم الشركة المصنعه </label>
                      <input type="text"  name="made_by" class="form-control" id="exampleInputPassword1" value="{{ $product->made_by }}" >
                  
                    </div>
                  
                    </div>
                     <div class="col-md-6" style=" margin: 10px;">
                        <div class="form-group">
                      <label for="exampleInputPassword1"> القسم</label>
                      <input type="text"  name="categore" class="form-control" id="exampleInputPassword1" placeholder="القسم" value="{{ $product->categore }}">
                  
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">الخصم على سعر المنتج بالجنيه</label>
                      <input type="number" name="discound" class="form-control" id="exampleInputPallssword1" value="{{ $product->discound }}" >
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">الكميه المتوفره من المنتج</label>
                      <input type="number" name="quantity" class="form-control" id="exampleInputPallssword1" value="{{ $product->quantity }}" >
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">اختر صور المنتج  </label>
                    
                          <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                            <input type="file" name="img[]" multiple   value="{{ $product->img }}" class="myfrm form-control">
                           
                    </div>
                    </div>
                        
                    <div class="col-md-6">
                        <div class="form-group">
                      <label>الدولة</label>
                      <select   name="country"  value="{{ $product->country }}" class="form-control">
                        <option value="1">مصر</option>
                        <option value="2">السعوديه</option>
                        <option value="3">الكويت</option>
                        
                      </select>
                    </div>
                 
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