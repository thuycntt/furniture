<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        return response()->json($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCateRequest $request)
    {
        //
        /*$category = new Category;
        $category->cate_id = $request->input('cate_id');
        $category->cate_name = $request->input('cate_name');
        $category->cate_slug = str_slug($request->input('cate_slug'));
        $category->save();
        return response()->json($category);*/
        $category = Category::create($request->all());
        return response()->json($category);
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
        $category['cate']= Category::find($id);
        return response()->json($category); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCateRequest $request,  $id)
    {
        //
        $category = Category::find($id);
        $category->cate_name = $request->input('cate_name');
        $category->cate_slug = str_slug($request->input('cate_slug'));
        $category->save();       
        //$category = Category::create($request->all());
        return response()->json($category);
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
        $category = Category::find($id);
        $category->delete();
        return response()->json($category);
    }
}
