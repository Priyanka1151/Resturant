@extends('layouts.admin_master')
@section('title','Resturant')
@section('content')
   <!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Resturant</a></li>
                  <!-- Button trigger modal -->
                <li  style="margin-left:auto"> <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Resturant</button></li>
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
                        <h5 class="modal-title">Add Kitchen </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <form action="{{url('admin/resturant/store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label"><strong>Kitchen Name</strong></label>
                                <span class="text-danger">*</span>
                                <select name="shopname" id="" class="form-control">
                                    <option value="">Choose Kitchen</option>
                                    @foreach($shopid as $shopids)
                                        <option value="{{$shopids->shop_Tid}}">{{$shopids->shop_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Resturant Mobile No.</strong></label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control input-default" name="ResturanUserName"  placeholder="Enter Mobile No." required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Password</strong></label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control input-default" name="password"  placeholder="Enter Password" required>
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
                            <h4 class="card-title">Resturant/Kitchen</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50.234px;">S.No</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50.234px;">Kitchen Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50.234px;">Kitchen login Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 50.234px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                    @foreach($Resturant as $data)
                                    <tr class="odd" role="row">
                                        <td class="sorting_1">{{$no++}}</td>
                                        <td>{{$data->shop_name}}</td>
                                        <td>{{$data->rest_mobile}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('admin/resturant/edit/'.$data->Restutant_Tid)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a  onclick="return confirm('Are you sure?')" href="{{url('admin/resturant/destroy/'.$data->Restutant_Tid)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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