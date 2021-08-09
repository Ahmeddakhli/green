<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Requests\admin\users\StoreUserRequest;
use App\Http\Requests\admin\users\UpdateUserRequest
;

use Brian2694\Toastr\Facades\Toastr;
Use Alert;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
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
   
    
    public function  index(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       // Toastr::info('Post added successfully :)','Success');
       // toastr()->info('Success Message');
      //  Alert::success('Success Title', 'Success Message');

            return view('admin.users.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->password=Hash::make($request->password);
      User::create($request->all());
     

              Alert::success('تم', 'تمت الاضافة بنجاح');


        return redirect(route('users.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $user=User::findorfail($id);
        
        return view('admin.users.edit',["user"=>$user,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,  $id)
    {
        $input = $request->all();
        if(!empty($input['password'])){
        $input['password'] = Hash::make($input['password']);
        }else{
        $input = array_except($input,array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        
        Alert::success('تمت تعديل البيانات بنجاح', 'تم');


        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Alert::success('تم ', 'تم الحذف بنجاح');
        return redirect()->back();
    }
}
