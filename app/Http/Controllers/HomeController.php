<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Task;
use App\Tasks;
use App\process;
use App\Column;
use App\EventCalendar;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    besok libur gayn 
    */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $start = process::all()->where('user_id',Auth::user()->id)->where('status','Start');
        $process = process::all()->where('user_id',Auth::user()->id)->where('status','process');
        $forEmail = process::all()->where('user_id',Auth::user()->id);
        $finish = process::all()->where('user_id',Auth::user()->id)->where('status','finish');
        return view('home',compact('start','process','finish','forEmail'));
    }
    public function customPage()
    {
        $custom = Column::all()->where('user_id',Auth::user()->id);
        return view('custom',compact('custom'));
    }

    //UNTUK CARD TASK


    public function newCard(Request $request)
    {
        Column::insert([
            'user_id' => Auth::user()->id,
           'status' => $request->input('cardName'),
           'created_at' => now()
        ]);
        return redirect('/home/custom');
    }
    public function newTask(Request $request,$id)
    {
        Task::insert([
            'user_id' => Auth::user()->id,
           'kegiatan' => $request->input('taskName'),
           'column_id' => $id,
           'updated_at' => Carbon::now()
        ]);
        

        return redirect('/home/custom');
    }
    public function deleteCard($id)
    {
        Column::find($id)->delete();
        return redirect('/home/custom');
    }
    public function change(Request $request,$id)
    {
        DB::table('tasks')->where('id',$id)->update(['column_id'=>$request->change]);
        return back();
    }

    public function deleteCustomTask($id)
    {
        Task::find($id)->delete();
        return back();
    }

    //akhir dari Card Task



    //Untuk PROCESS TASK

    public function insertTask(Request $request)
    {
        process::insert([
            'status' => 'Start',
            'kegiatan' => $request->input('taskName'),
            'user_id'=> Auth::user()->id,
            'created_at' => Carbon::now(),
            'title' => $request->input('taskName'),
           'start'=> now(),
           'color'=>'#35de62'
           
        ]);
        return back();
    }
    public function insertTaskCalendar(Request $request)
    {
        $success = process::insert([
            
            'kegiatan' => $request->input('taskName'),
            'user_id'=> Auth::user()->id,
            'created_at' => Carbon::now(),
            'title' => $request->input('taskName'),
           'start'=> $request->input('start'),
           'color'=>'#34cfeb'
           
        ]);
        return response()->json($success);
    }

    public function deleteTask($id)
    {
        process::find($id)->delete();
        return redirect('/home');
    }
    public function process($id)
    {
        process::find($id)->update([
            
            'status'=> 'process',
            'updated_at' => Carbon::now(),
            'start'=> now(),
            'color'=>'#32a852'
           
        ]);
        return back();
    }



    public function finish($id)
    {
        process::find($id)->update([
            'color'=>'#2fed2f',
            'status'=>'finish',
            'updated_at' => Carbon::now(),
            'start'=> now(),
           'end' => now(),
           
        ]);
        return back();
    }

    public function ChangeDate(Request $request)
    {
        $process = process::where(array('id'=>$request->id))->update([
            'start'=>$request->start
        ]);
        return response()->json($process);
    }

}
