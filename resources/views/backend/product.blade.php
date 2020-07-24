@extends('backend.master')
@section('title','Danh sách sản phẩm')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách sản phẩm</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<a href="{{asset('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm</a>
							<div class="row">
								<div class="col-sm-12">
									<form class="form-inline" action="" style="margin-top:20px" >
										<div class="form-group">										
											<input type="search" class="form-control" placeholder="Tên sản phẩm..." name="search">
											<span class="form-group-btn">
											<button type="submit" class="btn btn-primary">Search</button>
											</span>
										</div>																													
									
									</form>
								</div>
							</div>
							<table class="table table-bordered" style="margin-top:20px;">
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th width="30%">Tên Sản phẩm</th>
										<th>Giá sản phẩm</th>
										<th width="20%">Ảnh sản phẩm</th>
										<th>Mã danh mục</th>
										<th>Mã sản phẩm</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
									@foreach($productlist as $product)
									<tr>
										<td>{{$product->id}}</td>
										<td>{{$product->title}}</td>
										<td>{{number_format($product->price,0,',',',')}} VND</td>
										<td>
											<img width="200px" src="{{asset('../storage/app/public/avatar/'.$product->image)}}" class="thumbnail">
										</td>
										<td>{{$product->cate_name}}</td>
										<td>{{$product->capro_name}}</td>
										<td>
											<a href="{{asset('admin/product/edit/'.$product->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
											<a href="{{asset('admin/product/delete/'.$product->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							{{$productlist->links()}}
						</div>

					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
</div>
<!--/.main-->
@stop