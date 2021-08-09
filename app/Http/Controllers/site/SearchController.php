<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\Product;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $word = $request->input('word');
    
        // Search in the title and body columns from the posts table
        $products = Product::query()
            ->where('product_name', 'LIKE', "%{$word}%")
            ->orWhere('discription', 'LIKE', "%{$word}%")->orderByDesc('id')
            ->paginate(12);
    
        // Return the search view with the resluts compacted
        $categores=Product::all()->unique("categore");
        
        return view('site.products.index',['products'=>$products,'categores'=>$categores]);
    }
    public function category($name_cat)
    {
        $imgs= Photo::all()->where('category',$name_cat);
        
        return view('front/category',compact('imgs','name_cat'));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        $products= product::where('categore',$id)->orderByDesc('id')->paginate(12);
        $categores=Product::all()->unique("categore");
        return view('site.products.index',['products'=>$products,'categores'=>$categores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
       // return view('site.order',['id'  => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request ,$id)
    {
        
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
