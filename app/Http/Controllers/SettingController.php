<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    function index() {
        $Setting = Setting::first();
        return view('admin/attendance/setting',compact('Setting'));
    }


    public function updateIp(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip',
            'port' => 'required|integer',

        ]);
 {
    $Setting = Setting::firstOrNew();

        $Setting->ip_address = $request->ip_address;
        $Setting->port = $request->port;

        $Setting->save();
        flashy()->success('IP has added successfully.');
        return redirect()->back()->with('success', 'IP range Added successfully.');
        }
    }
}
