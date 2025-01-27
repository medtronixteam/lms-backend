<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class NewUserController extends Controller
{
    function index() {
       $userData=User::latest()->get();
       return view('admin/users',['data'=>false,'userData'=>$userData]);
    }
    function user_edit($usertId) {
        $userData=User::find($usertId);
        return view('admin/users',['data'=>$userData]);
    }


    function list_users(){
        $userData=User::latest()->get();
        return view('admin/list_users',['userData'=>$userData]);
    }
    function user_delete($deleteId){
        $userData=User::find($deleteId)->delete();
        flashy()->success('User has been deleted','');
        return redirect()->back();
    }
    function user_create(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        flashy()->success('User has been created', '');
        return redirect()->back();
    }

    function user_update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->users_id,
            'phone' => 'required',
            'address' => 'required',
            'role' => 'required',
            'password' => 'nullable|min:8',
        ]);

        $user = User::find($request->users_id);

        if (!$user) {
            flashy()->error('User not found', '');
            return redirect()->back();
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        flashy()->success('User record has been updated', '');
        return redirect()->route('admin.list.users');
    }
}
