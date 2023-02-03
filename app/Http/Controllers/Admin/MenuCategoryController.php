<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuCategoryModel;
use App\Models\MstShopModel;
class MenuCategoryController extends Controller
{
    //menu category.
    public function index()
    {   
        $Category=MenuCategoryModel::join('master_shop', 'mster_menucategory.shopid','=','master_shop.shop_Tid')
        ->select('mster_menucategory.*', 'master_shop.shop_name')
        ->get();
        $ShopName=MstShopModel::get();
        return view('admin/MenuCategory', compact('ShopName','Category'))->with('no', 1);
    }
    public function store(Request $request)
    {
        $category= new MenuCategoryModel;
        $category->shopid=$request['ShopName'];
        $category->category_name=$request['CategoryName'];
        $category->save();
        return redirect('admin/category')->with('message', 'Save Sucessfully');
    }
    public function delete($Category_Tid)
    {
        $Category=MenuCategoryModel::where('Category_Tid', $Category_Tid)
                ->delete();
        return back()->with('message', 'Delete Successfully');        
    }
    public function edit($Category_Tid)
    {
        $ShopName=MstShopModel::get();
        $Category=MenuCategoryModel::where('Category_Tid', $Category_Tid)
                ->join('master_shop','mster_menucategory.shopid','=','master_shop.shop_Tid')
                ->first();
        return view('admin/Edit_Category',compact('ShopName','Category'));        
    }
    public function update(Request $request)
    {
        $Category_Tid=$request['Category_Tid'];
        $Category=MenuCategoryModel::where('Category_Tid', $Category_Tid)
                ->update([
                    'shopid'=>$request['ShopName'],
                    'category_name'=>$request['CategoryName']
                ]);
        return redirect('admin/category')->with('message', 'Update Sucessfully');  
    }
}
