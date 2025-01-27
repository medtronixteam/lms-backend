<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ResultCard as ResultCardModel;
use App\Models\Room;
use App\Models\Subject;
use App\Models\User;
use PDO;

class ResultCard extends Component
{
    public $title,$class,$student,$section,$cardId;
    public $classes= [];
    public $classSubjects= [];
    public $classStudents= [];
    public $studentData= [];
    public $marks = [];

    public function mount($cardId=null)
    {
        if($cardId){
            $editResult=ResultCardModel::find($cardId);
            $this->cardId=$cardId;
            $this->title=$editResult['title'];
            $this->class=$editResult['room_id'];
            $this->student=$editResult['user_id'];


        }
        $this->classes = Room::get();
    }
    public function getClass()
    {
        $this->classSubjects=Subject::where("room_id",$this->class)->get();
        if(!$this->section){

            $this->classStudents=User::where("class",$this->class)->get();
        }else{
            $this->classStudents=User::where("section",$this->section)->where("class",$this->class)->get();
        }
         $this->class=$this->class;
       //  $this->getStudent();
    }

    public function saveResultCard()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'student' => 'required',
            'class' => 'required',
            'marks.*.obtained' => 'required|integer|min:0',
            'marks.*.total' => 'required',
            'marks.*.grade' => 'required',
        ]);

        $resultCard = ResultCardModel::create([
            'title' => $this->title,
            'user_id' => $this->student,
            'room_id' => $this->class,
        ]);

        foreach ($this->marks as $subjectId => $mark) {
            $resultCard->subjects()->create([
                'subject_id' => $subjectId,
                'marks_obtained' => $mark['obtained'],
                'total_marks' => $mark['total'],
                'grade' => $mark['grade'],
            ]);
        }

        session()->flash('success', 'Result card created successfully!');
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->title = $this->class = $this->section = $this->student = '';

        $this->marks = [];
    }
    public function getStudent()
    {
        $this->studentData=User::find($this->student);
    }

    public function render()
    {
        return view('livewire.result-card')->layout('layouts.index');
    }
}
