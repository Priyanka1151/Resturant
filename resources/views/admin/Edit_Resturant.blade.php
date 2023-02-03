@extends('layouts.admin_master')
@section('title','Edit Resturant')
@section('content')
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{url('admin/Resturant')}}">Resturant</a></li>
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
                                <form action="{{url('admin/resturant/update')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="Restutant_Tid" value="{{$Resturant->Restutant_Tid}}">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Kitchen Name</strong></label>
                                        <span class="text-danger">*</span>
                                        <select name="shopname" id="" class="form-control">
                                            <option value="">Choose Kitchen</option>
                                            @foreach($Shop as $shopids)
                                                <option value="{{$shopids->shop_Tid}}" @if($Resturant->shopid  == $shopids->shop_Tid) selected  @endif>{{$shopids->shop_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Resturant Mobile No.</strong></label>
                                        <span class="text-danger">*</span>
                                        <input type="text" class="form-control input-default" name="ResturanUserName"  placeholder="Enter Mobile No" value="{{$Resturant->rest_mobile}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Password</strong></label>
                                        <span class="text-danger">*</span>
                                        <input type="text" class="form-control input-default" name="password"  placeholder="Enter Password" value="{{Crypt::decryptString($Resturant->password)}}" required>
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