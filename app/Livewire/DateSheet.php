<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use App\Models\Subject;
use App\Models\DateSheet as DateSheetModel;

class DateSheet extends Component
{
    public $title, $class, $student, $class_section, $sheetId;
    public $academic_year, $exam_date, $start_time, $exam_type, $exam_center;
    public $classes = [];
    public $marks = [];
    public $classSubjects = [];

    public function mount($sheetId = null)
    {
        if ($sheetId) {
            $editSheet = DateSheetModel::find($sheetId);
            $this->sheetId = $sheetId;
            $this->title = $editSheet['title'];
            $this->class = $editSheet['room_id'];
            $this->academic_year = $editSheet['academic_year'];
            $this->class_section = $editSheet['class_section'];
            $this->marks = json_decode($editSheet['subjects']);
            //dd($this->marks);
        }else{

            $this->academic_year =date('Y');
            $this->class_section='all';
        }
        $this->classes = Room::get();
    }

    public function getClass()
    {
        $this->classSubjects=Subject::where("room_id",$this->class)->get();
        $this->class = $this->class;
    }


    public function saveDateSheet()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'class' => 'required',
            'academic_year' => 'required|string|max:255',
            'class_section' => 'required|string|max:255',
            'marks.*.date' => 'required',
            'marks.*.start_time' => 'required',

        ]);

        if ($this->sheetId) {
            $dateSheet = DateSheetModel::find($this->sheetId);
            $dateSheet->update([
                'title' => $this->title,
                'room_id' => $this->class,
                'academic_year' => $this->academic_year,
                'class_section' => $this->class_section,
                'subjects' => json_encode($this->marks),
            ]);

            session()->flash('success', 'Date sheet updated successfully!');
        } else {

            DateSheetModel::create([
                'title' => $this->title,
                'room_id' => $this->class,
                'user_id' => auth()->id(),
                'academic_year' => $this->academic_year,
                'class_section' => $this->class_section,
                'subjects' => json_encode($this->marks),
            ]);

            session()->flash('success', 'Date sheet created successfully!');
        }

        $this->resetInput();
    }


    public function resetInput()
    {
        $this->title = $this->class = $this->class_section = $this->academic_year = '';
        $this->marks=[];
    }

    public function render()
    {
        return view('livewire.date-sheet')->layout('layouts.index');
    }
}
