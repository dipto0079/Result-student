<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsRequest;
use App\Imports\StudentsDetailsImport;
use App\Imports\StudentsImport;
use App\Models\Report;
use App\Models\Students;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['student']=Students::all();
      return view('Students.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentsRequest $request)
    {

        $students= Students::create([
            "student_name"=>$request->get('student_name'),
            "student_father"=>$request->get('student_father'),
            "student_mother"=>$request->get('student_mother'),
            "email"=>$request->get('email'),
        ]);

        if ($students) {
            $notification = array(
                'messege' => 'Successfully Student Add !!!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'messege' => 'Something went wrong !',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('students.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ImportFile(){

        return view('Students.Import');
    }


    public function Import(Request $request){
    $data_a=$request->validate([
            'file'=> 'required|mimes:xlsx,'
        ]);
        $file = $request->file('file')->store('import');
        $data= (new StudentsImport)->import($file);
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
        return redirect()->route('students.index')->with($notification);

    }
}
