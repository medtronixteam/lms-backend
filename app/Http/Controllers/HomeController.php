<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use App\Models\DateSheet;
use App\Models\ResultCard;
use App\Models\Activity;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    function dashboards()
    {
        if (auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif(auth::user()->role == 'student'){
            return redirect()->route('student.dashboard');
        } elseif(auth::user()->role == 'teacher'){
            return redirect()->route('teacher.dashboard');
        }
        return redirect()->route('accountant.dashboard');
    }
    function dashboardAdmin()
    {

        $totalStudent = User::where('role', 'student')->count();
        $totalTeacher = User::where('role', 'teacher')->count();
        return view('admin.dashboard',compact('totalStudent', 'totalTeacher'));
    }
    function dashboardTeacher()
    {

        $totalStudent = User::where('role', 'student')->count();
        $totalclasses = Room::count();
        return view('teacher.dashboard',compact('totalStudent', 'totalclasses'));
    }
    // function signup(Request $request)
    // {
    //     $valid = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required',
    //         'address' => 'required',
    //         'phone' => 'required',
    //         'age' => 'required',
    //         'role' => 'required',
    //     ]);
    //     $valid['password'] = Hash::make($request->password);
    //     $user=User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => $valid['password'],
    //         'address' => $request->address,
    //         'phone' => $request->phone,
    //         'age' => $request->age,
    //         'role' => ($request->role) ? $request->role : 'accountant',
    //     ]);
    //     Auth::login($user);
    //     flashy()->success('Account has been created');
    //     return redirect()->route('dashboard');
    // }

    function login(Request $request)
    {
        $valid = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);
        if (Auth::attempt($valid)) {
            flashy()->success('Login successfully...');
            return redirect()->route('dashboard');
        }
        return back()->with('error', 'Invalid email or Password');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
    public function profile() {
        $studentData = User::where('id', auth()->user()->id)->where('role', 'student')->first();
        return view('student/profile', ['studentData' => $studentData]);
    }
    public function datesheet() {
        $datesheet = DateSheet::where('room_id', auth()->user()->class)->get();
        return view('student/datesheet',compact('datesheet'));
    }
    public function viewSheet($id) {
        $sheet = DateSheet::find($id);

        if (!$sheet) {
            return redirect()->back()->with('error', 'Sheet not found.');
        }

        $subjects = json_decode($sheet->subjects, true);
        return view('student.viewSheet', compact('sheet', 'subjects'));
    }

    public function resultCard() {
        $result = ResultCard::where('user_id', auth()->user()->id)->get();
        return view('student/resultCard',compact('result'));
    }
    public function studentList() {
        $studentList = User::where('role', 'student')->get();
        return view('teacher/list_student',compact('studentList'));
    }

    function listActivity(){
        $activityData=Activity::all();
        return view('teacher/list_activity',['activityData'=>$activityData]);
    }
    function activityView($viewId) {
        $activityData=Activity::find($viewId);
        return view('teacher/view_activity',['data'=>$activityData]);
    }
    function listActivities(){
        $activityData=Activity::all();
        return view('student/list_activity',['activityData'=>$activityData]);
    }
    function activitiesView($viewId) {
        $activityData=Activity::find($viewId);
        return view('student/view_activity',['data'=>$activityData]);
    }
    function studentAttendance(Request $request, $attendanceId) {
        $query = DB::table('attendances')
            ->where('user_id', $attendanceId)
            ->select(
                DB::raw('DATE(attendance_timestamp) as date'),
                DB::raw('MIN(attendance_timestamp) as first_checkin'),
                DB::raw('MAX(attendance_timestamp) as last_checkin')
            );

        if ($request->has('month')) {
            $month = \Carbon\Carbon::createFromFormat('Y-m', $request->input('month'));
            $query->whereYear('attendance_timestamp', $month->year)
                  ->whereMonth('attendance_timestamp', $month->month);
        } else {
            $query->whereYear('attendance_timestamp', now()->year)
                  ->whereMonth('attendance_timestamp', now()->month);
        }

        $AttendanceData = $query->groupBy('date')->get();

        return view('admin.attendance.attendance_view', compact('AttendanceData'));
    }
//   public function record() {
//         return view('livewire/attendance-record');
//     }

}


