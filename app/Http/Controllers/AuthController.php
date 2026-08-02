<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function authenticate(Request $request)
{
    $role = $request->role;

    /*
    |--------------------------------------------------------------------------
    | LOGIN DOSEN
    |--------------------------------------------------------------------------
    */

    if ($role == 'dosen') {

        if (Auth::guard('dosen')->attempt([
            'email' => $request->username,
            'password' => $request->password
        ])) {

            $request->session()->regenerate();

            return redirect('/dashboard');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN MAHASISWA
    |--------------------------------------------------------------------------
    */

    if ($role == 'student') {

    if (Auth::guard('student')->attempt([
        'npm' => $request->username,
        'password' => $request->password
    ])) {

        $request->session()->regenerate();

        $student = Auth::guard('student')->user();

        if (!$student->is_password_changed) {

            return redirect()
                ->route('mahasiswa.password.form');
        }

        return redirect()
            ->route('mahasiswa.dashboard');
    }
}

    /*
    |--------------------------------------------------------------------------
    | LOGIN GAGAL
    |--------------------------------------------------------------------------
    */

    return back()->with(
        'error',
        'Username atau password salah'
    );
}
    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::guard('dosen')->logout();
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}