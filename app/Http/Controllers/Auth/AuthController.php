<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(StoreAuthRequest $request){
        $credentials = $request->only('user', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }else{
            $msg = "Acesso Negado!";
            return redirect()->back()->withErrors( $msg )->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}