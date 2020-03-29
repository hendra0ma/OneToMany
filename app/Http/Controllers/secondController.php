<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\DB;
use App\Task;
class secondController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$history = DB::table('tasks')->where('user_id',Auth::user()->id)->get();
    	return view('history',compact('history'));
    }
    public function calendar()
    {
           $calendar =  Task::where('user_id',Auth::user()->id)->get();
           return view('fullcalendar.calendar',compact('calendar'));
    }
    public function jsonCalendar(Request $request)
    {   if ($request->ajax()) {
        return response()->json(DB::table('tasks')->where('user_id',Auth::user()->id)->get());
    }
    return true;
        
    }
    public function mailer(Request $request)
    {
        $data = array('status' => $request->status,'kegiatan'=>$request->kegiatan,'from'=>Auth::user()->name);
        Mail::to($request->email)->send(new SendMail($data));

        return back();
    }
    public function deleteHistory($id)
    {
        DB::table('tasks')->where('id',$id)->delete();
        return back();
    }
    
}
