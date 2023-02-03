@extends('Userslayouts.user_master')
@section('content')
<div class="content-body">
  <div class="container-fluid">
      <div class="row">
        @if (session('message'))
            <div class="alert-success">{{session('message')}}</div>
        @endif
          <div class="col-auto">
              <div class="card">
              @foreach($Itemlist as $items)
                <form  action ="{{url('user/store')}}" method="post">
                @csrf
                  <div class="card-header border-0 pb-0">
                      <h5 class="card-title">{{$items->category_name}}</h5>
                  </div>
                  <div class="card-body">
                    <div class="card-footer border-0 pt-0">
                      <p class="card-text d-inline"> {{$items->item_name}}</p>
                        <div class="card-link float-end product temstore tempupdate"> 
                            <div class="input-group quantity">
                              <div class="decrement-btn updateQuantity storetemdata c" style="cursor: pointer">
                                 <span class="badge badge-rounded badge-danger">-</span>
                              </div> 
                              <input type="hidden" name="UserMobile[]" class="UserMobile" id="UserMobile" value="{{session()->get('mobile')}}">
                                <input type="hidden" name="shopid[]" class="shopid" value="{{$items->shopid}}">
                                <input type="hidden" name="Category_Tid[]" class="Category_Tid" value="{{$items->Category_Tid}}">
                                <input type="hidden" name="category_name[]" class="category_name" value="{{$items->category_name}}">
                                <input type="hidden" name="item_name[]" class="item_name" value="{{$items->item_name}}">
                                <input type="hidden" name="price[]" class="price" value="{{$items->price}}">
                                <input type="hidden" name="MenuItem_Tid[]" id="MenuItem_Tid" class="MenuItem_Tid" value="{{$items->MenuItem_Tid}}">
                                <input type="text" name="quantity[]" data-id="{{$items->MenuItem_Tid}}" id="quantity" class="qty-input qty text-center rounded text-outline-danger" onkeyup="menu();" size="1" maxlength="2" max="10"  value="0">
                              <div class="increment-btn updateQuantity storetemdata" style="cursor: pointer">
                                <span class="badge badge-rounded badge-danger">+</span>
                              </div>
                            </div> 
                        </div>
                      </p>
                      <p class="card-text mt-2" style="font-size:12px;">
                       {{$items->description}}
                      </p>
                    </div>
                  </div>
                  <div class="card-footer border-0 pt-0">
                      <p class="card-text d-inline text-success p-2">Total: {{$items->price * $items->quantity}}</p>
                  </div>
                  @endforeach
                  <!-- <div class="text-center">
                    <button class="btn btn-danger" type="submit" name="comtemorder">Add to Order</button>
                  </div> -->
                
              </div>
          </div>
      </div>
  </div>
</div> 
    <div class="footer navbar-fixed-bottom">
        <div class="copyright">
            <p><button class="btn btn-danger" type="submit" name="comtemorder">Add to Order</button></p>
        </div>
    </div> 
    </form>
@endsection