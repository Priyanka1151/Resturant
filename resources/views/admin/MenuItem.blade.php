@extends('layouts.admin_master')
@section('title','Add Menu Item')
@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Item</a></li>
                  <!-- Button trigger modal -->
                <li  style="margin-left:auto"> <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Item</button></li>
            </ol>
        </div>
        @if (session('message'))
            <div class="alert-success">{{session('message')}}</div> 
        @endif
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert-danger">{{$error}}</div>
            @endforeach
        @endif
        
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('admin/item/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Shop Name</strong></label>
                                    <select name="ShopName" id="ShopName" class="form-control">
                                        <option value="">Choose Shop Name...</option>
                                        @foreach($Shop as $Shops)
                                            <option value="{{$Shops->shop_Tid}}">{{$Shops->shop_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Category Name</strong></label>
                                    <span class="text-danger">*</span>
                                    <select name="CategoryName" id="CategoryName" class="form-control">
                                        <option value="">Choose Category Name...</option>
                                        @foreach($Category as $Categorys)
                                            <option value="{{$Categorys->Category_Tid}}">{{$Categorys->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Item Name</strong></label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="ItemName" class="form-control" placeholder="Enter Item Name">
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>ItemType</strong></label>
                                    <span class="text-danger">*</span>
                                    <select name="ItemType" id="ItemType" class="form-control">
                                        <option value="">Choose ItemType...</option>
                                        @foreach($ItemType as $ItemTypes)
                                            <option value="{{$ItemTypes->ItemType_id}}">{{$ItemTypes->itemtype_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Price</strong></label>
                                    <span class="text-danger">*</span>
                                    <input type="text" name="Price" class="form-control" placeholder="Enter Price">
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Item Image</strong></label>
                                    <span class="text-danger">*</span>
                                    <input type="file" name="ItemImage" class="form-control" >
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label"><strong>Description</strong></label>
                                    <span class="text-danger">*</span>
                                    <textarea name="Description" id="Description" class="form-control" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
         <!-- End Modal -->
         <!-- Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Shop</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {{-- <div id="example_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div> --}}
                                <table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50.234px;">S.No</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50.234px;">Shop Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200.703px;">Category Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50.234px;">Item Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200.703px;">Item Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 66.6562px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    @foreach($MenuItem as $data)
                                    <tr class="odd" role="row">
                                        <td class="sorting_1">{{$no++}}</td>
                                        <td>{{$data->shop_name}}</td>
                                        <td>{{$data->category_name}}</td>
                                        <td>{{$data->item_name}}</td>
                                        <td>
                                            <img src="{{'/images/MenuItem/'.$data->item_image}}" width="50px" height="50px" alt="">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('admin/Item/edit/'.$data->MenuItem_Tid)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a  onclick="return confirm('Are you sure?')" href="{{url('admin/Item/delete/'.$data->MenuItem_Tid)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                        </tr>
                                    @endforeach
                                  
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <!-- End Table -->
    </div>
</div>
 
<!--**********************************
    Content body end
***********************************-->
@endsection