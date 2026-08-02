<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'dosen_id',
        'class_id',
        'start_time',
        'end_time',
        'tanggal',
        'pertemuan',
        'mode',
        'qr_token',
        'lat',
        'lng',
        'radius'
    ];

    public function kelas()
{
    return $this->belongsTo(ClassModel::class, 'class_id');
}
}