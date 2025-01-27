<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Student;
class FeeController extends Controller
{
    // function index() {
    //     $studentData=Student::all();
    //     return view('admin/fees',['data'=>false,'studentData'=>$studentData]);
    // }
    function fees_edit($feeId) {
        $studentData=Student::all();
        $feeData=Fee::find($feeId);
        return view('admin/fees',['data'=>$feeData,'studentData'=>$studentData]);
    }


    function list_fees(){
        $feeData=Fee::all();
        return view('admin/list_fees',['feeData'=>$feeData]);
    }
    function fees_delete($deleteId){
        $feeData=Fee::find($deleteId)->delete();
        flashy()->success('Fees Record has been deleted','');
        return redirect()->back();
    }

    function fees_create(Request $request){
        $valid= $request->validate([
       'Student_fee'=>'required',
       'month'=>'required',
       'paid'=>'required',
        ]);

        Fee::create([
            'Student_fee'=>$request->Student_fee,
            'month'=>$request->month,
            'paid'=>$request->paid,
        ]);
        flashy()->success('Fee Record has been created','');
        return redirect()->back();
    }
    function fees_update(Request $request){

        $valid=$request->validate([
            'Student_fee'=>'required',
            'month'=>'required',
            'paid'=>'required',
        ]);
        Fee::find($request->fees_id)->update([
            'Student_fee'=>$request->Student_fee,
            'month'=>$request->month,
            'paid'=>$request->paid,

        ]);
        flashy()->success('Fee Record has been Changed','');
        return redirect()->back();
    }
}
