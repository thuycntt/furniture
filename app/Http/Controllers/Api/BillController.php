<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billdetail;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Exception;
//use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator as ValidationValidator;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\Console\Input\Input;
use Tymon\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;
use Session;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //$cart = Cart::content();

        $bill = Bill::create([
            'bill_day'
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    
    public function cart(Request $request)
    {
        //$pro_id = new Product;
        $pro_id = $request->json()->get('id');
        //$pro_id = Request::get('id');
        $product = Product::find($pro_id);
        $cartInfo = [
            'id' => $pro_id,
            'name' => $product->title,
            'price' => $product->price,
            'qty' => 1
        ];
       $cartInfo= Cart::add($cartInfo);

        return response( $cartInfo,200);
        //increment the quantity
        if ($request->json()->get('id') && ($request->json()->get('increment')) == 1) {
            $row = Cart::search(function ($key, $value) {
                return $key->id == Request::get('id');
            });
            $item = $row->first();
            Cart::update($item->rowId, $item->qty + 1);
        }
        //decrease the quantity
        if ($request->json()->get('id') && ($request->json()->get('decrease')) == 1) {
            $row = Cart::search(function ($key, $value) {
                return $key->id == Request::get('id');
            });
            $item = $row->first();
            Cart::update($item->rowId, $item->qty - 1);
        }
       
    }
    public function updateCart(Request $request){
        $rowId = $request->json()->get('rowId');
		$data = $request->json()->get('data');
		Cart::update($rowId, $data[0]);
		$subtotal = Cart::subtotal(0);
		$countItem = Cart::count();
		return response(array('subTotal' => $subtotal, 'countItem' => $countItem));
    }
    public function getCheckOut()
    {
        $cartInfo = Cart::content();
		return response($cartInfo);       
    }
    public function dropCart(){
        $cartInfo = Cart::destroy('id');
		return response($cartInfo);  
    }
    public function postCheckOut(Request $request)
    {
        $cartInfo = Cart::content('id');
        //return response($cartInfo);   
        //$token  = Cart::content();
        $validator = Validator::make($request->json()->all(), [
            'cus_name' => 'required|string|max:100',
            'cus_email' => 'required|string|max:50',
            'cus_address' => 'required|string|max:100',
            'cus_phonenumber' => 'required|string|max:50',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        try {
            $customer = Customer::create([
                'cus_name' => $request->json()->get('cus_name'),
                'cus_email' => $request->json()->get('cus_email'),
                'cus_address' => $request->json()->get('cus_address'),
                'cus_phonenumber' => $request->json()->get('cus_phonenumber'),
            ]);
            $bill = new Bill;
            $bill->bill_id = $bill->bill_id;
            $bill->cus_id = $customer->cus_id;
            $bill->bill_day = date('Y-m-d H:i:s');
            $bill->save();

            if (count($cartInfo) > 0) {
                foreach ($cartInfo as $key => $bill_de) {
                    $billDetail = new BillDetail;
                    $billDetail->bill_id = $bill->bill_id;
                    $billDetail->pro_id = $bill_de->id;
                    $billDetail->billde_quantily = $bill_de->qty;
                    $bill->cus_id = $customer->cus_id;
                    $billDetail->save();
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return response()->json(compact('customer', 'bill','billDetail'), 201);
    }
    public function removeFromCart(Request $request){
		$rowId = $request->input('rowId');
		Cart::remove($rowId);
	}
   
   
}
