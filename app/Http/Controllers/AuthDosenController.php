<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthDosenController extends Controller
{
    
    function login()
    {
        return view('dosen.login');
    }

    function authenticate(Request $request)
    {
        if(Auth::guard('dosen')->attempt(
            $request->only('email','password')
        )){
            return redirect('/dashboard');
        }

        return back()->with('error','Email atau password salah');
    }

    function register()
    {
        return view('dosen.register');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'email' => 'required|email|unique:dosens,email',
        'password' => 'required|min:8|confirmed',
    ], [
        'email.unique' => 'Email sudah terdaftar.',
        'password.confirmed' => 'Konfirmasi password tidak sesuai.',
    ]);

    Dosen::create([
        'nama' => $request->nama,
        'email' => strtolower($request->email),
        'password' => Hash::make($request->password),
    ]);

    return redirect('/login')
        ->with('success', 'Registrasi berhasil. Silakan login.');
}

    function logout()
    {
        Auth::guard('dosen')->logout();
        return redirect('/login');
    }
}
