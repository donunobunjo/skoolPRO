<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Http\Requests\SessionValidation;

class SessionController extends Controller
{
    public function index(){
        $sess=Session::all();
       // return view('dashboard.session',compact('sess'));
        return view('Dashboard.sessions')->with('sess',$sess);
    }

    public function addSession(SessionValidation $req){
      
        $sess=new Session;
        $sess->Session=strtoupper($req->session);
        $sess->save();
        return response()->json($sess);
    }

    public function deleteSession($sessionid){
      $sesss=Session::destroy($sessionid);
      return response()->json($sesss);
    }

    public function updateSession(SessionValidation $req, $sessionid){
        //$ses=new Session;
        $ses = Session::find($sessionid);
        $ses->Session = strtoupper($req->session);
        $ses->save();
        return response()->json($ses);
    }
    
}
