<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClassRequest;
use App\Models\AddClass;
use App\Models\AllClass;
use App\Models\Students;
use Illuminate\Http\Request;

class AddClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['Class'] = AddClass::all();
        return view('AddClass.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddClassRequest $request)
    {
        $class = AddClass::create([
            "class_name" => $request->get('class_name'),
        ]);
        if ($class) {
            $notification = array(
                'messege' => 'Successfully Class Add !!!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'messege' => 'Something went wrong !',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification);
        // return redirect()->route('subject.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function classToStudent()
    {
        $data['student'] = Students::all();
        $data['class'] = AddClass::all();
        return view('AddClass.StudentToClass', $data);
    }

    public function classStudent(Request $request)
    {
        $data = new AllClass;
        $data->student_id = $request->student_id;
        $data->class_id = $request->class_id;
        $save = $data->save();
        if ($save) {
            $notification = array(
                'messege' => 'Successfully Class Add !!!',
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

    public function singleClass($id)
    {

        $student_id = AllClass::where('class_id', $id)->get();
        $student_all = array();
        foreach ($student_id as $single) {
            $student = Students::where('id', $single->student_id)->get();
            $array = array(
                'student_id' => $single->student_id,
                'student_name' => $student,
            );
            array_push($student_all, $array);
        }
        //dd($student_all);
        return view('AddClass.classTostudent', compact('student_all'));
    }


}
