<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cateproduct;
use App\Models\Category;
use App\Http\Requests\AddCateproRequest;
use App\Http\Requests\EditCateproRequest;
class CateproductController extends Controller
{
    //
    public function getCatepro(){
        $data['cateprolist'] =  Cateproduct::paginate(5);   
        return view('backend.cateproduct',$data);
    }
    public function getAddCatepro(){
        $data['catelist'] = Category::all();
        return view('backend.addcateproduct',$data);
    }
    public function postAddCatepro(AddCateproRequest $request){
        $cateproduct = new Cateproduct;
        $cateproduct ->capro_name = $request->name;
        $cateproduct ->cate_id = $request->id;
        $cateproduct->capro_slug = str_slug($request->name);
        $cateproduct->save();
        return back();

    }
    public function getEditCatepro($id){
        $data['catepro'] = Cateproduct::find($id);
        $data['catelist'] = Category::all();
        return view('backend.editcateproduct',$data);
    }
    public function postEditCatepro(EditCateproRequest $request, $id){
        $cateproduct = Cateproduct::find($id);
        $cateproduct ->capro_name = $request->name;
        $cateproduct ->cate_id = $request->id;
        $cateproduct->capro_slug = str_slug($request->name);
        $cateproduct->save();
        return redirect()->intended('admin/cateproduct');
    }
    public function getDeleteCatepro($id){
        Cateproduct::destroy($id);
        return back();
    }
}
