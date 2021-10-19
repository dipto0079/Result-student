<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Students;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function  __invoke(){
        //===============
        $data['student'] = Report::groupBy('student_id')
            ->selectRaw('sum(total_marks) as sum, student_id')
            ->orderByRaw('SUM(total_marks) DESC')
            ->get();
//===============
//        $test=Report::groupBy('student_id')
//            ->selectRaw('sum(total_marks) as sum, student_id')
//            ->orderByRaw('SUM(total_marks) DESC')
//            ->pluck('sum','student_id');
        //dd($data);
        return view('welcome',$data);
    }






    public function singleStudent($id){

        $student=Students::where('id',$id)->first();
        $subject_id=Report::where('student_id',$id)->get();
        $data= array();
        foreach ($subject_id as $key){
            $subject =Subject::where('id',$key->subject_id)->first();
            $array=array(
                'subject_id'=>$key->subject_id,
                'subject_name'=>$subject->subjects,
                'total_marks'=>$key->total_marks,
            );
            array_push($data, $array);
        }

        return view('single',compact('student','data'));

    }
}
