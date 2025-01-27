<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{

function show_class(){
    $classData=Room::all();
        return view('admin/subjects',['classData'=>$classData]);

}

    function index() {
        return view('admin/classes',['data'=>false]);
    }
    function class_edit($classId) {
        $classsData=Room::find($classId);
        return view('admin/classes',['data'=>$classsData]);
    }


    function list_classes(){
        $classsData=Room::all();
        return view('admin/list_classes',['classsData'=>$classsData]);
    }
    function class_delete($deleteId){
        $classsData=Room::find($deleteId)->delete();
        flashy()->success('Class has been deleted','');
        return redirect()->back();
    }

    function class_create(Request $request){
        $valid= $request->validate([
       'class_name'=>'required',
       'class_status'=>'required',
        ]);

        Room::create([
            'class_name'=>$request->class_name,
            'class_status'=>$request->class_status,
        ]);
        flashy()->success('Class has been created','');
        return redirect()->back();
    }
    function class_update(Request $request){

        $valid=$request->validate([
            'class_name'=>'required',
            'class_status'=>'required',
        ]);
        Room::find($request->class_id)->update([
            'class_name'=>$request->class_name,
            'class_status'=>$request->class_status,
        ]);
        flashy()->success('Class has been updated','');
        return redirect()->route('admin.list.classes');
    }
}
