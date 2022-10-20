<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;


class LoginContronller extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if($user->role_id == 1 ){
                return redirect('/admin');
            }elseif($user->role_id == 2 ){
                return redirect('/admin');
            }elseif($user->role_id == 3 ){
                return redirect()->route('frontend.course',['user_id'=>$user->id]);
            }else{
                Auth::logout();
                return redirect('/login');
            }
        } else {
            return view('auth.login');
        }
    }
    public function postLogin(Request $request)
    {

        $admin = [
            'email' => $request->email,
            'password' => $request->password,
            'isAdmin' => 1,
        ];
        $employ = [
            'email' => $request->email,
            'password' => $request->password,
            'isAdmin' => 0,
        ];

        $value = Session::put('email', $request->email);
        if (Auth::attempt($admin)) {
           
            return redirect('/');
        }
        elseif (Auth::attempt($employ)) {
            return redirect('/');
 
        } 
       
        else {
            return redirect('/login');
        }
        
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
