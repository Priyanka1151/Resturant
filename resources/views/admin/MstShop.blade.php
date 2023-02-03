@extends('layouts.admin_master')
@section('title','Add Shop')
@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Shop</a></li>
                  <!-- Button trigger modal -->
                <li  style="margin-left:auto"> <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Shop</button></li>
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
        <div class="modal fade" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Shop</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('admin/shop/store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Shop Name</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control input-default" name="ShopName"  placeholder="Enter Shop Name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile No.</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control input-default" name="MobileNo"  placeholder="Enrter Mobile No" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <span class="text-danger">*</span>
                                <input type="password" class="form-control input-default" name="Password" id="Password" placeholder="Enrter Password" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
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
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200.703px;">Mobile</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 66.6562px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($MstShop as $data)
                                    <tr class="odd" role="row">
                                        <td class="sorting_1">{{$no++}}</td>
                                        <td>{{$data->shop_name}}</td>
                                        <td>{{$data->mobileno}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('admin/shop/edit/'.$data->shop_Tid)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a  onclick="return confirm('Are you sure?')" href="{{url('admin/shop/delete/'.$data->shop_Tid)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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