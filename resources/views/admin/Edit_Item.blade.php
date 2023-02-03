@extends('layouts.admin_master')
@section('title','Edit Item')
@section('content')
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{url('admin/shop')}}">Item</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">Update Data</h5>
                            </div>
                            <div class="card-body">
                            <form action="{{url('admin/item/update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="MenuItem_Tid" value="{{$MenuItem->MenuItem_Tid}}">
                            <div class="row">
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Shop Name</strong></label>
                                    <select name="ShopName" id="ShopName" class="form-control">
                                        <option value="">Choose Shop Name...</option>
                                        @foreach($Shop as $Shops)
                                            <option value="{{$Shops->shop_Tid}}" @if($MenuItem->shopid  == $Shops->shop_Tid) selected  @endif>{{$Shops->shop_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Category Name</strong></label>
                                    <span class="text-danger">*</span>
                                    <select name="CategoryName" id="CategoryName" class="form-control">
                                        @foreach($Category as $Categorys)
										<option value="{{$Categorys->Category_Tid}}" @if($MenuItem->categoryid  == $Categorys->Category_Tid) selected  @endif>{{$Categorys->category_name}}</option>        
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Item Name</strong></label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="ItemName" class="form-control" value="{{$MenuItem->item_name}}" placeholder="Enter Item Name">
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>ItemType</strong></label>
                                    <span class="text-danger">*</span>
                                    <select name="ItemType" id="ItemType" class="form-control">
                                        <option value="">Choose ItemType...</option>
                                        @foreach($ItemType as $ItemTypes)
                                            <option value="{{$ItemTypes->ItemType_id}}" @if($MenuItem->item_type  == $ItemTypes->ItemType_id) selected  @endif>{{$ItemTypes->itemtype_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Price</strong></label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="Price" class="form-control" value="{{$MenuItem->price}}" placeholder="Enter Price">
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Item Image</strong></label>
                                    <span class="text-danger">*</span>
                                    <img src="{{url('images/MenuItem/'.$MenuItem->item_image)}}" width="50px" height="50px" alt="">
                                    <input type="hidden" name="olditem_image" @if($MenuItem != null) value='{{$MenuItem->item_image}}' @endif/>
						
							        <input type="file" class="form-file-input form-control" {{old('item_image')}} @if($MenuItem != null)value="{{$MenuItem->item_image}}" @endif name="item_image" accept="image/jpg, image/jpeg">
						
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Description</strong></label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="Description" id="Description" value="{{$MenuItem->description}}" class="form-control" placeholder="Enter Description">
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
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