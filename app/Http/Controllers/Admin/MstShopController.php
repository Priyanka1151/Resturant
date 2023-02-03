<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MstShopModel;
use Illuminate\Support\Facades\Crypt;
class MstShopController extends Controller
{
    //shop MstShop.blade.php
    public function index()
    {
        $MstShop=MstShopModel::get();
        return view('admin/MstShop', compact('MstShop'))->with('no', 1);
    }
    public function store(Request $request)
    {
        $insert=new MstShopModel;
        $insert->shop_name=$request['ShopName'];
        $insert->mobileno=$request['MobileNo'];
        $insert->password=Crypt::encryptString($request['Password']);
        $insert->save();
        return redirect('admin/shop')->with('message', 'Save Successfully');
    }
    public function delete($shop_Tid)
    {
        $mstshop=MstShopModel::where('shop_Tid', $shop_Tid)
                ->delete();
        return back()->with('message', 'Delete Successfully');        
    }
    public function edit($shop_Tid)
    {
        $mstshop=MstShopModel::where('shop_Tid', $shop_Tid)
                    ->first();
        return view('admin/Edit_MstShop', compact('mstshop'));            
    }
    public function update(Request $request)
    {
        $decryptpass=Crypt::encryptString($request['Password']);
        $shop_Tid=$request['shop_Tid'];
        $Mstshop=MstShopModel::where('shop_Tid', $shop_Tid)
                ->update([
                    'shop_name' =>$request['ShopName'],
                    'mobileno' =>$request['MobileNo'],
                    'password' =>$decryptpass
                ]);
        return redirect('admin/shop')->with('message', 'Update Successfully');       
    }
}
