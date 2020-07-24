@extends('backend.master')
@section('title','Danh mục sản phẩm')
@section('main')
<div class="row">
    <div class="col-xs-12 col-md-5 col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Thêm danh mục sản phẩm
            </div>
            <div class="panel-body">
                @include('errors.note')
                <form method="post">
                    <div class="form-group">
                        <label>Tên danh mục sản phẩm:</label>
                        <input require type="text" name="name" class="form-control" placeholder="Tên danh mục...">
                    </div>
                    <select class="form-control show-tick" name="id" id="id">
                        <option value="0">-- Chọn Mã Danh Mục --</option>
                        @foreach($catelist as $cate)
                        <option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                        @endforeach
                    </select><br>
                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Tên danh mục..." value="Thêm mới">
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
</div>
<style>
   .row{
    padding-left:300px;
    padding-top:70px;
   } 
   .panel-primary{
       width: 500px;
   }
</style>
