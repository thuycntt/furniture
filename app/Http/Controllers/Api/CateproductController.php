<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cateproduct;
use Illuminate\Http\Request;

class CateproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cateproduct = Cateproduct::all();
        return response()->json($cateproduct);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cateproduct = Cateproduct::create($request->all());
        return response()->json($cateproduct);
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
        $cateproduct['catepro']= Cateproduct::find($id);
        return response()->json($cateproduct); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cateproduct = Cateproduct::find($id);       
        $cateproduct->capro_name = $request->input('capro_name');
        $cateproduct->cate_id = $request->input('cate_id');
        $cateproduct->capro_slug = str_slug($request->input('capro_slug'));
        $cateproduct->save();       
       
        return response()->json($cateproduct);
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
        $cateproduct = Cateproduct::find($id);
        $cateproduct->delete();
        return response()->json($cateproduct);
    }
}
