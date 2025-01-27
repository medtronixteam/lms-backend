<?php

namespace App\Livewire;

use Livewire\Component;
use  App\Models\Expense as ExpenseModel;

class ExpenseList extends Component
{
   public $expenseData;
    public function render()
    {
        $this->expenseData=ExpenseModel::latest()->get();
        return view('livewire.expense-list')->layout('layouts.index');
    }
}
