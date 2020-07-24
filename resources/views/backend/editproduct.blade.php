@extends('backend.master')
@section('title','Cập nhật sản phẩm')
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
				<div class="panel-heading">Sửa sản phẩm</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group">
									<label>Tên sản phẩm</label>
									<input required type="text" name="name" class="form-control" value="{{$product->title}}">
								</div>
								<div class="form-group">
									<label>Giá sản phẩm</label>
									<input required type="number" name="price" class="form-control" value="{{$product->price}}">
								</div>
								<div class="form-group">
									<label>Ảnh sản phẩm</label>
									<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)" >
									<img id="avatar" class="thumbnail" width="300px" src="{{asset('../storage/app/public/avatar/'.$product->image)}}">
								</div>								
								<div class="form-group">
									<label>Bảo hành</label>
									<input required type="text" name="warranty" class="form-control" value="{{$product->warranty}}">
								</div>
								<div class="form-group">
									<label>Khuyến mãi</label>
									<input required type="text" name="promotion" class="form-control" value="{{$product->promotion}}">
								</div>
								<div class="form-group">
									<label>Tình trạng</label>
									<input required type="text" name="condition" class="form-control" value="{{$product->conditionn}}">
								</div>
								<div class="form-group">
									<label>Trạng thái</label>
									<select required name="status" class="form-control">
										<option value="1" @if($product->status == 0) checked @endif>Còn hàng</option>
										<option value="0" @if($product->status == 1) checked @endif>Hết hàng</option>
									</select>
								</div>
								<div class="form-group">
									<label>Miêu tả</label>
									<textarea class="ckeditor" required name="description">{{$product->description}}</textarea>
									<script type="text/javascript">
										var editor = CKEDITOR.replace('description', {
											language: 'vi',
										});
									</script>
								</div>
								<div class="form-group">
									<label>Mã danh mục</label>
									<select required name="cate" class="form-control">
										@foreach($catelist as $cate)
										<option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Mã sản phẩm</label>
									<select required name="catepro" class="form-control">
										@foreach($cateprolist as $catepro)
										<option value="{{$catepro->capro_id}}">{{$catepro->capro_name}}</option>
										@endforeach
									</select>
								</div>
								<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
								<a href="#" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
						{{csrf_field()}}
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
</div>
<!--/.main-->
@end