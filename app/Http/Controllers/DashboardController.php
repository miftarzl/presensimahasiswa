<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceDetail;
use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Kelas yang diampu dosen
        $dosen = Auth::guard('dosen')->user();

$kelasSaya = ClassModel::where(
    'dosen_id',
    $dosen->id
)->get();

        // Total kelas dosen
        $totalKelas = $kelasSaya->count();

        // Total mahasiswa
        $totalMahasiswa = DB::table('class_student')
    ->whereIn('class_id', $kelasSaya->pluck('id'))
    ->distinct('student_id')
    ->count();

        // Presensi hadir hari ini
        $hadirHariIni = Attendance::whereDate(
            'tanggal',
            today()
        )->count();

        // Pertemuan aktif (presensi yang dibuat hari ini)
        $pertemuanAktif = Attendance::whereDate(
            'tanggal',
            today()
        )->count();

        // Presensi terbaru
       $presensiTerbaru = AttendanceDetail::with([
    'student',
    'attendance'
])
->whereHas('attendance', function ($query) use ($kelasSaya) {
    $query->whereIn(
        'class_id',
        $kelasSaya->pluck('id')
    );
})
->latest()
->take(10)
->get();
        return view('dashboard', compact(
            'totalKelas',
            'totalMahasiswa',
            'hadirHariIni',
            'pertemuanAktif',
            'kelasSaya',
            'presensiTerbaru'
        ));
    }
}