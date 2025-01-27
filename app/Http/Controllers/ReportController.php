<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Salary;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function expense(Request $request)
    {

        $month = date('Y-m');
        if ($request->query('month')) {
            $month = $request->query('month');
        }
        list($year, $monthNumber) = explode('-', $month);

        $expense = Expense::whereYear('expense_date', $year)
            ->whereMonth('expense_date', $monthNumber)
            ->get();

        return view('admin.report.expense', compact('expense','month'));
    }
    public function salary(Request $request)
    {

        $month = date('Y-m');
        if ($request->query('month')) {
            $month = $request->query('month');
        }
       // list($year, $monthNumber) = explode('-', $month);

        $salary = Salary::where('month', $month)
        
        ->get();

        return view('admin.report.salary', compact('salary','month'));
    }
}
