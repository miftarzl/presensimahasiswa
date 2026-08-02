<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    // form email
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // kirim link reset
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        $link = url('/reset-password/' . $token);

        Mail::raw(
            "Klik link berikut untuk reset password:\n$link",
            function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Reset Password');
            }
        );

        return back()->with(
            'success',
            'Link reset password berhasil dikirim'
        );
    }

    // form reset
    public function showResetForm($token)
    {
        return view('auth.reset-password', compact('token'));
    }

    // simpan password baru
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $reset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$reset) {
            return back()->with('error', 'Token tidak valid');
        }

        $dosen = Dosen::where('email', $request->email)->first();

        if (!$dosen) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        $dosen->password = Hash::make($request->password);
        $dosen->save();

        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return redirect('/login')
            ->with('success', 'Password berhasil diubah');
    }
}