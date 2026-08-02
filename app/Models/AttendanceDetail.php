<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceDetail extends Model
{
    protected $fillable = [
        'attendance_id',
        'student_id',
        'status',
        'bukti_foto'
    ];
 
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
public function attendance()
{
    return $this->belongsTo(
        Attendance::class,
        'attendance_id'
    );
}
}