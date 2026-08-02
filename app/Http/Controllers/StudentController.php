<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;

class StudentController extends Controller
{

public function index(Request $request, $id = null)
{
    $class = ClassModel::find($id);

    $students = collect();

    if ($class) {
        $students = $class->students;
    }

    $classes = ClassModel::all();

    return view(
        'student',
        compact('students','class','classes')
    );
}

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $student->update([
        'nama' => $request->nama,
        'npm'  => $request->npm,
    ]);

    return redirect()->back()->with('success', 'Data berhasil diupdate');
}

public function resetPassword($id)
{
    $student = Student::findOrFail($id);

    $student->password = Hash::make('12345678');

    $student->is_password_changed = false;

    $student->save();

    return back()->with(
        'success',
        'Password mahasiswa berhasil direset'
    );
}

public function delete($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return back()->with('success', 'Mahasiswa berhasil dihapus');
}

public function toggle($id)
{
    $student = Student::findOrFail($id);

    $student->status = $student->status == 'aktif' ? 'tidak' : 'aktif';
    $student->save();

    return back();
}


    // IMPORT EXCEL STUDENT
    
    public function import(Request $request, $id)
    {
         $request->validate([

        'file' => 'required|mimes:xlsx,xls'
         ]);
        $file = $request->file('file');

        $data = Excel::toArray([], $file);

foreach ($data[0] as $key => $row) {

    // skip header (baris 1 - 8)
    if ($key < 8) continue;

    
    if (!isset($row[1]) || !isset($row[2])) continue;

    // ambil data
    $npm = trim($row[1]);
    $nama = trim($row[2]);

    // skip kalau kosong
    if ($npm == '' || $nama == '') continue;

    // skip kalau bukan angka (biar ":" atau teks tidak masuk)
    if (!is_numeric($npm)) continue;

    // CEK DUPLIKAT
    if (Student::where('npm', $npm)->exists()) continue;

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

$student->classes()->syncWithoutDetaching([$id]);
}
}
public function addStudent(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'npm' => 'required|numeric'
    ]);

   $student = Student::firstOrCreate(
[
    'npm' => $request->npm
],
[
    'nama' => $request->nama,
    'email' => $request->npm.'@student.ac.id',
    'password' => Hash::make('12345678'),
    'status' => 'aktif'
]
);

$student->classes()->syncWithoutDetaching([$id]);

        return back()->with('success','Student Imported!', 'Mahasiswa berhasil ditambahkan');
    }
}