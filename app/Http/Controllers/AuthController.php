<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function login(){
        return view('auth.login');
    }

    public function login_process(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect(route('welcome'))->with('success','login success!');
        }else{
            return redirect(route('login'))->with('error','login failed!');
        }
    }

    public function register($locale='en'){
        App::setLocale($locale);
        return view('auth.register');
    }

    public function register_process(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            // 'password' => 'required|confirmed',
            // 'password_confirmation' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect(route('welcome'))->with('success','register success!');
        }else{
            return redirect(route('register'))->with('error','register failed!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }

    public function dashboard(){
        return view('dashboard');
    }
}
