<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $validatedData = $request->validate([
            'name' => 'required|max:255', //tulis dengan tanda pipe
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], //ataupun array sama saja
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255'
        ]);
        
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']); //dua dua nya sama untuk mengamankan password
        
        //membuat user baru dari variable validatedData yang dikirim ke database Users
        User::create($validatedData);

        // $request->session()->flash('successRegister', 'Registration Successfull, Login');

        // $this->$request->session()->flash('status', 'Task was successful!');
        

        //redirect ke halaman login dengan membawa pesan flash dibawah ini
        return redirect('/login')->with('successRegister', 'Registration successfull, login now');
          
        // dd('registrasi berhasil!!!');
    }
}
