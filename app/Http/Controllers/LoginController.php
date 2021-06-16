<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view ('login.login');
    }
    
    public function postLogin(Request $request)
    {
    if (!Auth::attempt(['username' => $request->username, 'password' => $request->password, 'is_active' => "aktif"])) {
        return redirect()->back()->with('gagal','Username dan Password anda salah Atau Akun anda sedang di non Aktifkan');
    } else {
        
        return Redirect('/dashboard'); 
       }
    }

    public function getRegister()
    {
        return view ('login.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users|alpha_num|min:3|string',
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'role' => 'user',
            'password' => bcrypt($request->password)
        ]);
        return redirect('/login')->with('status','Registrasi Berhasil');
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('gagal','Anda telah keluar, Silahkan Login Kembali');
    }
}