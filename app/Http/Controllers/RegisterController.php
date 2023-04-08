<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        //return register tanda titik menandakan masuk ke file index dari folder register
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
}
