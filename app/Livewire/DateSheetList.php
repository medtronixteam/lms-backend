<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DateSheet as DateSheetModel;
class DateSheetList extends Component
{
    public $cards=[];
    public $deleteId;
    public function mount($sheetId=null)
    {

        $this->cards = DateSheetModel::get();
    }
    public function deleteThis($sheetId)
    {
        $this->deleteId=$sheetId;
    }



    public function deleteConfirm()
    {
        if($this->deleteId){

            DateSheetModel::find($this->deleteId)->delete();
            $this->cards = DateSheetModel::get();
            $this->deleteId=null;
        }
    }
    public function render()
    {
        return view('livewire.date-sheet-list')->layout('layouts.index');
    }
}
