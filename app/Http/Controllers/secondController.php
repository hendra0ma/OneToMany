<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\DB;
use App\process;
use App\Task;
class secondController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$history = DB::table('tasks')->get()->where('user_id',Auth::user()->id);
        $process = DB::table('processes')->where('user_id',Auth::user()->id)->get();
    	return view('history',compact('history','process'));

    }
    public function tampil()
    {
        
        return view('halamanajax');
    }
    public function calendar()
    {
           $calendar =  process::all()->where('user_id',Auth::user()->id);
           return view('fullcalendar.calendar',compact('calendar'));
    }
    public function jsonCalendar()
    {
        $events =  process::all()->where('user_id',Auth::user()->id);
        return response()->json($events);
    }
    public function mailer(Request $request)
    {
        $data = array('status' => $request->status,'kegiatan'=>$request->kegiatan,'from'=>Auth::user()->name);
        Mail::to($request->email)->send(new SendMail($data));

        return redirect('/home');
    }
    
}
