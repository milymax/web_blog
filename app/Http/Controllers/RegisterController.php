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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255', //tulis dengan tanda pipe
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], //ataupun array sama saja
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255'
        ]);

        dd('registrasi berhasil!!!');
    }
}
