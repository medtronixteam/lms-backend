<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use  App\Models\Expense as ExpenseModel;
use  App\Models\Transaction;
use Illuminate\Support\Facades\Storage;
class Expense extends Component
{
    use WithFileUploads;

    public $note;
    public $amount;
    public $date;
    public $image;

    protected $rules = [
        'note' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'date' => 'required|date',
        'image' => 'nullable|image|max:1024', // Max size 1MB
    ];


    public function submit()
    {
        $this->validate();


        $imagePath = $this->image ? $this->image->store('expenses', 'public') : null;

       $Expense=ExpenseModel::create([
            'note' => $this->note,
            'amount' => $this->amount,
            'expense_date' => $this->date,
            'proof' => $imagePath,
        ]);
        Transaction::create([
                'debit'=> $this->amount,
                'credit'=>0,
                'expense_id'=>$Expense->id,
                'transaction_date'=>$this->date,
                'transaction_type'=>'expense',
                'transaction_from'=>'expense',
                'transaction_remarks'=>$this->note,
        ]);

        $this->reset(['note', 'amount', 'date', 'image']);
        

        session()->flash('message', 'Expense added successfully!');
    }

    public function render()
    {
        $this->date=date('Y-m-d');
        return view('livewire.expense')->layout('layouts.index');
    }
}
