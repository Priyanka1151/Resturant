@extends('Userslayouts.user_master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <!-- <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('user/dashboard')}}" class="badge badge-danger">Back</a></li>
            </ol>
        </div> -->
        <form action="{{url('user/ComOrderStore')}}" method="post">
            @csrf
            @foreach($TempOrder as $addtocarts)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">{{$addtocarts->category_name}}</h5>
                                <input type="hidden" name="category_name[]" value="{{$addtocarts->category_name}}">
                                <input type="hidden" name="temp_id[]" value="{{$addtocarts->temp_id}}">
                                <input type="hidden" name="category_id[]" value="{{$addtocarts->category_id}}">
                                <input type="hidden" name="MenuItemid[]" value="{{$addtocarts->MenuItemid}}">
                                <input type="hidden" name="usermobile[]" value="{{$addtocarts->UserMobile}}">
                                <input type="hidden" name="shopid[]" value="{{$addtocarts->shopid}}">
                            </div>
                            <div class="card-footer border-0 pt-0 mt-3">
                                <p class="card-text d-inline">{{$addtocarts->item_name}}
                                    <input type="hidden" name="item_name[]" value="{{$addtocarts->item_name}}"> 
                                    <input type="hidden" name="price[]" value="{{$addtocarts->price}}">
                                    <br><strong>Rs &nbsp;{{$addtocarts->price}}</strong>
                                </p>
                                <div class="card-link float-end quantity">
                                    <div class="input-group quantity">
                                        <a href="{{url('user/orderdelete/'.$addtocarts->temp_id)}}" class="btn btn-primary rounded-circle shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        &nbsp;&nbsp;
                                        <div class="decrement-btn " style="cursor: pointer">
                                            <span class="badge badge-rounded badge-danger">-</span>
                                        </div> 
                                        <input type="text" name="quantity[]"  id="quantity" class="qty-input qty text-center rounded text-outline-danger" onkeyup="menu();" size="1" maxlength="2" max="10"  value="{{$addtocarts->quantity}}">
                                        <div class="increment-btn " style="cursor: pointer">
                                            <span class="badge badge-rounded badge-danger">+</span>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                <!-- <div class="text-center sticky-top">
                    
                    <button type="submit"  name="submit" class="col-sm-3  btn btn-danger">Comfirm to Order</button>
                </div> -->
        
    </div>
</div>  
        <div class="footer sticky-top">
            <div class="copyright">
                <p><button type="submit"  name="submit" class="col-sm-3  btn btn-danger">Comfirm to Order</button></p>
            </div>
        </div>
        </form>
</div>
@endsection
