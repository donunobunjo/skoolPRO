<?php

namespace App\Http\Controllers;

use App\Student;
use App\Classs;
use App\State;
use Illuminate\Http\Request;
use App\Http\Requests\StudentValidation;
use App\Http\Requests\StudentUpdateValidation;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=Student::all();
        $class_list=Classs::all();
        $state_list =State::distinct()->select('State')->orderBy('State')->get();
        // return view('dashboard.session',compact('sess'));
         return view('Dashboard.students')->with('student',$student)
                                          ->with('class_list',$class_list)
                                          ->with('state_list',$state_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $req)
    public function store(StudentValidation $req)
    {
        $student=new Student;
        $student->RollNumber=$req->RollNumber;
        $student->Gender=$req->Gender;
        $student->FullName=$req->FullName;
        $student->Class=$req->Class;
        $student->State=$req->State;
        $student->Lg=$req->Lg;
        $student->Address=$req->Address;
        $student->Phone=$req->Phone;
        $student->save();
        return response()->json($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateValidation $req, $studentid)
    {
        $student= Student::find($studentid);
        $student->RollNumber = $req->RollNumber;
        $student->Gender = $req->Gender;
        $student->FullName = $req->FullName;
        $student->Gender = $req->Gender;
        $student->Class = $req->Class;
        $student->State = $req->State;
        $student->Lg = $req->Lg;
        $student->Phone = $req->Phone;
        $student->Address = $req->Address;
        $student->save();
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentid)
    {
        $student=Student::destroy($studentid);
        return response()->json($student);
    }

    function fetch(Request $req)
    {
       // return response()->json(['name'=>'Don','age'=>'12']);
        $state =$req->State;
        $lg_list = State::where('State',$state)->select('Lg')->orderBy('Lg')->get();
        return response()->json($lg_list);
    }
}
