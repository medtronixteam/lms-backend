<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Room;
class SubjectController extends Controller
{


    function index() {
        $classData=Room::all();
        return view('admin/subjects',['data'=>false,'classData'=>$classData]);
    }
    function subject_edit($subjectId) {
        $classData=Room::all();
        $subjectData=Subject::find($subjectId);
        return view('admin/subjects',['data'=>$subjectData,'classData'=>$classData]);
    }


    function list_subjects(){
        $subjectData=Subject::all();
        return view('admin/list_subjects',['subjectData'=>$subjectData]);
    }
    function subject_delete($deleteId){
        $subjectData=Subject::find($deleteId)->delete();
        flashy()->success('Subject has been deleted','');
        return redirect()->back();
    }

    function subject_create(Request $request){
        $valid= $request->validate([
       'subject_name'=>'required',
       'subject_class'=>'required',
       'subject_status'=>'required',
        ]);

        Subject::create([
            'subject_name'=>$request->subject_name,
            'room_id'=>$request->subject_class,
            'subject_status'=>$request->subject_status,
        ]);
        flashy()->success('Subject has been created','');
        return redirect()->back();
    }
    function subject_update(Request $request){

        $valid=$request->validate([
            'subject_name'=>'required',
            'subject_class'=>'required',
            'subject_status'=>'required',
        ]);
        Subject::find($request->subjects_id)->update([
            'subject_name'=>$request->subject_name,
            'subject_class'=>$request->subject_class,
            'subject_status'=>$request->subject_status,
        ]);
        flashy()->success('Subject has been updated','');
        return redirect()->route('admin.list.subjects');
    }
}
