<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
class ActivityController extends Controller
{

            function index() {
                return view('admin/activity',['data'=>false]);
            }
            function activityEdit($activityId) {
                $activityData=Activity::find($activityId);
                return view('admin/activity',['data'=>$activityData]);
            }
            function activityView($viewId) {
                $activityData=Activity::find($viewId);
                return view('admin/view_activity',['data'=>$activityData]);
            }


            function listActivity(){
                $activityData=Activity::all();
                return view('admin/list_activity',['activityData'=>$activityData]);
            }
            function activityDelete($deleteId){
                $activityData=Activity::find($deleteId)->delete();
                flashy()->success('Activity has been deleted','');
                return redirect()->back();
            }

            public function activityCreate(Request $request)
            {
                $validated = $request->validate([
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'activity' => 'required|string',
                    'files.*' => 'required|mimes:jpeg,png,jpg,gif,mp4',
                ]);

                $uploadedFilePaths = [];
                if ($request->hasFile('file')) {
                    foreach ($request->file('file') as $file) {
                        $filePath = $file->store('uploads', 'public');
                        $uploadedFilePaths[] = $filePath;
                    }
                }
                Activity::create([
                    'title' => $validated['title'],
                    'description' => $validated['description'],
                    'activity' => $validated['activity'],
                    'file' => json_encode($uploadedFilePaths),
                ]);

                flashy()->success('Activity has been created', '');
                return redirect()->back();
            }

            function activityUpdate(Request $request){

                $validated=$request->validate([
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'activity' => 'required|string',
                    'files.*' => 'required|mimes:jpeg,png,jpg,gif,mp4',
                ]);

                $uploadedFilePaths = [];
                if ($request->hasFile('file')) {
                    foreach ($request->file('file') as $file) {
                        $filePath = $file->store('uploads', 'public');
                        $uploadedFilePaths[] = $filePath;
                    }
                }
                Activity::find($request->activity_id)->update([
                    'title' => $validated['title'],
                    'description' => $validated['description'],
                    'activity' => $validated['activity'],
                    'file' => json_encode($uploadedFilePaths),
                ]);
                flashy()->success('Activity has been updated','');
                return redirect()->route('admin.list.activity');
            }
        }
