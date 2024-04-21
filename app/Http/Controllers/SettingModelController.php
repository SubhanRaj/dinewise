<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use Illuminate\Http\Request;

class SettingModelController extends Controller
{
    public function settings()
    {
        $data = SettingModel::orderBy('id', 'asc')->get();
        return view('admin.settings', ['data' => $data]);
    }
    public function saveSettings(Request $request)
    {
        try {
            //code...
            // print_pre($request->toArray());
            $request_data = $request->toArray();
            foreach ($request_data as $key => $single_req) {

                if ($key != '_token') {
                    // check if the setting already exists or not 
                    $getSettings = SettingModel::where('name', '=', $key)->get();
                    if (count($getSettings) > 0) {
                        //  update this setting 
                        $getSettings[0]->value = $single_req;
                        $getSettings[0]->save();
                    } else {
                        //  add this setting 
                        $newSetting = new SettingModel();
                        $newSetting->name = $key;
                        $newSetting->value = $single_req;
                        $newSetting->save();
                    }
                }
            }


            return response()->json([
                'status' => true,
                'errors' => '',
                'message' => 'Setting saved.',
                'redirect' => '0'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'errors' => '',
                'message' => 'Something went wrong.',
                'redirect' => '0'
            ]);
        }
    }
}
