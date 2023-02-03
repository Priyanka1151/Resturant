@extends('layouts.admin_master')
@section('title','Order Page')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order Datatable</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        @foreach($comorder as $comorders)
                        <form action="{{url('admin/update')}}" method="post" id="statusForm{{$comorders->Comorder_Tid}}">
                            @csrf
                                   
                            @endforeach
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sr.No.</th>
                                        <th>Category Name</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Amount Rs</th>
                                        <th>OrderId</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($comorder as $comorders)
                                        <tr>
                                            <td><input {{isset($comorders['coking_status']) }} 
                                                    value="1" type="checkbox" name="status" 
                                                    onchange="document.getElementById('statusForm{{$comorders->Comorder_Tid}}').submit()"
                                                >
                                            </td>
                                            <td>{{$no++}}</td>
                                            <td>{{$comorders->category_name}}</td>
                                            <td>{{$comorders->item_name}}</td>
                                            <td>{{$comorders->quantity}}</td>
                                            <td>{{$comorders->price}}</td>
                                            <td>{{$comorders->comfirmorderid}}</td>
                                            <td>
                                                @if($comorders->coking_status == 0)
                                                    <div class="input-group status">
                                                        <div class="updateStatus" style="cursor: pointer">
                                                            <p id="" class="badge badge-danger">Process</p>
                                                        </div> 
                                                        <input type="hidden" name="Comorder_Tid" id="Comorder_Tid" class="Comorder_Tid" value="{{$comorders->Comorder_Tid}}">
                                                    </div>
                                                @elseif($comorders->coking_status == 1)
                                                <div class="input-group status">
                                                        <div class="updateStatus" style="cursor: pointer">
                                                            <p id="" class="badge badge-warning">Ready To Delivery</p>
                                                        </div> 
                                                        <input type="hidden" name="Comorder_Tid" id="Comorder_Tid" class="Comorder_Tid" value="{{$comorders->Comorder_Tid}}">
                                                    </div>
                                                @elseif($comorders->coking_status == 2)
                                                <p id="" class="badge badge-success">Delivered</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach    
                                </tbody>
                            </table>
                            <button type="submit" name="submit" class="badge badge-danger">Update</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection                