<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstShopModel;
use App\Models\ResturantModel;
use Illuminate\Support\Facades\Crypt;
use App\Models\ComfirmOrderModel;
use DB;
// use confing\global;
class ResturantController extends Controller
{
    const STATUS_requested=1;
    const STATUS_ACCEPTED=2;
    //resturant.
    public function index()
    {
        $shopid=MstShopModel::get();
        // print_r(session()->get('role_as'));
        // die();
        $Resturant=ResturantModel::join('master_shop', 'resturant.shopid', '=', 'master_shop.shop_Tid')
                    ->select('resturant.*', 'master_shop.shop_name')
                    ->get();
        return view('admin/resturant', compact('shopid', 'Resturant'))->with('no', 1);

    }
    public function store(Request $request)
    {
        $Resturant=new ResturantModel;
        $Resturant->shopid=$request['shopname'];
        $Resturant->role_as=2;
        $Resturant->rest_mobile=$request['ResturanUserName'];
        $Resturant->password=Crypt::encryptString($request['Password']);
        $Resturant->save();
        return back()->with('message','Save Successfully');

    }
    public function destroy($Restutant_Tid)
    {
        $Resturant =ResturantModel::where('Restutant_Tid', $Restutant_Tid)
                    ->delete();
        return back()->with('message', 'Delete Successfully');            
    }
    // Edit_Resturant.blade.php
    public function edit(Request $request, $Restutant_Tid)
    {
        $Shop=MstShopModel::get();
        $encryptpass=Crypt::encryptString($request['password']);
        $decryptpass=Crypt::decryptString($encryptpass);
        $Resturant=ResturantModel::where('Restutant_Tid', $Restutant_Tid)->first();
        return view('admin/Edit_Resturant', compact('Resturant', 'Shop'));
    }
    public function update(Request $request)
    {
        $Restutant_Tid=$request['Restutant_Tid'];
        $password=Crypt::encryptString($request['password']);
        $Resturant=ResturantModel::where('Restutant_Tid', $Restutant_Tid)
                    ->update([
                        'shopid'=>$request['shopname'],
                        'rest_mobile'=>$request['ResturanUserName'],
                        'password'=>$password
                    ]); 
        return redirect('admin/resturant')->with('message', 'Update Successfully');           
       
    }
    // orderpage.
    public function OrderPage()
    {
        // print_r(session()->get('shop_id'));
        // die(); 
        $kitchen=ResturantModel::where('rest_mobile', session()->get('KitchenMobile'))
                 ->get();        
        if(session()->get('role_as')==2)
        {       
            $comorder=ComfirmOrderModel::where('comfirm_order.shopid', session()->get('shop_id'))
                        ->join('mster_menucategory', 'comfirm_order.category_id', '=', 'mster_menucategory.Category_Tid')
                        ->select('comfirm_order.*','mster_menucategory.category_name', 'mster_menucategory.Category_Tid')
                        ->get();
        }else
        {
            $comorder=ComfirmOrderModel::get();              
        } 

        return view('admin/OrderPage', compact('comorder'))->with('no', 1);         
    }
    public function UpdateStatus(Request $request)
    {
        $Comorder_Tid = $request['Comorder_Tid'];
        
        if(ComfirmOrderModel::where('Comorder_Tid', $Comorder_Tid)
                            ->where('coking_status', '=', 0)->exists())
                            {
            $comorderprocess=ComfirmOrderModel::where('Comorder_Tid', $Comorder_Tid)
                ->update([
                    'coking_status'=>1
                ]);
        }else{    
            $comorderDelivery=ComfirmOrderModel::where('Comorder_Tid', $Comorder_Tid)
                ->update([
                    'coking_status'=>2
                ]);
        }        
        
        return back();
    }
    public function statusupdates(Request $request)
    {
        if(ComfirmOrderModel::where('coking_status', '=', 2))
        {
            if($request->status == true)
            {
                $update=DB::table('comfirm_order')
                ->where('Comorder_Tid' , $request['Comorder_Tid'])
                ->update([
                    'coking_status'=>1
                ]);
            }
        }
        // elseif(ComfirmOrderModel::where('coking_status', '=', 1)){
        //     if($request->status != null)
        //     {
        //         $update=DB::table('comfirm_order')
        //         ->where('Comorder_Tid' , $request['Comorder_Tid'])
        //         ->update([
        //             'coking_status'=>2
        //         ]);
        //     }
        // }
        return back();
    }

}
