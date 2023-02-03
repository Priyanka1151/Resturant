@extends('Userslayouts.user_master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        {{--
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-warning">
                    @foreach($ComorderStatus as $ComorderStatuss)
                    <div class="card-header">
                        @if($ComorderStatuss->coking_status==0)
                        <p class="card-title">Food Name {{$ComorderStatusss->item_name}} Status : <span class="badge badge-danger">Pending</span></p>
                        @elseif($ComorderStatuss->coking_status ==1)
                        <p class="card-title">Status : Under To Process</p>
                        @elseif($ComorderStatuss->coking_status ==2)
                        <p class="card-title">Status : Ready To Delivery</p>
                        @elseif($ComorderStatuss->coking_status ==3)
                        <p class="card-title">Status : Delivered</p>
                        @endif
                    </div>
                    @endforeach
                    <div class="card-body mb-0">
                        <h5 class="card-text">Grand Total Rs. {{$ComTotal}}</h5>
                    </div>
                    <div class="card-footer bg-transparent text-center border-0 text-white">
                        <!-- <button class="btn btn-primary">Pay</button> -->
                    </div>
                </div>
            </div>
        </div>
        --}}
        <!-- row -->

        <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grand Total Rs. {{$ComTotal}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Food</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ComorderStatus as $ComorderStatuss)
                                            <tr>
                                                <td>{{$ComorderStatuss->item_name}}</td>
                                                <td>
                                                    @if($ComorderStatuss->coking_status == 0)
                                                    Pending
                                                    @elseif($ComorderStatuss->coking_status == 1)
                                                    Under To Process
                                                    @elseif($ComorderStatuss->coking_status == 2)
                                                    Ready To Delivery
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- end  -->
    </div>
</div>  

@endsection