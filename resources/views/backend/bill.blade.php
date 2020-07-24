@extends('backend.master')
@section('title','Danh sách đơn hàng')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh sách đơn hàng</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-7 col-lg-7">
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách đơn hàng</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<table class="table table-bordered">
							<thead>
								<tr class="bg-primary">
									<th>Mã đơn hàng</th>
									<th>Tên khách hàng</th>
									<th>Địa chỉ</th>
									<th>Ngày đặt hàng</th>
									<th>Email</th>
									<th>Trạng thái</th>								
									<th>Action</th>
									<th style="width:10%">Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								@foreach($customers  as $customer)
								<tr>
									<td>{{$customer->bill_id}}</td>
									<td>{{$customer->cus_name}}</td>
									<td>{{$customer->cus_address}}</td>
									<td>{{$customer->bill_day}}</td>
									<td>{{$customer->cus_email}}</td>
									<td>{{$customer->bill_note}}</td>									
									<td><a href="{{ url('admin/bill')}}/{{ $customer->bill_id}}/edit">Chi tiết</a></td>
									<td>
									<a href="{{asset('admin/delete/'.$customer->bill_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
</div>
@stop
<style>
	.panel-primary {
		width: 1100px
	}
</style>