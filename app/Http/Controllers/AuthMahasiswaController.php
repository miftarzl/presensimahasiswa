<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceDetail;
use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthMahasiswaController extends Controller
{
    // =========================
    // LOGIN PAGE
    // =========================
    public function login()
    {
        return view('mahasiswa.login');
    }

    
    // =========================
    // AUTH LOGIN
    // =========================
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'npm' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('student')->attempt($credentials)) {

            $request->session()->regenerate();

            $student = Auth::guard('student')->user();


            // wajib ganti password
            if (!$student->is_password_changed) {
                return redirect()
                ->route('mahasiswa.password.form');
            }

            return redirect('/mahasiswa/dashboard');
        }

        return back()->with('error', 'NPM atau Password salah');
    }

    // =========================
    // FORM UBAH PASSWORD
    // =========================
    public function formUbahPassword()
    {
        return view('mahasiswa.ubah_password');
    }

    // =========================
    // PROSES UBAH PASSWORD
    // =========================
    public function ubahPassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed'
        ]);
        
        /** @var Student $student */
        $student = Auth::guard('student')->user();

        if (!Hash::check($request->password_lama, $student->password)) {
            return back()->with('error', 'Password lama salah');
        }

        $student->password = Hash::make($request->password_baru);

        // sudah ganti password
        $student->is_password_changed = true;

        $student->save();

        return redirect('/mahasiswa/dashboard')
            ->with('success', 'Password berhasil diubah');
    }

    // =========================
    // DASHBOARD MAHASISWA
    // =========================
public function dashboard()
{
    $student = Auth::guard('student')->user();

    if (!$student->is_password_changed) {
        return redirect()->route('mahasiswa.password.form');
    }

    $classes = $student->classes;

    $now = Carbon::now();

    $presensiAktif = Attendance::with('kelas')
        ->whereIn('class_id', $classes->pluck('id'))
        ->whereDate('tanggal', $now->toDateString())
        ->orderBy('start_time')
        ->get();

    foreach ($presensiAktif as $presensi) {

        $presensi->sudah_presensi = AttendanceDetail::where(
                'attendance_id',
                $presensi->id
            )
            ->where(
                'student_id',
                $student->id
            )
            ->where(
                'status',
                'hadir'
            )
            ->exists();

        if ($presensi->sudah_presensi) {

            $presensi->status_presensi = 'sudah';

        } elseif ($now->lt(Carbon::parse($presensi->start_time))) {

            $presensi->status_presensi = 'belum_dibuka';

        } elseif ($now->gt(Carbon::parse($presensi->end_time))) {

            $presensi->status_presensi = 'ditutup';

        } else {

            $presensi->status_presensi = 'aktif';

        }
    }

    $riwayatPresensi = AttendanceDetail::with('attendance.kelas')
        ->where('student_id', $student->id)
        ->latest()
        ->get();

    return view(
        'mahasiswa.dashboard',
        compact(
            'student',
            'classes',
            'presensiAktif',
            'riwayatPresensi'
        )
    );
}

public function riwayatPresensi()
{
    $student = Auth::guard('student')->user();

    $riwayatPresensi = Attendance::with('kelas')
        ->whereIn(
            'class_id',
            $student->classes->pluck('id')
        )
        ->latest()
        ->get();

    foreach ($riwayatPresensi as $presensi) {

        $detail = AttendanceDetail::where(
            'attendance_id',
            $presensi->id
        )
        ->where(
            'student_id',
            $student->id
        )
        ->first();

        $presensi->status_mahasiswa =
            $detail
                ? $detail->status
                : 'tidak_hadir';
    }
    
    return view(
        'mahasiswa.riwayat',
        compact(
            'student',
            'riwayatPresensi'
        )
    );
}

public function presensiOnline($id)
{
    $attendance = Attendance::with('kelas')->findOrFail($id);

    $now = Carbon::now();

    if (
        $now < $attendance->start_time ||
        $now > $attendance->end_time
    ) {
        return redirect()
            ->route('mahasiswa.dashboard')
            ->with(
                'error',
                'Presensi belum dibuka atau sudah ditutup'
            );
    }

    return view(
        'mahasiswa.presensi_online',
        compact('attendance')
    );
}

public function storePresensiOnline(Request $request)
{

    $request->validate([
    'attendance_id' => 'required|exists:attendances,id',
    'bukti_foto'    => 'required|image|max:2048'
]);

    $student = Auth::guard('student')->user();

    $attendance = Attendance::findOrFail(
    $request->attendance_id
    );

    $path = $request->file('bukti_foto')
        ->store('bukti-presensi', 'public');

    AttendanceDetail::updateOrCreate(
    [
        'attendance_id' => $attendance->id,
        'student_id' => $student->id
    ],
    [
        'status' => 'hadir',
        'bukti_foto' => $path
    ]
);

    return redirect()
        ->route('mahasiswa.dashboard')
        ->with('success', 'Presensi berhasil');
}

public function presensi($id)
{
    $attendance = Attendance::findOrFail($id);

    $now = Carbon::now();

    if (
        $now < $attendance->start_time ||
        $now > $attendance->end_time
    ) {
        return redirect()
            ->route('mahasiswa.dashboard')
            ->with(
                'error',
                'Presensi belum dibuka atau sudah ditutup'
            );
    }

    return view(
        'mahasiswa.presensi',
        compact('attendance')
    );
}

public function checkLocation(Request $request)
{
    $attendance = Attendance::latest()->first();

    if (!$attendance) {

        return response()->json([
            'success' => false,
            'message' => 'Presensi tidak ditemukan'
        ]);
    }

    $distance = $this->haversineDistance(

        $request->lat,
        $request->lng,

        $attendance->lat,
        $attendance->lng
    );

    if ($distance <= $attendance->radius) {

       
    return response()->json([
        'success' => true,
        'distance' => round($distance, 2),
        'attendance_lat' => $attendance->lat,
        'attendance_lng' => $attendance->lng,
        'radius' => $attendance->radius
    ]);
}

    return response()->json([
    'success' => false,
    'distance' => round($distance, 2),
    'radius' => $attendance->radius,
    'attendance_lat' => $attendance->lat,
    'attendance_lng' => $attendance->lng,
    'message' => 'Anda berada di luar area presensi'
]);
}

private function haversineDistance(
    $lat1,
    $lon1,
    $lat2,
    $lon2
)
{
    $earthRadius = 6371000;

    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a =
        sin($dLat / 2) *
        sin($dLat / 2) +

        cos(deg2rad($lat1)) *
        cos(deg2rad($lat2)) *

        sin($dLon / 2) *
        sin($dLon / 2);

    $c = 2 * atan2(
        sqrt($a),
        sqrt(1 - $a)
    );

    return $earthRadius * $c;
}
    // =========================
    // LOGOUT
    // =========================
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}