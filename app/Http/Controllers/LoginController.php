<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        //return login tanda titik menandakan masuk ke file index dari folder login
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
}
