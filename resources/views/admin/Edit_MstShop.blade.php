@extends('layouts.admin_master')
@section('title','Edit Shop Name')
@section('content')
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{url('admin/shop')}}">Shop</a></li>
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
                                <form action="{{url('admin/shop/update')}}" method="POST">
                                    @csrf
                                    
                                    <input type="hidden" name="shop_Tid" value="{{$mstshop->shop_Tid}}">
                                    <div class="mb-3">
                                        <label class="form-label">Shop Name</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" class="form-control input-default" name="ShopName" value="{{$mstshop->shop_name}}"  placeholder="Enter Shop Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mobile No.</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" class="form-control input-default" name="MobileNo" value="{{$mstshop->mobileno}}"  placeholder="Enrter Mobile No" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" class="form-control input-default" name="Password" value="{{Crypt::decryptString($mstshop->password)}}" id="Password" placeholder="Enrter Password" required>
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