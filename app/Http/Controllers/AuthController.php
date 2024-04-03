<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function index(){
        return view('auth.register');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        User::create($request->all());
        return redirect('/')->with('success', 'Successfully Registerd');
    }

    public function loginUser(Request $request){
        $details = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // should regenerate session if authentication is successful

        if(Auth::attempt($details)){
            $request->session()->regenerate();
            if(Auth::user()->role_as == '1'){
                return redirect()->intended('admin/blogs');
            }else{
                return redirect('/home');
            }
        }
        return back()->withErrors([
            'email' => 'Credentials do not match'
        ])->onlyInput('email');
    }


    public function login(){
        return view('auth.login');
    }

    public function signout(){
        
        Auth::logout();

        return redirect('/');
    }
}
