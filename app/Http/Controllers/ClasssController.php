<?php

namespace App\Http\Controllers;

use App\Classs;
use Illuminate\Http\Request;
use App\Http\Requests\ClassValidation;
class ClasssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clas=Classs::all();
        // return view('dashboard.session',compact('sess'));
         return view('Dashboard.classes')->with('clas',$clas);
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
    public function store(ClassValidation $req)
    //public function store(Request $req)
    {
        $clas=new Classs;
        $clas->Classs=$req->classs;
        $clas->Section=$req->section;
        $clas->save();
        return response()->json($clas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function show(Classs $classs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function edit(Classs $classs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function update(ClassValidation $req, $classid)
   // public function update(Request $req, $classid)
    {
        $clas= Classs::find($classid);
        $clas->Classs = $req->classs;
        $clas->Section = $req->section;
        $clas->save();
        return response()->json($clas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classs  $classs
     * @return \Illuminate\Http\Response
     */
    public function destroy($classid)
    {
        $class=Classs::destroy($classid);
        return response()->json($class);
    }
}
