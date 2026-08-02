<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\Dosen;
use App\Models\PasswordResetOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordDosenController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM ATUR ULANG PASSWORD
    |--------------------------------------------------------------------------
    */

    public function showResetForm()
    {
        return view('auth.forgot-password');
    }

    /*
    |--------------------------------------------------------------------------
    | KIRIM OTP
    |--------------------------------------------------------------------------
    */

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        if ($request->password != $request->password_confirmation) {

    return back()->with(
        'error',
        'Konfirmasi password tidak sama.'
    );

}

        $dosen = Dosen::where('email', $request->email)->first();

        if (!$dosen) {

            return back()->with(
                'error',
                'Email dosen tidak ditemukan.'
            );
        }

        PasswordResetOtp::where(
            'email',
            $request->email
        )->delete();

        $otp = rand(100000,999999);

        PasswordResetOtp::create([

            'email' => $request->email,

            /*
             Password disimpan sementara.
             Nanti setelah OTP benar baru di-hash.
            */

            'password' => $request->password,

            'otp' => $otp,

            'expired_at' => now()->addMinutes(5)

        ]);

        Mail::to($request->email)
            ->send(new SendOtpMail($otp));

        session([

            'reset_email' => $request->email

        ]);

        return redirect()->route('otp.form');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM OTP
    |--------------------------------------------------------------------------
    */

    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    /*
|--------------------------------------------------------------------------
| VERIFIKASI OTP
|--------------------------------------------------------------------------
*/

public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required'
    ]);

    $email = session('reset_email');

    if (!$email) {
        return redirect()->route('password.request')
            ->with('error', 'Session reset password telah berakhir.');
    }

    $data = PasswordResetOtp::where('email', $email)->first();

    if (!$data) {
        return redirect()->route('password.request')
            ->with('error', 'OTP tidak ditemukan.');
    }

    if (now()->gt($data->expired_at)) {

        $data->delete();

        return redirect()->route('password.request')
            ->with('error', 'OTP sudah kadaluarsa.');
    }

    if ($request->otp != $data->otp) {

        return back()->with(
            'error',
            'OTP yang dimasukkan salah.'
        );
    }

    $dosen = Dosen::where('email', $email)->first();

    $dosen->password = Hash::make($data->password);

    $dosen->save();

    $data->delete();

    session()->forget('reset_email');

    return redirect('/login')
        ->with(
            'success',
            'Password berhasil diubah. Silakan login.'
        );
}

/*
|--------------------------------------------------------------------------
| KIRIM ULANG OTP
|--------------------------------------------------------------------------
*/

public function resendOtp()
{
    $email = session('reset_email');

    if (!$email) {

        return redirect()->route('password.request');

    }

    $otp = rand(100000,999999);

    PasswordResetOtp::where(
        'email',
        $email
    )->update([

        'otp' => $otp,

        'expired_at' => now()->addMinutes(5)

    ]);

    Mail::to($email)
        ->send(new SendOtpMail($otp));

    return back()->with(
        'success',
        'OTP berhasil dikirim ulang.'
);
    }
}