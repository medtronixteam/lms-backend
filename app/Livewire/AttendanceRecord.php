<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AttendanceRecord extends Component
{
    public $record, $class, $student, $teacher, $month;
    public $classes = [];
    public $classStudents = [];
    public $teacherData = [];
    public $attendanceData = [];

    public function mount()
    {
        $this->classes = Room::all();
        $this->teacherData = User::where('role', 'teacher')->get();
        $this->month = now()->format('Y-m');
    }

    public function loadClassStudents()
    {
        $this->classStudents = User::where('class', $this->class)->get();
        $this->attendanceData = [];
    }

    public function updatedRecord()
    {
        $this->attendanceData = [];
    }

    public function getResult()
    {
        $query = DB::table('attendances')
            ->select(
                DB::raw('DATE(attendance_timestamp) as date'),
                DB::raw('MIN(attendance_timestamp) as first_checkin'),
                DB::raw('MAX(attendance_timestamp) as last_checkin')
            )
            ->groupBy('date');

        if ($this->record === 'student' && $this->student) {
            $query->where('user_id', $this->student);
        } elseif ($this->record === 'teacher' && $this->teacher) {
            $query->where('user_id', $this->teacher);
        } else {
            $this->attendanceData = [];
            return;
        }

        if ($this->month) {
            $date = \Carbon\Carbon::createFromFormat('Y-m', $this->month);
            $query->whereYear('attendance_timestamp', $date->year)
                ->whereMonth('attendance_timestamp', $date->month);
        }

        $this->attendanceData = $query->get();
    }

    public function render()
    {
        return view('livewire.attendance-record')->layout('layouts.index');
    }
}
