<?php

namespace App\Http\Controllers;

use App\Score;
use App\Classs;
use App\Session;
use App\Subject;
use App\Http\Requests\ScoreValidation;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_list=Classs::orderBy('Classs')->get();
        $session_list=Session::orderBy('Session')->get();
        $subject_list=Subject::orderBy('Subject')->get();
        return view('Dashboard.sco')->with('class_list',$class_list)
                                      ->with('session_list' ,$session_list)
                                      ->with('subject_list' ,$subject_list);
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
    public function store(ScoreValidation $req)
    {
        $score = new Score();
        $score->Session=$req->Session;
        $score->Term=$req->Term;
        $score->Class=$req->Class;
        $score->Subject=$req->Subject;
        $score->RollNumber=$req->RollNumber;
        $score->FullName=$req->FullName;
        $score->FirstCA=$req->FirstCA;
        $score->SecondCA=$req->SecondCA;
        $score->Exam=$req->Exam;
        $score->save();
        return response()->json($score);
       
        /*$test = array("yam","oraneg");
        return response()->json($test);*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(ScoreValidation $req, $scoreid)
    {
        $score= Score::find($scoreid);
        $score->FirstCA = $req->FirstCA;
        $score->SecondCA = $req->SecondCA;
        $score->Exam = $req->Exam;
        $score->RollNumber=$req->RollNumber;
        $score->save();
        return response()->json($score);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy($scoreid)
    {
        $score=Score::destroy($scoreid);
        return response()->json($score);

    }
    public function populate(Request $req)
    {
        //$score =Score::all();
       // $studentsInClass=Student::where('Class',$Classs)->orderBy('FullName')->get();
       $score= Score::where('Session',$req->Session)
                    ->where('Term',$req->Term)
                    ->where('Class',$req->Classs)
                    ->where('Subject',$req->Subject)
                    ->get();
        return response()->json($score);

    }
}
