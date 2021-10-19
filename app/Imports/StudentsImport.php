<?php

namespace App\Imports;

use App\Models\Students;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class StudentsImport implements ToModel, WithHeadingRow,SkipsOnError,WithValidation,SkipsOnFailure
{

    use Importable,SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        return new Students([
            'student_name'=>$row['student_name'],
            'student_father'=>$row['student_father'],
            'student_mother'=>$row['student_mother'],
            'email'=>$row['email'],
        ]);
    }
    public function rules(): array{
        return [
            '*.email' => [
                'email',
                'unique:students'
            ],
        ];
    }


}
