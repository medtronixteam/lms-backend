<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salery;
use App\Models\Teacher;

class PayController extends Controller
{
    public function index()
    {
        $teacherData = Teacher::all();
        return view('accountant/salries_list', ['data' => false, 'teacherData' => $teacherData]);
    }

    public function checkSalery(Request $request)
    {
        $teacherId = $request->input('teacher_id');
        $saleryMonth = $request->input('salery_month');

        $teacher = Teacher::where('teacher_name', $teacherId)->first();
        $totalSalery = $teacher ? $this->diff_date($teacher->comeIn, date('Y-m-d')) * $teacher->salery : 0;

        $saleryPaid = Salery::where('teacherName', $teacherId)
                            ->where('month', $saleryMonth)
                            ->sum('paid_salery');

        $remaining_salery = $totalSalery - $saleryPaid;

        return response()->json([
            'total_salery' => $totalSalery,
            'paid_salery' => $saleryPaid,
            'remaining_salery' => $remaining_salery,
            'status' => 'success'
        ], 200);
    }

    public function diff_date($date1, $date2)
    {
        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        return ($year2 - $year1) * 12 + ($month2 - $month1);
    }
}
