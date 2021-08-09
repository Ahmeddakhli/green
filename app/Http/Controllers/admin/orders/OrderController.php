<?php

namespace App\Http\Controllers\admin\orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\OrdersDataTable;
use App\Models\Order;
use App\Http\Requests\admin\orders\StoreOrderRequest;
use App\Http\Requests\admin\orders\UpdateOrderRequest;
Use Alert;

class OrderController extends Controller
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
    public function  index(OrdersDataTable $dataTable)
    {
        return $dataTable->render('admin.orders.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        Order::create($request->all());
        
        Alert::success('تمت الاضافة البيانات بنجاح', 'تم');


        return redirect(route('orders.index'));
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
        $order=Order::findorfail($id);
        
        return view('admin.orders.edit',["order"=>$order,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::findorfail($id);
        $order->update($request->all());
        
        Alert::success('تمت تعديل البيانات بنجاح', 'تم');


        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findorfail($id)->delete();
        Alert::success('تم ', 'تم الحذف بنجاح');
        return redirect()->back();
    }
}
