<?php

namespace App\Livewire;

use Livewire\Component;

class StudentFee extends Component
{
    public $studentId;
    public $fee_type;
    public $total_installment=3;
    public $average_installment=0;
    public $fee=0;
    public $showModal=false;

    public function getFeeType(){

    }
    public function getInstallments(){

        $total_installment=$this->total_installment;
        $fee=$this->fee;

        $this->average_installment=$fee/$total_installment;

    }


    public function render()
    {

        return view('livewire.student-fee');
    }
}
