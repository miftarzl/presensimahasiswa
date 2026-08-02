<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\AttendanceDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    public function index()
{
    $attendance = Attendance::where('dosen_id', Auth::guard('dosen')->id())
    ->latest()
    ->get();

    $classes = ClassModel::where('dosen_id', Auth::guard('dosen')->id())->get();

    return view('presensi', [
        'classes' => $classes,
        'students' => collect(),
        'attendances' => $attendance
    ]);
}

    // CREATE PRESENSI (BUAT SESI)
    public function store(Request $request)
{
      $request->validate([
        'class_id' => 'required|exists:classes,id',
        'tanggal' => 'required',
        'pertemuan' => 'required',
        'start_time' => 'required',
        'end_time' => 'required'
    ]);

    $class = ClassModel::findOrFail($request->class_id);

    $attendance = Attendance::create([

    'dosen_id' => Auth::guard('dosen')->id(),

    'class_id' => $request->class_id,

    'start_time' =>
        $request->tanggal . ' ' .
        $request->start_time . ':00',

    'end_time' =>
        $request->tanggal . ' ' .
        $request->end_time . ':00',

    'tanggal' => $request->tanggal,

    'pertemuan' => $request->pertemuan,

    'mode' => $request->mode,

    'qr_token' => uniqid(),

    'lat' => $request->lat,

    'lng' => $request->lng,

    'radius' => 30
]);

    return redirect()->route('presensi');
} 
public function detail($id)
{
    $attendance = Attendance::findOrFail($id);

    // update QR tiap 3 menit
    $now = Carbon::now();
    $lastUpdate = $attendance->updated_at;

    if ($now->diffInMinutes($lastUpdate) >= 3) {
        $attendance->update([
            'qr_token' => uniqid()
        ]);
    }

    // ambil mahasiswa sesuai kelas
    $class = ClassModel::findOrFail(
    $attendance->class_id
);

$students = $class->students;

    // buat data default = tidak hadir
    foreach ($students as $s) {

        AttendanceDetail::firstOrCreate(
            [
                'attendance_id' => $attendance->id,
                'student_id' => $s->id
            ],
            [
                'status' => 'tidak hadir'
            ]
        );
    }

    $details = AttendanceDetail::with('student')
        ->where('attendance_id', $attendance->id)
        ->get();

    return view('presensi_detail', [
        'attendance' => $attendance,
        'details' => $details
    ]);
}

public function scanQr(Request $request)
{
    $student = Auth::guard('student')->user();

    $attendance = Attendance::where(
        'qr_token',
        $request->qr_token
    )->first();

    if (!$attendance) {

        return response()->json([
            'success' => false,
            'message' => 'QR Code tidak valid'
        ]);
    }

    $detail = AttendanceDetail::where(
        'attendance_id',
        $attendance->id
    )
    ->where(
        'student_id',
        $student->id
    )
    ->first();

    if (!$detail) {

        return response()->json([
            'success' => false,
            'message' => 'Data presensi tidak ditemukan'
        ]);
    }

    if ($detail->status == 'hadir') {

        return response()->json([
            'success' => false,
            'message' => 'Anda sudah melakukan presensi'
        ]);
    }

    $detail->update([
        'status' => 'hadir'
    ]);

    return response()->json([
        'success' => true
    ]);
}

public function destroy($id)
{
    $attendance = Attendance::findOrFail($id);

    // hapus detail dulu (biar aman dari relasi)
    AttendanceDetail::where('attendance_id', $id)->delete();

    // hapus data utama
    $attendance->delete();

    return redirect()->route('presensi')->with('success', 'Data presensi berhasil dihapus');
}

    // UPDATE STATUS
    public function updateStatus(Request $request, $id)
    {
        AttendanceDetail::where('student_id', $id)
            ->where('attendance_id', $request->attendance_id)
            ->update([
                'status' => $request->status
            ]);

        return back();
    }
}