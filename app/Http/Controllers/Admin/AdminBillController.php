<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\Billdetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->data['title'] = 'Quản lý hóa đơn';
        $customers = DB::table('a_bills')->join('a_customers', 'a_bills.cus_id', '=', 'a_customers.cus_id')
            ->orderBy('bill_id', 'desc')->get();
        $this->data['customers'] = $customers;
        return view('backend.bill', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //  
        $customerInfo = DB::table('a_customers')
            ->join('a_bills', 'a_customers.cus_id', '=', 'a_bills.cus_id')
            ->select('a_customers.*', 'a_bills.bill_id as bill_id')
            ->where('a_customers.cus_id', '=', $id)
            ->first();
        $billInfo = DB::table('a_billdetail')->join('a_bills', 'a_billdetail.bill_id', '=', 'a_bills.bill_id')
            ->orderBy('billde_id', 'desc')
            ->join('a_products', 'a_billdetail.pro_id', '=', 'a_products.id')->where('a_bills.bill_id', '=', $id)
            ->orderBy('billde_id', 'desc')->get();

        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;
        return view('backend.billdetail', $this->data);
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
        Bill::destroy($id);
        return back();
    }
}
