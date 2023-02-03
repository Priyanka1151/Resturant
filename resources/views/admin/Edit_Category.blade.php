@extends('layouts.admin_master')
@section('title','Edit Category')
@section('content')
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{url('admin/shop')}}">Category</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">Update Data</h5> 
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/category/update')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="Category_Tid" value="{{$Category->Category_Tid}}">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Shop Name</strong></label>
                                        <select name="ShopName" id="ShopName" class="form-control">
                                            <option value="">Choose Shop Name...</option>
                                            @foreach($ShopName as $data)
                                            <option value="{{$data->shop_Tid}}" @if($Category->shopid  == $data->shop_Tid) selected  @endif>{{$data->shop_name}}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Category Name</strong></label>
                                        <span class="text-danger">*</span>
                                        <input type="text" class="form-control input-default" name="CategoryName" value="{{$Category->category_name}}"  placeholder="Enrter Category Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection