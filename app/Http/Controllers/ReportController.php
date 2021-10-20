<?php

namespace App\Http\Controllers;

use App\Imports\MarksImport;
use App\Models\Report;
use App\Models\Students;
use App\Models\Subject;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    //

    public function subjectAdd(){

        $data['student']=Students::all();
        $data['subject']=Subject::all();
      return view('Report.create',$data);
    }

    public function store(Request $request){
        $student=$request->student_id;
        $subject = $request->subject_id;
        $a = Report::where('student_id',$student)->first();
        if (!empty($a)){
             Report::where('subject_id',$subject)->first();
            $notification = array(
                'messege' => 'Something went wrong !',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        $data= new Report;
        $data->student_id = $request->student_id;
        $data->subject_id = $request->subject_id;
        $data->total_marks = $request->total_marks;
       $save= $data->save();
        if ($save) {
            $notification = array(
                'messege' => 'Successfully Add !!!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'messege' => 'Something went wrong !',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification);
    }


    public function reportImport(){
        return view('Report.Import');
    }

    public function report(Request  $request){
        $file = $request->file('file')->store('import');
        $data= (new MarksImport)->import($file);
        if ($data) {
            $notification = array(
                'messege' => 'Successfully Excel Add !!!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'messege' => 'Something went wrong !',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        return redirect()->route('home')->with($notification);
    }



}
