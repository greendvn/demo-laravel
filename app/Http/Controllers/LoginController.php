<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFromLogin(){
        return view('login.login');
    }

    public function login(Request $request){
        $email = $request->email;
        $pass = $request->pass;

        $data =[
            'email' => $email,
            'password'=>$pass
        ];
        if(Auth::attempt($data)){
            return redirect('/admin');
        };

        return back();
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
