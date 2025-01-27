<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Check;
use App\Models\Fee;
use App\Models\Student;

class CheckController extends Controller
{
    function index()
    {
        $studentData = Student::all();
        $feeData = Fee::all();
        return view('accountant/fee_list', ['data' => false, 'studentData' => $studentData, 'feeData' => $feeData]);
    }
    function checkFee(Request $request)
    {
        $studentId = $request->input('student_id');
        $feeMonth = $request->input('fee_month');

        $feePaid = Fee::where('student_id', $studentId)
        ->where('month', $feeMonth)
        ->sum('paid');
        return response()->json(['paid' => $feePaid, 'status' => 'success'], 200);

    }
}
