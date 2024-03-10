<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\ReleasePayment;
use App\Models\CreatePaymentModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReleasedPaymentExport;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class ReleasePaymentController extends Controller
{
    public function releasePaymentIndex($id)
    {
        $data = CreatePaymentModel::where('id', '=', $id)->get();
        return view('admin.release-payment')->with(compact('data'));;
    }
    public function saveReleasePayment(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "paid_amount" => "required",
            "remaining_amount" => "required",
            "method" => "required",
            "date_time" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to save data',
                'redirect' => '0'
            ]);
        } else {
            $check = ReleasePayment::where('created_payment_id', '=', $id)->get();
            if (count($check) == 0) {
                $saveData  = new ReleasePayment();
                $saveData->uid = trim($request->uid);
                $saveData->created_payment_id = $id;
                $saveData->paid_amount = trim($request->paid_amount);
                $saveData->rest_amount = trim($request->remaining_amount);
                $saveData->method = trim($request->method);
                $saveData->transaction_id = trim($request->transaction_id);
                $saveData->date_time = trim($request->date_time);
                $saveStatus = $saveData->save();

                if ($saveStatus === true) {
                    $createdPayment  = CreatePaymentModel::where('id', '=', $id)->get();
                    $createdPayment[0]->status = 1;
                    $createdPayment[0]->save();

                    $mail_data = [
                        "subject" => "Digicrowd Payment",
                        "data" => $request->toArray(),
                        "path" => array(),
                        "view" => 'emails.released-payment'
                    ];

                    $getUserData = getStaffDetailsUsingUid($request->uid);
                    $email = $getUserData[0]->email;

                    Mail::to($email)->send(new SendMail($mail_data));

                    return response()->json([
                        'status' => true,
                        'errors' => '',
                        'message' => 'Data saved successfully',
                        'redirect' => '0'
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'errors' => '',
                        'message' => 'Failed to save data',
                        'redirect' => '0'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Data already saved.',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function showReleasedPayment()
    {
        return view('admin.show-released-payment');
    }
    public function getReleasePayment(Request $request)
    {
        if ($request->ajax()) {
            $data = ReleasePayment::orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route('admin.editReleasePayment', $id);
                    $profile = route('admin.staffProfile', $data->uid);
                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                        <a class='dropdown-item'
                                            href='$profile'><i
                                                class='fas fa-user text-primary'></i> Profile</a>
                                        <a class='dropdown-item'
                                            href='$edit_url'><i
                                                class='fas fa-edit text-primary'></i> Edit</a>
                                             
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('released_payment',[$id],'false','','')><i
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
                ->addColumn('profile_picture', function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        $fileArr = json_decode($staffData[0]->profile_picture, true);
                        $file = getMediaFile($fileArr[0]['file_id']);
                        return $file;
                    } else {
                        return "<span class='badge rounded-pill text-bg-danger'>Not Found</span>";
                    }
                })
                ->addColumn('name', function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        $staffData  = getStaffDetailsUsingUid($data->uid);
                        return $staffData[0]->name;
                    } else {
                        return "<span class='badge rounded-pill text-bg-danger'>Not Found</span>";
                    }
                })

                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('date_time', function ($data) {
                    return showDateTime($data->date_time);
                })

                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'name'])
                ->toJson();
        }

        return view('admin.show-released-payment');
    }

    public function editReleasePayment($id)
    {
        $data = ReleasePayment::where('id', '=', $id)->get();
        return view('admin.edit-released-payment')->with(compact('data'));
    }
    public function  updateReleasePayment(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "paid_amount" => "required",
            "remaining_amount" => "required",
            "method" => "required",
            "date_time" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to save data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  = ReleasePayment::where('id', '=', $id)->get();
            $saveData[0]->paid_amount = trim($request->paid_amount);
            $saveData[0]->rest_amount = trim($request->remaining_amount);
            $saveData[0]->method = trim($request->method);
            $saveData[0]->transaction_id = trim($request->transaction_id);
            $saveData[0]->date_time = trim($request->date_time);
            $saveStatus = $saveData[0]->save();

            if ($saveStatus === true) {

                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Data saved successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to save data',
                    'redirect' => '0'
                ]);
            }
        }
    }



    public function exportReleasePayment()
    {
        return Excel::download(new ReleasedPaymentExport(), 'payment.xlsx');
    }
}
