<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    
    // tampil halaman
public function index()
{
    $classes = ClassModel::where(
        'dosen_id',
        Auth::guard('dosen')->id()
    )->latest()->get();

    return view('student', [
        'classes' => $classes,
        'class' => null,
        'students' => collect()
    ]);
}

    // simpan data
public function store(Request $request)
{
    // 1. Simpan Data Kelas
    $dosenId = Auth::guard('dosen')->id();

    if (!$dosenId) {
        return redirect()->back()->with('error', 'Dosen belum login!');
    }

    $class = ClassModel::create([
        'mata_kuliah' => $request->mata_kuliah,
        'kode_kelas'  => $request->kode_kelas,
        'jadwal'      => $request->jadwal,
        'semester'    => $request->semester,
        'nama_kelas'  => $request->nama_kelas,
        'dosen_id'    => $dosenId
    ]);


    // 2. Import Excel
    if ($request->hasFile('file')) {

    $data = Excel::toArray([], $request->file('file'));

    foreach ($data[0] as $key => $row) {

        if ($key < 8) continue;

        $npm  = isset($row[1]) ? trim($row[1]) : null;
        $nama = isset($row[2]) ? trim($row[2]) : null;

        if (!$npm || !is_numeric($npm) || !$nama) {
            continue;
        }

        $student = Student::firstOrCreate(
            [
                'npm' => $npm
            ],
            [
                'nama' => $nama,
                'email' => $npm.'@student.ac.id',
                'password' => Hash::make('12345678'),
                'is_password_changed' => false
            ]
        );

        $student->classes()->syncWithoutDetaching([
            $class->id
        ]);
    }
}
   

    return redirect()->route('student.index')
        ->with('success', 'Class & Student berhasil dibuat');
}
    //view 
    public function view($id)
{
    $class = ClassModel::where('id', $id)
    ->where('dosen_id', Auth::guard('dosen')->id())
    ->firstOrFail();
    

    $students = $class->students;

    return view('student', [
        'class' => $class,
        'students' => $students,
        'classes' => []
    ]);
}

    // hapus
    public function delete($id)
    {
        ClassModel::where('id', $id)
        ->where('dosen_id', Auth::guard('dosen')->id())
        ->delete();
        return redirect()->back();
    }

    // update
    public function update(Request $request, $id)
    {
        $data = ClassModel::where('id',$id)
        ->where('dosen_id',Auth::guard('dosen')->id())
        ->firstOrFail();

        $data->update([
            'mata_kuliah' => $request->mata_kuliah,
            'jadwal' => $request->jadwal,
            'kode_kelas' => $request->kode_kelas,
            'semester' => $request->semester,
        ]);

        return redirect()->back()
            ->with('success', 'Kelas berhasil diupdate');
    }
}