<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\SaleryController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ActivityController;

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SettingController;

use App\Livewire\DateSheet;
use App\Livewire\DateSheetList;
use App\Livewire\Expense;
use App\Livewire\ExpenseList;
use App\Livewire\ResultCard;
use App\Livewire\AttendanceRecord;
use App\Livewire\ResultCardList;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//authentication

// Route::get('/', function () {
//     return view('signup');
// });

Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('logout', function () {
    auth()->logout();

    return redirect()->route('login');
})->name('logout');

route::post('signup', [HomeController::class, 'signup'])->name('signup.auth');
route::post('login', [HomeController::class, 'login'])->name('login.auth');


route::get('/dashboard', [HomeController::class, 'dashboards'])->name('dashboard');
Route::group(['middleware' => 'admin', 'prefix' => 'admin','as'=>'admin.'], function () {


    Route::get('/expense', Expense::class)->name('expense');
    Route::get('/expense/list', ExpenseList::class)->name('expense.list');
    Route::get('report/expense', [ReportController::class, 'expense'])->name('report.expense');
    Route::get('/result/card', ResultCard::class)->name('result.card');
    Route::get('/AttendanceRecord', AttendanceRecord::class)->name('record');
    Route::get('/result/list', ResultCardList::class)->name('result.card.list');
    Route::get('/result/card/{cardId}', ResultCard::class)->name('result.edit');
    Route::get('/sheet/edit/{sheetId}', DateSheet::class)->name('sheet.edit');
    Route::get('/date/sheet', DateSheet::class)->name('date.sheet');
    Route::get('/sheet/list', DateSheetList::class)->name('date.sheet.list');

    route::get('/dashboard', [HomeController::class, 'dashboardAdmin'])->name('dashboard');
    route::get('/', [HomeController::class, 'dashboardAdmin']);
    //classes
    Route::get('classes', [RoomController::class, 'index'])->name('classes.index');
    Route::post('class/create', [RoomController::class, 'class_create'])->name('class.create');
    Route::get('class/{classId}', [RoomController::class, 'class_edit'])->name('class.edit');
    Route::post('class/delete/{deleteId}', [RoomController::class, 'class_delete'])->name('class.delete');
    Route::post('class/update', [RoomController::class, 'class_update'])->name('class.update');
    Route::get('list/classes', [RoomController::class, 'list_classes'])->name('list.classes');


    Route::get('settings', [SettingController::class, 'index'])->name('setting.attendance');
    Route::post('/settings/update-ip-range', [SettingController::class, 'updateIp'])->name('settings.updateIp');
    //Subjects
    Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::post('subject/create', [SubjectController::class, 'subject_create'])->name('subject.create');
    Route::get('subject/{subjectId}', [SubjectController::class, 'subject_edit'])->name('subject.edit');
    Route::post('subject/delete/{deleteId}', [SubjectController::class, 'subject_delete'])->name('subject.delete');
    Route::post('subject/update', [SubjectController::class, 'subject_update'])->name('subject.update');
    Route::get('list/subjects', [SubjectController::class, 'list_subjects'])->name('list.subjects');
    //Teachers
    Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
    Route::post('teacher/create', [TeacherController::class, 'teacher_create'])->name('teacher.create');
    Route::get('teacher/{teacherId}', [TeacherController::class, 'teacher_edit'])->name('teacher.edit');
    Route::post('teacher/delete/{deleteId}', [TeacherController::class, 'teacher_delete'])->name('teacher.delete');
    Route::post('teacher/update', [TeacherController::class, 'teacher_update'])->name('teacher.update');
    Route::get('list/teachers', [TeacherController::class, 'list_teachers'])->name('list.teachers');
    //Students
    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::post('student/create', [StudentController::class, 'student_create'])->name('student.create');
    Route::get('student/{studentId}', [StudentController::class, 'student_edit'])->name('student.edit');
    Route::post('student/delete/{deleteId}', [StudentController::class, 'student_delete'])->name('student.delete');
    Route::post('student/update', [StudentController::class, 'student_update'])->name('student.update');
    Route::get('list/students', [StudentController::class, 'list_students'])->name('list.students');
    //Times
    Route::get('times', [TimeController::class, 'index'])->name('time.index');
    Route::post('time/create', [TimeController::class, 'time_create'])->name('time.create');
    Route::get('time/{timeId}', [TimeController::class, 'time_edit'])->name('time.edit');
    Route::post('time/delete/{deleteId}', [TimeController::class, 'time_delete'])->name('time.delete');
    Route::post('time/update', [TimeController::class, 'time_update'])->name('time.update');
    Route::get('list/times', [TimeController::class, 'list_times'])->name('list.times');
    Route::get('table/{printId}', [TimeController::class, 'time_print'])->name('time.print');

    //users
    Route::get('users', [NewUserController::class, 'index'])->name('user.index');
    Route::post('user', [NewUserController::class, 'user_create'])->name('user.create');
    Route::get('user/{userId}', [NewUserController::class, 'user_edit'])->name('user.edit');
    Route::get('user/delete/{deleteId}', [NewUserController::class, 'user_delete'])->name('user.delete');
    Route::post('user/update', [NewUserController::class, 'user_update'])->name('user.update');
    Route::get('list/users', [NewUserController::class, 'list_users'])->name('list.users');
    //fees
    // Route::get('fees', [FeeController::class, 'index'])->name('fees.index');
    // Route::post('fees/create', [FeeController::class, 'fees_create'])->name('fees.create');
    // Route::get('fees/{feeId}', [FeeController::class, 'fees_edit'])->name('fees.edit');
    // Route::get('fees/delete/{deleteId}', [FeeController::class, 'fees_delete'])->name('fees.delete');
    // Route::post('fees/update', [FeeController::class, 'fees_update'])->name('fees.update');
    // Route::get('list/fees', [FeeController::class, 'list_fees'])->name('list.fees');
    //salery
    Route::get('salary', [SaleryController::class, 'index'])->name('salery.index');
    Route::post('salary', [SaleryController::class, 'salery_create'])->name('salery.create');
    Route::get('salary/{salId}', [SaleryController::class, 'salery_edit'])->name('salery.edit');
    Route::get('salary/delete/{deleteId}', [SaleryController::class, 'salery_delete'])->name('salery.delete');
    Route::post('salary/update', [SaleryController::class, 'salery_update'])->name('salery.update');
    Route::get('list/salary', [SaleryController::class, 'list_salery'])->name('list.salery');
    Route::get('report/salary', [ReportController::class, 'salary'])->name('report.salary');
    //activity
    Route::get('activity', [ActivityController::class, 'index'])->name('activity.index');
    Route::post('activity', [ActivityController::class, 'activityCreate'])->name('activity.create');
    Route::get('activity/{activityId}', [ActivityController::class, 'activityEdit'])->name('activity.edit');
    Route::get('activity/view/{viewId}', [ActivityController::class, 'activityView'])->name('activity.view');
    Route::post('activity/delete/{deleteId}', [ActivityController::class, 'activityDelete'])->name('activity.delete');
    Route::post('activity/update', [ActivityController::class, 'activityUpdate'])->name('activity.update');
    Route::get('list/activity', [ActivityController::class, 'listActivity'])->name('list.activity');



    // Route::get('record', [HomeController::class, 'record'])->name('record');
    Route::get('student/attendance/{attendanceId}', [HomeController::class, 'studentAttendance'])->name('student.attendance');
});


Route::group(['middleware' =>'student', 'prefix' => 'student','as'=>'student.'], function () {

    Route::get('dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');
    Route::get('list/profile', [HomeController::class, 'profile'])->name('profile.list');
    Route::get('date/sheet', [HomeController::class, 'datesheet'])->name('date.sheet');
    Route::get('result/card', [HomeController::class, 'resultCard'])->name('result.card');
    Route::get('view/sheet/{id}', [HomeController::class, 'viewSheet'])->name('sheet.view');
    Route::get('student/activity', [HomeController::class, 'listActivities'])->name('activities.list');
    Route::get('activity/view/student/{viewId}', [HomeController::class, 'activitiesView'])->name('activity.view');


});
Route::group(['middleware' =>'teacher', 'prefix' => 'teacher','as'=>'teacher.'], function () {

    Route::get('dashboard', function () {
        return view('teacher.dashboard');
    })->name('dashboard');
    route::get('teacher/dashboard', [HomeController::class, 'dashboardTeacher'])->name('dashboard');
    Route::get('list/student', [HomeController::class, 'studentList'])->name('student.list');
    Route::get('teacher/activity', [HomeController::class, 'listActivity'])->name('activities.list');
    Route::get('activity/view/{viewId}', [HomeController::class, 'activityView'])->name('activity.view');

});

Route::get('zkteco', [AttendanceController::class, 'connect'])->name('connect');

