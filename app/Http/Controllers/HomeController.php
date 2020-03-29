<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Task;
use App\Column;
use App\EventCalendar;
use Session;
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
        $custom = Column::where('user_id',Auth::user()->id)->orderBy('status','asc')->get();
        
        return view('custom',compact('custom','customSoft'));
        
    }


    //UNTUK CARD TASK


    public function newCard(Request $request)
    {
           Column::insert([
            'user_id' => Auth::user()->id,
           'status' => $request->input('cardName'),
           'created_at' => now()
        ]);
        return back();
    }
    public function sendEmail(Request $request)
    {
        mail($request->sendTo,'Form '.Auth::user()->name,$request->task);
        return back();
    }
    public function newTask(Request $request,$id)
    {
        Task::insert([
            'user_id' => Auth::user()->id,
           'title' => $request->input('taskName'),
           'column_id' => $id,
           'updated_at' => Carbon::now(),
           'start' => date('Y:m:d H:i:m'),
           'color'=>'#30d93e'
        ]);
        return back();
    }
    public function deleteCard($id)
    {
        
        $name = DB::table('columns')->where('id',$id)->get();
        foreach ($name as $item) {
            Session::flash('name',$item->id);
            Session::flash('message','Return this card '.$item->status.' ?');
        }
        Column::find($id)->delete();
        return back();
    }
    public function change(Request $request,$id)
    {
        DB::table('tasks')->where('id',$id)->update(['column_id'=>$request->change]);
        return back();
    }
    public function returnCard(Request $request,$id)
    {
        DB::table('columns')->where('id',$id)->update([
            'deleted_at' => $request->return
        ]);
        return back();
    }

    public function deleteCustomTask($id)
    {
        Task::find($id)->update([
            'column_id' => null
        ]);

        Task::find($id)->delete();
        return back();
    }
    public function deleteAll()
    {
            DB::table('tasks')->where('user_id',Auth::user()->id)->delete();
            return back();
    }

    //akhir dari Card Task

    //Untuk Date
    public function insertTaskCalendar(Request $request)
    {
        if ($request->ajax()) {
        $success = Task::insert([
            'user_id'=> Auth::user()->id,
            'created_at' => Carbon::now(),
            'title' => $request->input('taskName'),
           'start'=> $request->input('start'),
           'color'=>'#34cfeb'
           
        ]);
        return response()->json($success);
        }
        
    }
    public function ChangeDate(Request $request)
    {
        $process = Task::where(array('id'=>$request->id))->update([
            'start'=>$request->start,            
        ]);
        return response()->json($process);
    }

}