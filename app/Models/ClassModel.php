<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'mata_kuliah',
        'jadwal',
        'kode_kelas',
        'semester',
        'dosen_id'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    //banyak mahasiswa
    public function students()
{
    return $this->belongsToMany(
        Student::class,
        'class_student',
        'class_id',
        'student_id'
    );
}
}