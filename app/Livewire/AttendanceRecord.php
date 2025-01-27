<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Subject;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
class AttendanceRecord extends Component
{
    public $record, $class, $student, $teacher;
    public $classes = [];
    public $classStudents = [];
    public $teacherData = [];
    public $attendanceData = [];
    public function mount()
    {
        $this->classes = Room::all();
        $this->teacherData = User::where('role', 'teacher')->get();
    }

    public function getClass()
    {
        $this->classStudents = User::where('class', $this->class)->get();

    }

    public function getResult()
    {
        $month = request('month');
        $query = DB::table('attendances')
        ->where('user_id', $this->student)
        ->select(
            DB::raw('DATE(attendance_timestamp) as date'),
            DB::raw('MIN(attendance_timestamp) as first_checkin'),
            DB::raw('MAX(attendance_timestamp) as last_checkin')
        )
        ->groupBy(DB::raw('DATE(attendance_timestamp)'));


        if ($this->record === 'student' && $this->student) {
            $query->where('user_id', $this->student);
        } elseif ($this->record === 'teacher' && $this->teacher) {
            $query->where('user_id', $this->teacher);
        } else {
            $this->attendanceData = [];
            return;
        }

        if ($month) {
            $date = \Carbon\Carbon::createFromFormat('Y-m', $month);
            $query->whereYear('attendance_timestamp', $date->year)
                  ->whereMonth('attendance_timestamp', $date->month);
        }

        $this->attendanceData = $query->get();
    }




    public function getStudent()
    {
        $this->studentData=User::find($this->student);
    }

    public function render()
    {
        return view('livewire.attendance-record')->layout('layouts.index');
    }
}
