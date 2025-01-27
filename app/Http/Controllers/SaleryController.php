<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Teacher;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class SaleryController extends Controller
{
    public function index()
    {
        $allUSers = User::latest()->get();
        return view('admin/salery', ['data' => false, 'allUSers' => $allUSers]);
    }
    public function salery_edit($salId)
    {
        $allUSers = User::latest()->get();
        $saleryData = Salary::find($salId);
        return view('admin/salery', ['data' => $saleryData, 'allUSers' => $allUSers]);
    }

    public function list_salery()
    {
        $saleryData = Salary::latest()->get();
        return view('admin/list_salery', ['saleryData' => $saleryData]);
    }
    public function salery_delete($deleteId)
    {
        $saleryData = Salary::find($deleteId)->delete();
        flashy()->success('Salery Record has been deleted', '');
        return redirect()->back();
    }

    public function salery_create(Request $request)
    {

        $valid = $request->validate([
            'user_id' => 'required',
            'month' => 'required',
            'paid_salery' => 'required',
        ]);

        if (Salary::where('user_id', $request->user_id)->where('month', $request->month)->exists()) {
            flashy()->info('Salary Record has already  exists', '');
            return redirect()->back();
        }
        $transaction = Transaction::create([
            'debit' => $request->paid_salery,
            'credit' => 0,
            'expense_id' => $request->user_id,
            'transaction_date' => $request->month . "-01",
            'transaction_type' => 'salary',
            'transaction_from' => 'salary',
            'transaction_remarks' => "Salary has been paid to #" . $request->user_id,
        ]);

        $salary = Salary::create([
            'user_id' => $request->user_id,
            'transaction_id' => $transaction->id,
            'month' => $request->month,
            'amount' => $request->paid_salery,
        ]);

        flashy()->success('Salary Record has been created', '');
        return redirect()->back();
    }
    public function salery_update(Request $request)
    {


        $valid = $request->validate([
            'user_id' => 'required',
            'month' => 'required',
            'paid_salery' => 'required',
        ]);
        $salayCheck=Salary::where('user_id', $request->user_id)->where('month', $request->month);
        if ($salayCheck->count()>0 && $salayCheck->first()->id != $request->salery_id) {
            flashy()->info('Salary Record has already  exists', '');
            return redirect()->back();
        }
        $salary= Salary::find($request->salery_id);
        Transaction::find($salary->transaction_id)->update([
            'debit' => $request->paid_salery,
            'credit' => 0,
            'expense_id' => $request->user_id,
            'transaction_date' => $request->month . "-01",
            'transaction_type' => 'salary',
            'transaction_from' => 'salary',
            'transaction_remarks' => "Salary has been paid to #" . $request->user_id." &updated",
        ]);
       $salary->update([
            'user_id' => $request->user_id,
            'month' => $request->month,
            'amount' => $request->paid_salery,

        ]);
        flashy()->success('Salery Record has been Changed', '');
        return redirect()->back();
    }
}
