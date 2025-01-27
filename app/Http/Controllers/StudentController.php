<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Room;
use App\Models\User;
class StudentController extends Controller
{
    function index() {
        $classData=Room::all();
        return view('admin/students',['data'=>false,'classData'=>$classData]);
    }
    function student_edit($studentId) {
        $classData=Room::all();
        $studentData=User::find($studentId);
        return view('admin/students',['data'=>$studentData,'classData'=>$classData]);
    }


    function list_students(){
        $studentData=User::where('role','student')->get();
        return view('admin/list_students',['studentData'=>$studentData]);
    }
    function student_delete($deleteId){
        $studentData=User::find($deleteId)->delete();
        flashy()->success('Student Record has been deleted','');
        return redirect()->back();
    }

    function student_create(Request $request){
        $valid= $request->validate([
       'name'=>'required',
       'email'=>'required',
       'phone'=>'required',
       'address'=>'required',
       'class'=>'required',
       'father_name'=>'required',
       'cnic'=>'required',
       'dob'=>'required',
       'password'=>'required',
       'guardian_name'=>'required',
       'guardian_number'=>'required',
       'section'=>'required',
       'fee_plan'=>'required',
       'gender'=>'required',
       'father_cnic'=>'required',
       'religion'=>'required',
       'nationality'=>'required',
       'domicile'=>'required',
       'blood_group'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'class'=>$request->class,
            'father_name'=>$request->father_name,
            'cnic'=>$request->cnic,
            'dob'=>$request->dob,
            'password'=>$request->password,
            'guardian_name'=>$request->guardian_name,
            'guardian_number'=>$request->guardian_number,
            'section'=>$request->section,
            'fee_plan'=>$request->fee_plan,
            'gender'=>$request->gender,
            'father_cnic'=>$request->father_cnic,
            'religion'=>$request->religion,
            'nationality'=>$request->nationality,
            'domicile'=>$request->domicile,
            'blood_group'=>$request->blood_group,
            'role'=>'student',
            'status'=>'enabled',
        ]);
        flashy()->success('Student Record has been created','');
        return redirect()->back();
    }
    function student_update(Request $request){

    $valid=$request->validate([
       'name'=>'required',
       'email'=>'required',
       'phone'=>'required',
       'address'=>'required',
       'class'=>'required',
       'father_name'=>'required',
       'cnic'=>'required',
       'dob'=>'required',
       'password'=>'required',
       'guardian_name'=>'required',
       'guardian_number'=>'required',
       'section'=>'required',
       'fee_plan'=>'required',
       'gender'=>'required',
       'father_cnic'=>'required',
       'religion'=>'required',
       'nationality'=>'required',
       'domicile'=>'required',
       'blood_group'=>'required',
        ]);
        User::find($request->students_id)->update([
           'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'class'=>$request->class,
            'father_name'=>$request->father_name,
            'cnic'=>$request->cnic,
            'dob'=>$request->dob,
            'password'=>$request->password,
            'guardian_name'=>$request->guardian_name,
            'guardian_number'=>$request->guardian_number,
            'section'=>$request->section,
            'fee_plan'=>$request->fee_plan,
            'gender'=>$request->gender,
            'father_cnic'=>$request->father_cnic,
            'religion'=>$request->religion,
            'nationality'=>$request->nationality,
            'domicile'=>$request->domicile,
            'blood_group'=>$request->blood_group,
        ]);
        flashy()->success('Student Record has been Changed','');
        return redirect()->route('admin.list.students');
    }
}
