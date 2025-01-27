<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\Subject;
use App\Models\Room;
use App\Models\User;
use App\Models\Teacher;
class TimeController extends Controller
{
    function index() {
        $teacherData=User::where('role','teacher')->latest()->get();
        $classData=Room::all();
        $subjectData=Subject::all();
        return view('admin/times',['data'=>false,'teacherData'=>$teacherData,'classData'=>$classData,'subjectData'=>$subjectData]);
    }

    function time_print($printId) {
        $timeData=Time::find($printId);
        return view('admin/table',compact('timeData'));
    }

    function time_edit($timeId) {
        $teacherData=Teacher::all();
        $classData=Room::all();
        $subjectData=Subject::all();
        $timeData=Time::find($timeId);
        return view('admin/times',['data'=>$timeData,'teacherData'=>$teacherData,'classData'=>$classData,'subjectData'=>$subjectData]);
    }


    function list_times(){
        $timeData=Time::latest()->get();
        return view('admin/list_times',['timeData'=>$timeData]);
    }
    function time_delete($deleteId){
        $timeData=Time::find($deleteId)->delete();
        flashy()->success('Time table has been deleted','');
        return redirect()->back();
    }

    function time_create(Request $request){
       // return $request;
        $valid= $request->validate([
       'title'=>'required',
       'teacher'=>'required',
       'class'=>'required',
       'subject'=>'required',
       'from'=>'required',
       'to'=>'required',
        ]);

        Time::create([
            'title'=>$request->title,
            'teacher'=>json_encode($request->teacher),
            'class'=>$request->class,
            'subject'=>json_encode($request->subject),
            'from'=>json_encode($request->from),
            'to'=>json_encode($request->to),
        ]);
        flashy()->success('Time table has been created','');
        return redirect()->back();
    }
    function time_update(Request $request){

        $valid=$request->validate([
        'title'=>'required',
        'teacher'=>'required',
       'class'=>'required',
       'subject'=>'required',
       'from'=>'required',
       'to'=>'required',
        ]);
        time::find($request->times_id)->update([
            'title'=>$request->title,
            'teacher'=>json_encode($request->teacher),
            'class'=>$request->class,
            'subject'=>json_encode($request->subject),
            'from'=>json_encode($request->from),
            'to'=>json_encode($request->to),
        ]);
        flashy()->success('Time table has been updated','');
        return redirect()->route('admin.list.times');
    }
}
