<?php

namespace App\Exports;

use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\AttendanceDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $classId;

    public function __construct($classId)
    {
        $this->classId = $classId;
    }

   public function collection()
{
    $class = ClassModel::findOrFail($this->classId);

    // Ambil mahasiswa dari relasi class_student
    $students = $class->students;

    $totalPertemuan = Attendance::where(
        'class_id',
        $this->classId
    )->count();

    $data = [];

    foreach ($students as $student) {

        $hadir = AttendanceDetail::where('student_id', $student->id)
            ->where('status', 'hadir')
            ->whereHas('attendance', function ($q) {
                $q->where('class_id', $this->classId);
            })
            ->count();

        $tidak_hadir = AttendanceDetail::where('student_id', $student->id)
            ->where('status', 'tidak hadir')
            ->whereHas('attendance', function ($q) {
                $q->where('class_id', $this->classId);
            })
            ->count();

        $persentase = $totalPertemuan > 0
            ? round(($hadir / $totalPertemuan) * 100, 1)
            : 0;

        $data[] = [
            'Nama'          => $student->nama,
            'NPM'           => $student->npm,
            'Hadir'         => $hadir,
            'Tidak Hadir'   => $tidak_hadir,
            'Persentase'    => $persentase . '%',
        ];
    }

    return collect($data);
}

    public function headings(): array
    {
        return [
            'Nama',
            'NPM',
            'Hadir',
            'Tidak Hadir',
            'Persentase'
        ];
    }
}