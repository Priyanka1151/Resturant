<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItemModel;
use App\Models\MstShopModel;
use App\Models\ResturantModel;
use App\Models\TempOrderModel;
use App\Models\ComfirmOrderModel;
use DB;
class dashboardController extends Controller
{ 
    public function index(Request $request)   
    {
        $Itemlist=MenuItemModel::join('mster_menucategory', 'mst_menuitem.categoryid', '=', 'mster_menucategory.Category_Tid')
                 ->select('mst_menuitem.*','mster_menucategory.category_name', 'mster_menucategory.Category_Tid')
                 ->get();
        // ResturantModel::join('master_shop', 'resturant.shopid','=', 'master_shop.shop_Tid')
        // // where('rest_mobile', session()->get('mobile'))
        // //     ->
        //     ->join('mst_menuitem','resturant.shopid','=', 'mst_menuitem.shopid')
        //     ->join('mster_menucategory', 'resturant.shopid','=','mster_menucategory.shopid')
        //     ->select()
            // ->get(); 
        $temporder=TempOrderModel::where('UserMobile', session()->get('mobile'))->get();    
        return view('user/dashboard', compact('Itemlist', 'temporder'));
    }
    public function updatetoitem(Request $request)
    { 
        // if($request->ajax()){
        //         return $request->post();
        //     }
        //     return "HTTP"; 
        $quantity=$request['quantity'];
        $MenuItem_Tid=$request['MenuItem_Tid'];
        $item=MenuItemModel::where('MenuItem_Tid', $request['MenuItem_Tid'])
             ->first();    
        $itemupdate=MenuItemModel::where('MenuItem_Tid', $MenuItem_Tid)
                    ->update([
                        'quantity'=>$request['quantity'],
                        'order'=>1
                    ]);                                   
            
        return back()->with('message', 'Add Quantity');
    }
    // tempoary order store.
    public function TempOrderStore(Request $request)
    {
        // print_r($request->all());
        // die();
        $temporderid = rand(00000000, 99999999);
        $categoryid=$request['Category_Tid'];
        $category_name=$request['category_name'];
        $item_name=$request['item_name'];
        $MenuItemid=$request['MenuItem_Tid'];
        $quantity=$request['quantity'];
        $price=$request['price'];
        $shopid=$request['shopid'];
        $UserMobile=$request['UserMobile'];
        $temp_id=$request['temp_id'];
        $total= $request[''];
        $arry=$request['MenuItem_Tid'];
        $i='';
        for($i=0; $i<count($arry); $i++){
        // if($arry->count() > 0){ 
            if($quantity[$i]>0)
                {
                $store= new TempOrderModel;
                $store->shopid =  $shopid[$i]; 
                $store->category_id = $categoryid[$i]; 
                $store->item_name = $item_name[$i]; 
                $store->MenuItemid = $MenuItemid[$i]; 
                $store->quantity = $quantity[$i]; 
                $store->category_name = $category_name[$i]; 
                $store->price = $price[$i]; 
                $store->temporderid = $temporderid; 
                $store->UserMobile = $UserMobile[$i];
                $store->total = $quantity[$i]*$price[$i]; 
                $store->save();
                
            } 
        }      
        
        return redirect('user/order-page');
    }
    // public function UpdateTemOrder(Request $request)
    // {
    //     // $data=TempOrderModel::where('UserMobile', session()->get('mobile'))->first();
    //     // echo "<pre>";
    //     // print_r($data);
    //     // die();
    //     if(TempOrderModel::where('UserMobile', session()->get('mobile'))->exists()){
    //         $temporder_update=TempOrderModel::where('UserMobile',session()->get('mobile'))
    //         ->update([
    //             'quantity'=>$request['quantity']
    //         ]);
    //     }else{
    //         echo "data not found";
    //     }
    //     return back();
    // }
    //comfirm order page .
    public function OrderView()
    {
        $MobileSession=session()->get('mobile');
        $TempOrder=TempOrderModel::where('UserMobile', $MobileSession)
                    ->get();
        $Total=TempOrderModel::where('UserMobile', $MobileSession)->sum('total');    
        $ComTotal=ComfirmOrderModel::where('usermobile', $MobileSession)->sum('total');    
        return view('user/ComfirmOrder', compact('TempOrder','Total', 'ComTotal'));
    }
    // comfirm order store.
    public function ComOrderStore(Request $request)
    {
        $comtemporderid = rand(00000000, 99999999);
        $categoryid=$request['category_id'];
        $category_name=$request['category_name'];
        $item_name=$request['item_name'];
        $MenuItemid=$request['MenuItemid'];
        $quantity=$request['quantity'];
        $price=$request['price'];
        $shopid=$request['shopid'];
        $UserMobile=$request['usermobile'];
        $temp_id=$request['temp_id'];
        
        $arry=$request['temp_id'];
        $i='';
        for($i=0; $i<count($arry); $i++){
            if($quantity[$i]>0)
                {
                $comfirmorder=new ComfirmOrderModel;
                $comfirmorder->shopid =  $shopid[$i]; 
                $comfirmorder->category_id = $categoryid[$i]; 
                $comfirmorder->item_name = $item_name[$i]; 
                $comfirmorder->MenuItemid = $MenuItemid[$i]; 
                $comfirmorder->quantity = $quantity[$i]; 
                $comfirmorder->category_name = $category_name[$i]; 
                $comfirmorder->price = $price[$i]; 
                $comfirmorder->comfirmorderid = $comtemporderid; 
                $comfirmorder->usermobile = $UserMobile[$i]; 
                $comfirmorder->total =$quantity[$i]*$price[$i]; 
                $comfirmorder->save();
                
            } 
        }      
        return redirect('user/successfull-page');
        
    }
    // temp order delete.
    public function orderdelete($temp_id)
    {
        $temdelete=TempOrderModel::where('temp_id', $temp_id)->delete();
        return back();
    }
    // success- page.
    public function SucessOrderPage()
    {
        $MobileSession=session()->get('mobile');
        $ComTotal=ComfirmOrderModel::where('usermobile', $MobileSession)->sum('total'); 
        $ComorderStatus=ComfirmOrderModel::where('usermobile', $MobileSession)
                        ->get();    
           
        return view('user/SuccessfullOrder', compact('ComTotal', 'ComorderStatus'));
    }
    // add to cart.
    // public function addtocart(Request $request)
    // {
    //     $MenuItem_Tid = $request->input('MenuItem_Tid');
    //     $quantity = $request->input('quantity');

    //     if(Cookie::get('shopping_cart'))
    //     {
    //         $cookie_data = stripslashes(Cookie::get('shopping_cart'));
    //         $cart_data = json_decode($cookie_data, true);
    //     }
    //     else
    //     {
    //         $cart_data = array();
    //     }

    //     $item_id_list = array_column($cart_data, 'item_id');
    //     $MenuItem_Tid_is_there = $MenuItem_Tid;

    //     // if(in_array($MenuItem_Tid_is_there, $item_id_list))
    //     // {
    //     //     foreach($cart_data as $keys => $values)
    //     //     {
    //     //         if($cart_data[$keys]["item_id"] == $MenuItem_Tid)
    //     //         {
    //     //             $cart_data[$keys]["item_quantity"] = $request->input('quantity');
    //     //             $item_data = json_encode($cart_data);
    //     //             $minutes = 60;
    //     //             Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
    //     //             return response()->json(['status'=>'"'.$cart_data[$keys]["item_name"].'" Already Added to Cart','status2'=>'2']);
    //     //         }
    //     //     }
    //     // }
    //     // else
    //     // {
    //         $products = MenuItemModel::find($MenuItem_Tid);
    //         $prod_name = $products->name;
    //         $prod_image = $products->image;
    //         $priceval = $products->price;

    //         if($products)
    //         {
    //             $item_array = array(
    //                 'item_id' => $MenuItem_Tid,
    //                 'item_name' => $prod_name,
    //                 'item_quantity' => $quantity,
    //                 'item_price' => $priceval,
    //                 'item_image' => $prod_image
    //             );
    //             $cart_data[] = $item_array;

    //             $item_data = json_encode($cart_data);
    //             $minutes = 60;
    //             Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
    //             return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
    //         }
    //     // }
    // }

   
}
