<?php

namespace App\Http\Controllers;

use App\Exports\ReceptionExport;
use Illuminate\Http\Request;
use App\Models\ReceptionModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ReceptonController extends Controller
{
    public function addReceptionIndex()
    {
        return view('reception.add-receptions');
    }
    public function saveReception(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "year" => "required",
            "month" => "required",
            "date" => "required",
            "visitor_name" => "required",
            "phone" => "required",
            "purpose" => "required",
            "entry_time" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  = new ReceptionModel();
            $saveData->year = trim($request->year);
            $saveData->month = trim($request->month);
            $saveData->date = trim($request->date);
            $saveData->name = trim($request->visitor_name);
            $saveData->phone = trim($request->phone);
            $saveData->purpose = trim($request->purpose);
            $saveData->entry_time = trim($request->entry_time);

            $saveStatus = $saveData->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Data added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add data',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function showReceptionIndex()
    {
        return view('reception.show-reception');
    }
    public function editReceptionIndex($id)
    {
        $data = ReceptionModel::where('id', '=', $id)->get();
        return view('reception.edit-reception')->with(compact('data'));
    }
    public function updateReception(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "year" => "required",
            "month" => "required",
            "date" => "required",
            "visitor_name" => "required",
            "phone" => "required",
            "purpose" => "required",
            "entry_time" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update data',
                'redirect' => '0'
            ]);
        } else {

            if ($request->has('exit_time') && $request->exit_time != '') {
                $exit_time = $request->exit_time;
            } else {
                $exit_time = null;
            }

            $saveData  = ReceptionModel::where('id', "=", $id)->get();
            $saveData[0]->year = trim($request->year);
            $saveData[0]->month = trim($request->month);
            $saveData[0]->date = trim($request->date);
            $saveData[0]->name = trim($request->visitor_name);
            $saveData[0]->phone = trim($request->phone);
            $saveData[0]->purpose = trim($request->purpose);
            $saveData[0]->entry_time = trim($request->entry_time);
            $saveData[0]->exit_time = $exit_time;


            $saveStatus = $saveData[0]->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Data updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update data',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function getReceptionData(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('reception')->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route('reception.editReceptionIndex', $id);
                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                       
                                        <a class='dropdown-item'
                                            href='$edit_url'><i
                                                class='fas fa-edit text-primary'></i> Edit</a>
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('reception',[$id],'false','','')><i
                                                class='fas fa-trash text-danger'></i>
                                            Delete</a>
                                        
                                    </div>
                                </div>
                        ";
                    return $btn;
                })
                ->addColumn('checkbox', function ($data) {
                    $checkbox = $data->id;
                    return $checkbox;
                })


                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })

                ->editColumn('purpose', function ($data) {
                    return  "<p style='max-width:200px;' class='text-justify'>$data->purpose</p>";
                })

                ->editColumn('entry_time', function ($data) {
                    return showTime($data->entry_time);
                })
                ->editColumn('exit_time', function ($data) {
                    if (!is_null($data->exit_time)) {
                        return showTime($data->exit_time);
                    } else {
                        return '---';
                    }
                })

                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })

                ->rawColumns(['action', 'checkbox', 'created_at',   'date', 'purpose'])
                ->toJson();
        }

        return view('reception.show-reception');
    }
    public function exportReception(Request $request)
    {
        return Excel::download(new ReceptionExport($request->year, $request->month), 'Receptions-details.xlsx');
    }
}
