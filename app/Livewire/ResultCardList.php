<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResultCard as ResultCardModel;
class ResultCardList extends Component
{
    public $cards=[];
    public $deleteId;
    public function mount($cardId=null)
    {

        $this->cards = ResultCardModel::get();
    }
    public function deleteThis($cardId)
    {
        $this->deleteId=$cardId;
    }

    public function deleteConfirm()
    {
        if($this->deleteId){

            ResultCardModel::find($this->deleteId)->delete();
            $this->cards = ResultCardModel::get();
            $this->deleteId=null;
        }
    }
    public function render()
    {
        return view('livewire.result-card-list')->layout('layouts.index');
    }
}
