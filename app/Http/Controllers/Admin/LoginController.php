<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //Admin Login Panel.
    public function index()
    {
        return view('admin/Adminlogin');
    }
    public function Auth(Request $request)
    {
        $validated  = $request->validate([  
            'KitchenMobile' => 'required|numeric|digits:10',
            'password' => 'required',
        ]);
        $decrypted =$request->password;
        $kitchen=DB::table('resturant')->where('rest_mobile','=',$request->KitchenMobile)->first();
    
        if($kitchen){
        if(Crypt::decryptString($kitchen->password) === $decrypted){ 
                $request->session()->put('KitchenMobile', $kitchen->rest_mobile); 
                $request->session()->put('role_as', $kitchen->role_as);
                $request->session()->put('shop_id', $kitchen->shopid);
                return redirect('admin/dashboard');
                
            }else{
                return back()->with('Credentials','Password not matced in our records!');
            }
        }else{
            return back()->with('Credentials','Mobile not matced in our records!');
        }
    }
   
    public function logout(Request $request)
    {
      if(Session::has('role_as')){
        Session::pull('role_as');
        return redirect('admin/login');
      
      }
 
    }
}
