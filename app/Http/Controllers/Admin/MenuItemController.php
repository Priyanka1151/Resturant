<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItemModel;
use App\Models\MstShopModel;
use App\Models\MenuCategoryModel;
use App\Models\ItemTypeModel;
class MenuItemController extends Controller
{
    //menu item .
    // MenuItem.blade.php
    public function index() 
    {
        $MenuItem=MenuItemModel::join('master_shop', 'mst_menuitem.shopid','=','master_shop.shop_Tid')
                 ->join('mster_menucategory', 'mst_menuitem.categoryid','=','mster_menucategory.Category_Tid')
                 ->select('mst_menuitem.*','master_shop.shop_name','mster_menucategory.category_name')
                 ->get();
        $Shop=MstShopModel::get();
        $Category=MenuCategoryModel::get();
        $ItemType=ItemTypeModel::get();
        return view('admin/MenuItem',compact('Shop', 'Category','ItemType','MenuItem'))->with('no', 1);
    } 
    public function store(Request $request)
    {
        $insert=new MenuItemModel;
        $insert->shopid=$request['ShopName'];
        $insert->categoryid=$request['CategoryName'];
        $insert->item_name=$request['ItemName'];
        $insert->description=$request['Description'];
        $insert->item_type=$request['ItemType'];
        $insert->price=$request['Price'];
        if($request->hasfile('ItemImage'))
        {
            $file = $request->file('ItemImage');
            $extention= $file->getClientOriginalExtension();
            $filename = time()."Item".'.'.$extention;
            $file->move('images/MenuItem',$filename);
            $insert->item_image = $filename;
        } 
        $insert->save();
        
        return redirect('admin/item')->with('message', 'Save Successfully');  
    }
    public function delete($MenuItem_Tid)
    {
        $MenuItem=MenuItemModel::where('MenuItem_Tid', $MenuItem_Tid)
                 ->delete();
        return back()->with('message', 'Delete Successfully');         
    }
    public function edit($MenuItem_Tid)
    {
        $MenuItem=MenuItemModel::where('MenuItem_Tid', $MenuItem_Tid)
                ->join('mster_menucategory', 'mst_menuitem.categoryid','=','mster_menucategory.Category_Tid')
                ->join('item_type','mst_menuitem.item_type','=','item_type.ItemType_id')
                ->join('master_shop','mster_menucategory.shopid','=','master_shop.shop_Tid')
                ->select('mst_menuitem.*','mster_menucategory.category_name','item_type.itemtype_name','master_shop.shop_name')
                ->first();
        $Shop=MstShopModel::get();
        $Category=MenuCategoryModel::get();
        $ItemType=ItemTypeModel::get();
        return view('admin/Edit_Item', compact('MenuItem','Shop','Category','ItemType'));            
    }
    public function update(Request $request)
    {
        if($request->hasfile('item_image'))
        {
            $file = $request->file('item_image');
            $extention= $file->getClientOriginalExtension();
            $item_image = time()."Item".'.'.$extention;
            $file->move('images/MenuItem',$item_image);
           
        }
        else
         {
             $item_image = $request['olditem_image'];
         }

        $MenuItem_Tid=$request['MenuItem_Tid'];
        $MenuItem=MenuItemModel::where('MenuItem_Tid', $MenuItem_Tid)
                ->update([
                'shopid'=> $request['ShopName'],
                'categoryid'=> $request['CategoryName'],
                'item_name'=> $request['ItemName'],
                'description'=> $request['Description'],
                'item_type'=> $request['ItemType'],
                'price'=> $request['Price'],
                'item_image'=>$item_image
                ]);
            // }
            
        return redirect('admin/item')->with('message', 'Update Successfully');        

    }
}
