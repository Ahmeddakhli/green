<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProductsDataTable;
use App\Http\Requests\admin\products\StoreProductRequest;
use App\Http\Requests\admin\products\UpdateProductRequest;

use Brian2694\Toastr\Facades\Toastr;
Use Alert;
use App\Models\Product;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        
        $files = [];
        if($request->hasfile('img'))
        {
           foreach($request->file('img') as $file)
           {
               $name = time().rand(1,100).'.'.$file->extension();
               $file->storeAs('public/images', $name); 
               $files[] = $name;   
           }
        }
        
    $inputss=$request->input();
    $inputss= array_add($inputss, 'img', $files);
        
        Product::create($inputss);
     

        Alert::success('تم', 'تمت الاضافة بنجاح');


  return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::findorfail($id);
        
        return view('admin.products.edit',["product"=>$product,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $input = $request->all();
        if(!empty($input['img'])){
            //save img in stor 
            //inpot ->img  aarradd
            return hhhhh;
        }else{
        $input = array_except($input,array('img'));
        }
        $product = Product::findorfail($id);
        $product->update($input);
        
        Alert::success('تمت تعديل البيانات بنجاح', 'تم');


        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findorfail($id)->delete();
        Alert::success('تم ', 'تم الحذف بنجاح');
        return redirect()->back();
    }
}
