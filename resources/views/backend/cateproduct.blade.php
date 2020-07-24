@extends('backend.master')
@section('title','Danh mục sản phẩm')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục sản phẩm</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-7 col-lg-7">
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách danh mục sản phẩm</div>
				<div class="panel-body">
					<div class="bootstrap-table">
					<a href="{{asset('admin/cateproduct/add')}}" class="btn btn-primary">Thêm mã sản phẩm</a><br><br>
						<table class="table table-bordered">
							<thead>
								<tr class="bg-primary">
									<th>Tên danh mục sản phẩm</th>
									<th>Mã danh mục</th>
									<th style="width:30%">Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cateprolist as $catepro)
								<tr>
									<td>{{$catepro->capro_name}}</td>
									<td>{{$catepro->Category->cate_name}}</td>
									<td>
										<a href="{{asset('admin/cateproduct/edit/'.$catepro->capro_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
										<a href="{{asset('admin/cateproduct/delete/'.$catepro->capro_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
											Xóa</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{$cateprolist->links()}}
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
	.row{
		padding-left:100px;
	}
	.panel-primary{
		width: 900px
	}
</style>