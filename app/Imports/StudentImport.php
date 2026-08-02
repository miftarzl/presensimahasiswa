<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class StudentImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {

            // skip header
            if ($index < 7) continue;

            if (!isset($row[1]) || !isset($row[2])) continue;

            $npm  = $row[1];
            $nama = $row[2];

            Student::updateOrCreate(
                ['npm' => $npm],
                [
                    'nama' => $nama,
                    'email' => $npm.'@student.ac.id',
                    'password' => Hash::make('12345678')
                ]
            );
        }
    }
}