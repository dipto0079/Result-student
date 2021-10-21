<?php

namespace App\Http\Controllers;

use App\Imports\MarksImport;
use App\Models\AddClass;
use App\Models\Report;
use App\Models\Students;
use App\Models\Subject;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    //

    public function subjectAdd(){
        $data['class_name']=AddClass::all();
        $data['student']=Students::all();
        $data['subject']=Subject::all();
      return view('Report.create',$data);
    }

    public function store(Request $request){

        $a = Report::where('student_id',$request->student_id)->where('subject_id',$request->subject_id)->first();
        if (!empty($a)){
            $notification = array(
                'messege' => 'Something went wrong !',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        for($i=0; $i < count($request->except('_token'));$i++){
            $save = Report::create ([
                'student_id' => $request->subject_id[$i],
                'subject_id' => $request->marks[$i],
                'total_marks' => $request->student_id,
//                'class_id' => $request->class_id,
            ]);
        }





//        $data= new Report;
//        $data->student_id = $request->student_id;
//        $data->subject_id = $request->subject_id;
//        $data->total_marks = $request->total_marks;
//       $save= $data->save();
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

    public function selectstudent($id){
        $student = Students::where('id',$id)->pluck("student_name","id");
        return response()->json($student);
    }


}
