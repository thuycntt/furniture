@extends('backend.master')
@section('title','Chi tiết đơn hàng')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiết đơn hàng</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-7 col-lg-7">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2" class="bg-primary">Thông tin khách hàng</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Thông tin người đặt hàng</td>
                                    <td>{{ $customerInfo->cus_name }}</td>
                                </tr>                              
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{ $customerInfo->cus_phonenumber }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $customerInfo->cus_address }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $customerInfo->cus_email }}</td>
                                </tr>
                               
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary">
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($billInfo as $key => $bill)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $bill->bill_id }}</td>
                                    <td>{{$bill->title}}</td>
                                    <td>{{ $bill->billde_quantily }}</td>
                                    <td>{{number_format($bill->price,0,',',',')}}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Tổng tiền</th>
                                    <td>{{number_format($bill->price*$bill->billde_quantily,0,',',',')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    @stop
    <style>
        .panel-primary {
            width: 1000px;
        }

        .tick {
            width: 150px;
        }
    </style>