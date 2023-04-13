<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        //return login tanda titik menandakan masuk ke file index dari folder login
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        //jika percobaan login dari $creadentials itu berhasil kita pindahkan ke halaman dashboard
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
            //The intended method provided by Laravel's redirector will redirect the user to the URL they were attempting to access before being intercepted by the authentication middleware. 
            //intended itu supaya melewati middleware terlebih dahulu
        }
        //jika tidak berhasil maka akan di return back ke halaman login
        return back()->with('loginError', 'Login Failed!');
        // dd('berhasil login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        //invalidate supaya gabisa dipake 
        $request->session()->invalidate();
        // regenerate supaya tidak dibajak
        $request->session()->regenerateToken();
        //redirect kehalaman yang kita mau contoh ke halaman home('/')
        return redirect('/');
    }
}
