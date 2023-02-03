<?php

namespace App\Http\Controllers\Users; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\MenuItemModel;
use App\Models\MstShopModel;
use App\Models\ResturantModel;
use App\Models\UserRegModel;
use Illuminate\Support\Facades\Session;
class UserLoginController extends Controller
{
    //user login page.
    public function index()
    {
        return view('user/userlogin');
    }
    public function UserReg()
    {
        return view('user/UserReg');

    }
    public function UserRegStore(Request $request)
    {
        $user= new UserRegModel;
        $user->UserName=$request['UserName'];
        $user->UserMobile=$request['UserMobile'];
        $user->Password= Crypt::encryptstring($request['Password']);
        $user->save();
        return redirect('user/login')->with('message', 'Registration Successfully');
    }
    public function authenticate(Request $request)
    {
        $validated  = $request->validate([  
            'UserMobile' => 'required|numeric|digits:10',
            'Password' => 'required',
        ]);
        $decrypted =$request->Password;
        $user=DB::table('user_reg')->where('UserMobile','=',$request->UserMobile)->first();
    
        if($user){
        if(Crypt::decryptString($user->Password) === $decrypted){
                $request->session()->put('mobile', $user->UserMobile);
                return redirect('user/dashboard');
            }else{
                return back()->with('Credentials','Password not matced in our records!');
            }
        }else{
            return back()->with('Credentials','Mobile not matced in our records!');
        }
   }
   
    public function logout(Request $request)
    {
      if(Session::has('mobile')){
        Session::pull('mobile');
        return redirect('user/login');
      
      }
 
    }
}
