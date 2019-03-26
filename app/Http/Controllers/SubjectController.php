<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectValidation;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject=Subject::all();
        // return view('dashboard.session',compact('sess'));
         return view('Dashboard.subjects')->with('subject',$subject);
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
    public function store(SubjectValidation $req)
    {
        $subject=new Subject;
        $subject->Subject=$req->subject;
        $subject->Category=$req->category;
        $subject->save();
        return response()->json($subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    //public function update(ClassValidation $req, $classid)
    public function update(SubjectValidation $req, $subjectid)
    {
        $subject= Subject::find($subjectid);
        $subject->Subject = $req->subject;
        $subject->Category = $req->category;
        $subject->save();
        return response()->json($subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($subjectid)
    {
        $subject=Subject::destroy($subjectid);
        return response()->json($subject);
    }
}
