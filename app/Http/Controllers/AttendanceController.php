<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use MehediJaman\LaravelZkteco\LaravelZkteco;
use Validator;

class AttendanceController extends Controller
{
   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attendance' => 'required']);
        if ($validator->fails()) {

            $messages = $validator->messages()->first();
            $response = ['message' => $messages,
                'status'               => 'error', 'code' => 500];

        } else {

            foreach (json_decode($request->attendance,true) as $record) {
                Attendance::updateOrCreate(
                    ['user_id' => $record['id'], 'attendance_timestamp' => $record['timestamp']],
                    ['type' => $record['type'] ?? null]
                );
            }
            $response = ['message' => "Data has been inserted successfully",
            'status'               => 'success', 'code' => 200];


        }
        return response($response, $response['code']);
    }

}
