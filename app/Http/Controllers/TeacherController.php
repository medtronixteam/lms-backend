<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
class TeacherController extends Controller
{
    function index() {
        return view('admin/teachers',['data'=>false]);
    }
    function teacher_edit($teacherId) {
        $teacherData=User::find($teacherId);
        return view('admin/teachers',['data'=>$teacherData]);
    }


    function list_teachers(){
        $teacherData=User::where('role','teacher')->get();
        return view('admin/list_teachers',['teacherData'=>$teacherData]);
    }
    function teacher_delete($deleteId){
        $teacherData=User::find($deleteId)->delete();
        flashy()->success('Teacher Record has been deleted','');
        return redirect()->back();
    }

    function teacher_create(Request $request){
        $valid= $request->validate([
       'name'=>'required',
       'email'=>'required',
       'phone'=>'required',
       'qualification'=>'required',
       'address'=>'required',
       'status'=>'required',
    //    'salery'=>'required',
    //    'comeIn'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'status'=>$request->status,
            'role'=>'teacher',
            // 'salery'=>$request->salery,
            // 'comeIn'=>$request->comeIn,
        ]);
        flashy()->success('Teacher Record has been created','');
        return redirect()->back();
    }
    function teacher_update(Request $request){

        $valid=$request->validate([
            'teacher_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'qualification'=>'required',
            'address'=>'required',
            'teacher_status'=>'required',
            // 'salery'=>'required',
            // 'comeIn'=>'required',
        ]);
        User::find($request->teachers_id)->update([
            'teacher_name'=>$request->teacher_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            // 'salery'=>$request->salery,
            // 'comeIn'=>$request->comeIn,
        ]);
        flashy()->success('Teacher Record has been Changed','');
        return redirect()->route('admin.list.teachers');
    }
}
