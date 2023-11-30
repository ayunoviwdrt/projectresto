<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");    
    }
    function login(Request $request)
    {
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required '=> 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' =>$request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($infologin)){
            //kalau otentikasi sukses
            return redirect()->intended('/home');
        }else {
            //kalau otentikasi gagal
            return redirect('/sesi')->withErrors('Username dan password yaang dimasukkan tidak sesuai')->withInput();
        }
    }
    function logout() {
        Auth::logout();
        return redirect('/sesi')->with('success','');
    }
}