<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\AttendanceDetail;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class LaporanController extends Controller
{
    // ==========================================
    // HALAMAN LIST KELAS
    // ==========================================
    public function index()
    {
        $classes = ClassModel::where(
            'dosen_id',
            Auth::guard('dosen')->id()
        )->get();

        return view('laporan', compact('classes'));
    }


    // ==========================================
    // DETAIL LAPORAN
    // ==========================================
    public function detail($id)
    {
        $class = ClassModel::findOrFail($id);

        // Ambil mahasiswa dari relasi kelas
        $students = $class->students;

        // Total pertemuan kelas
        $totalPertemuan = Attendance::where(
            'class_id',
            $id
        )->count();

        $laporan = [];


        // ======================================
        // LOOP MAHASISWA
        // ======================================
        foreach ($students as $student) {

            // Ambil detail presensi mahasiswa
            // hanya dari kelas yang sedang dibuka
            $detailPresensi = AttendanceDetail::with('attendance')

                ->where('student_id', $student->id)

                ->whereHas('attendance', function ($q) use ($id) {

                    $q->where('class_id', $id);

                })

                ->orderBy('attendance_id')

                ->get();


            $hadir = 0;
            $tidak_hadir = 0;

            $detail = [];


            // ==================================
            // HITUNG PRESENSI
            // ==================================
            foreach ($detailPresensi as $item) {

                if ($item->status == 'hadir') {

                    $hadir++;

                } else {

                    $tidak_hadir++;

                }


                // Detail setiap pertemuan
                $detail[] = [

                    'pertemuan' =>
                        $item->attendance->pertemuan,

                    'tanggal' =>
                        $item->attendance->tanggal,

                    'status' =>
                        $item->status,

                    'foto' =>
                        $item->bukti_foto ?? null

                ];
            }


            // ==================================
            // HITUNG PERSENTASE
            // ==================================
            $persentase = $totalPertemuan > 0

                ? round(
                    ($hadir / $totalPertemuan) * 100
                )

                : 0;


            // ==================================
            // MASUKKAN KE LAPORAN
            // ==================================
            $laporan[] = [

                'nama' =>
                    $student->nama,

                'npm' =>
                    $student->npm,

                'hadir' =>
                    $hadir,

                'tidak_hadir' =>
                    $tidak_hadir,

                'persentase' =>
                    $persentase,

                'detail' =>
                    $detail

            ];
        }


        // ======================================
        // STATISTIK DASHBOARD
        // ======================================

        $totalMahasiswa = count($laporan);


        // Rata-rata kehadiran
        $rataKehadiran = $totalMahasiswa > 0

            ? round(
                collect($laporan)->avg('persentase')
            )

            : 0;


        // Mahasiswa memenuhi >= 70%
        $memenuhi = collect($laporan)

            ->where(
                'persentase',
                '>=',
                70
            )

            ->count();


        // Mahasiswa tidak memenuhi
        $tidakMemenuhi = $totalMahasiswa - $memenuhi;


        return view(
            'laporan_detail',
            compact(

                'class',

                'laporan',

                'totalPertemuan',

                'totalMahasiswa',

                'rataKehadiran',

                'memenuhi',

                'tidakMemenuhi'

            )
        );
    }


    // ==========================================
    // DOWNLOAD PDF
    // ==========================================
    public function pdf($id)
    {
        $class = ClassModel::findOrFail($id);

        // Gunakan relasi yang sama seperti detail()
        $students = $class->students;


        // Total pertemuan
        $totalPertemuan = Attendance::where(
            'class_id',
            $id
        )->count();


        $laporan = [];


        foreach ($students as $student) {


            // Hitung hadir
            $hadir = AttendanceDetail::where(
                'student_id',
                $student->id
            )

            ->where(
                'status',
                'hadir'
            )

            ->whereHas(
                'attendance',
                function ($q) use ($id) {

                    $q->where(
                        'class_id',
                        $id
                    );

                }
            )

            ->count();


            // Hitung tidak hadir
            $tidak_hadir = AttendanceDetail::where(
                'student_id',
                $student->id
            )

            ->where(
                'status',
                'tidak hadir'
            )

            ->whereHas(
                'attendance',
                function ($q) use ($id) {

                    $q->where(
                        'class_id',
                        $id
                    );

                }
            )

            ->count();


            // Persentase
            $persentase = $totalPertemuan > 0

                ? round(
                    ($hadir / $totalPertemuan) * 100
                )

                : 0;


            $laporan[] = [

                'nama' =>
                    $student->nama,

                'npm' =>
                    $student->npm,

                'hadir' =>
                    $hadir,

                'tidak_hadir' =>
                    $tidak_hadir,

                'persentase' =>
                    $persentase

            ];
        }


        // Generate PDF
        $pdf = Pdf::loadView(

            'laporan_pdf',

            compact(

                'class',

                'laporan',

                'totalPertemuan'

            )
        );


        return $pdf->download(
            'laporan-presensi.pdf'
        );
    }


    // ==========================================
    // DOWNLOAD EXCEL
    // ==========================================
    public function excel($id)
    {
        return Excel::download(

            new LaporanExport($id),

            'laporan-presensi.xlsx'

        );
    }
}