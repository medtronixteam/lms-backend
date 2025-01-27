<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use MehediJaman\LaravelZkteco\LaravelZkteco;
use Validator;

use Illuminate\Support\Facades\Artisan;
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

    public function runCommand(Request $request)
    {
        try {
            // Validate the request input
            $request->validate([
                'command' => 'required|string',
                'arguments' => 'array',
            ]);

            // Get command and arguments
            $command = $request->input('command');
            $arguments = $request->input('arguments', []);

            // Run the Artisan command
            $exitCode = Artisan::call($command, $arguments);
            $output = Artisan::output();

            return response()->json([
                'status' => 'success',
                'exit_code' => $exitCode,
                'output' => $output,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
