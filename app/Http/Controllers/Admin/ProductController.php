<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddproductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cateproduct;
use CKSource\CKFinder\Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller

{
    //
    public function getProduct(Request $request)
    {
        $search = $request->get('search');
        $data['productlist'] = DB::table('a_products')->join('a_categories', 'a_products.pro_cate', '=', 'a_categories.cate_id')->orderBy('id', 'desc')
        ->join('a_cateproduct', 'a_products.pro_catepro', '=', 'a_cateproduct.capro_id')->orderBy('id', 'desc')
        ->where('title','like','%'.$search.'%')->paginate(10);
        //$data['productlist'] = DB::table('a_products')->join('a_cateproduct','a_products.pro_catepro','=','a_cateproduct.capro_id')->orderBy('pro_id','desc')->get();
     
        return view('backend.product', $data);
    }
    
    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
        $data['cateprolist'] = Cateproduct::all();
        return view('backend.addproduct', $data);
    }
    public function postAddProduct(AddproductRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $product = new Product();
        $product->title = $request->name;
        $product->slug = str_slug($request->name);
        $product->image = $filename;
        $product->price = $request->price;
        $product->warranty = $request->warranty;
        $product->promotion = $request->promotion;
        $product->conditionn = $request->condition;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->pro_cate = $request->cate;
        $product->pro_catepro = $request->catepro;
        $product->save();
        $request->img->storeAs('public/avatar', $filename);
        return back();
    }
    public function getEditProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['catelist'] = Category::all();
        $data['cateprolist'] = Cateproduct::all();
        return view('backend.editproduct', $data);
    }
    public function postEditProduct(Request $request, $id)
    {
        
        $product = Product::find($id);
        if ($request->hasFile('img')) {
            $filename = $request->img->getClientOriginalName();
            $product->image = $filename;
            $request->img->storeAs('public/avatar', $filename);
        }
        $product->title = $request->name;
        $product->slug = str_slug($request->name);
        $product->price = $request->price;
        $product->warranty = $request->warranty;
        $product->promotion = $request->promotion;
        $product->conditionn = $request->condition;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->pro_cate = $request->cate;
        $product->pro_catepro = $request->catepro;
        $product->save();
        return redirect('admin/product');
    }
    public function getDeleteProduct($id)
    {
        Product::destroy($id);
        return back();
    }
}
