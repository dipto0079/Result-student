<?php

namespace App\Imports;

use App\Models\Report;
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MarksImport implements ToModel,WithHeadingRow,SkipsOnError,WithValidation,SkipsOnFailure
{
    use Importable,SkipsFailures,SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = [];
        $obj = new Report();
        foreach($row as $key => $value){
            if ($key != 'student_id'){
                $sub = Subject::select('id')->where('subjects', ucfirst($key))->first();
                $data['total_marks'] = $value;
                $data['subject_id'] = $sub->id;
                $data['student_id'] = round($row['student_id']);
                $obj = new Report($data);
                $obj->save();


            }
        }


        return $obj;
    }
    public function rules(): array
    {
        return [
            //
        ];
    }
}
