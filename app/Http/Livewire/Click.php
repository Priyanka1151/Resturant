<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\MenuItemModel;
class Click extends Component
{
    public $msg = '';
    public $MenuItem_Tid = '';
   
    public function render()
    {
        $item=MenuItemModel::get();
        return view('livewire.click', compact('item'))->extends('livewire.rest');
    }
   
    public function decrement($MenuItem_Tid)
    {
        $dec=MenuItemModel::where('MenuItem_Tid', $MenuItem_Tid)
        // ->decrement('quantity');
        ->first();
        // print_r($dec);
        // die();
        if($dec){
            $dec->decrement('quantity');
            $this->dispatchBrowserEvent('message',[
                'text'=>'success',
                'error'=>'successfully',
                'status'=>200

            ]);
           
        }else{
            $dec->decrement('quantity');
            $this->dispatchBrowserEvent('message',[
                'text'=>'failed',
                'error'=>'fail',
                'status'=>404
            ]);
        }
    }
    public function increment($MenuItem_Tid)
    {
        $dec=MenuItemModel::where('MenuItem_Tid', $MenuItem_Tid)->first();
        if($dec){
            $dec->increment('quantity');
            $this->dispatchBrowserEvent([
                'message'=>'success',
                'error'=>'successfully',
                'status'=>200

            ]);
           
        }else{
            $dec->increment('quantity');
            $this->dispatchBrowserEvent([
                'message'=>'failed',
                'error'=>'fail',
                'status'=>404
            ]);
        }
    }
    // public function clickEvt()
    // {
    //     $this->msg = "Button has been clicked.";
    // }
   
    // public function trackClickEvt($studentId)
    // {
    //     $this->msg = $studentId;
    // }
}