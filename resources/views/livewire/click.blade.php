<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
</div>
@extends('Userslayouts.user_master')
@section('content')
    
<div class="content-body">
   
    <!-- table -->
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Category Name</th>
      <th scope="col">Item Name</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  @foreach($item as $items)
    <tr>
      <th scope="row">{{$items->item_name}}</th>
      <td>{{$items->item_name}}</td>
      <td>{{$items->description}}</td>
      <td>
        <div class="input-group">
            <button type="button"  wire:click="increment({{$items->MenuItem_Tid}})"><i class="fa-solid fa-minus"></i></button>
            <input type="text" value="{{$items->quantity}}" name="quantity" size="1">
            <button type="button"   wire:click="decrement({{$items->MenuItem_Tid}})"><i class="fa-solid fa-plus"></i></button>
        </div>
      </td>
      <td>{{$items->price * 4}}</td>
    </tr>
 @endforeach 
  </tbody>
</table>
</div>   
@endsection
