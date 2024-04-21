<?php

namespace App\Http\Controllers;

use App\Models\InquiryModel;
use Illuminate\Http\Request;
use App\Exports\AllInquiryExport;
use App\Exports\FollowUpInquiryExport;
use App\Exports\SuccessfullInquiryExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{
    public function addInquiryIndex()
    {
        return view('reception.add-inquiry');
    }
    public function saveInquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "year" => "required",
            "month" => "required",
            "date" => "required",
            "source" => "required",
            "client_name" => "required",
            "phone" => "required",
            "requirement" => "required",
            "business" => "required",
        ]);
 

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  = new InquiryModel();
            $saveData->year = trim($request->year);
            $saveData->month = trim($request->month);
            $saveData->date = trim($request->date);
            $saveData->source = trim($request->source);
            $saveData->client_name = trim($request->client_name);
            $saveData->req = trim($request->requirement);
            $saveData->email = trim($request->email);
            $saveData->phone = trim($request->phone);
            $saveData->whatsapp = trim($request->whatsapp_number);
            $saveData->address = trim($request->address);
            $saveData->business = trim($request->business);
            $saveData->website = trim($request->website_url);


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
    public function editInquiryIndex($id)
    {
        $data = InquiryModel::where('id', '=', $id)->get();
        return view('reception.edit-inquiry')->with(compact('data'));
    }
    public function updateInquiry(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "year" => "required",
            "month" => "required",
            "date" => "required",
            "source" => "required",
            "client_name" => "required",
            "phone" => "required",
            "requirement" => "required",
            "business" => "required",
        ]);





        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  =  InquiryModel::where('id', '=', $id)->get();
            $saveData[0]->year = trim($request->year);
            $saveData[0]->month = trim($request->month);
            $saveData[0]->date = trim($request->date);
            $saveData[0]->source = trim($request->source);
            $saveData[0]->client_name = trim($request->client_name);
            $saveData[0]->req = trim($request->requirement);
            $saveData[0]->email = trim($request->email);
            $saveData[0]->phone = trim($request->phone);
            $saveData[0]->whatsapp = trim($request->whatsapp_number);
            $saveData[0]->address = trim($request->address);
            $saveData[0]->business = trim($request->business);
            $saveData[0]->website = trim($request->website_url);


            $saveStatus = $saveData[0]->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Data update successfully',
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
    public function showInquiry()
    {
        return view('reception.show-enquiry');
    }

    public function getInquiryData(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('inquiry')->where('status', '=', null)->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route('reception.editInquiryIndex', $id);
                    $followUp = route('reception.followUpInquiryIndex', $id);
                    $successfullInquiry = route('reception.successfullInquiryIndex', $id);
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
                                            onclick=single_deleteConfirm('inquiry',[$id],'false','','')><i
                                                class='fas fa-trash text-danger'></i>
                                            Delete</a>
                                        <a class='dropdown-item' href='$followUp'><i class='fas fa-arrow-right text-primary'></i> Move Into Follow Up</a>
 
                                        <a class='dropdown-item' href='$successfullInquiry'><i class='fas fa-arrow-right text-primary'></i> Move Into Successfull</a>
 
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
                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })
                ->editColumn('website', function ($data) {
                    if (!is_null($data->website) && $data->website != '') {
                        return "<a href='$data->website' target='blank'><i class='fas fa-link'></i></a>";
                    } else {
                        return '';
                    }
                })

                ->rawColumns(['action', 'checkbox', 'created_at', 'date', 'website'])
                ->toJson();
        }

        return view('reception.show-enquiry');
    }

    public function exportInquiryData(Request $request)
    {
        return Excel::download(new AllInquiryExport($request->year, $request->month), 'all-inquiry-details.xlsx');
    }


    // =================   Follow Up Inquiry Start =================



    public function followUpInquiryIndex($id)
    {
        $data = InquiryModel::where('id', '=', $id)->get();
        return view('reception.move-into-follow-up')->with(compact('data'));
    }


    public function saveFollowUpInquiry(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "follow_up_date" => "required",

        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update inquiry',
                'redirect' => '0'
            ]);
        } else {

            $saveData  =  InquiryModel::where('id', '=', $id)->get();

            $saveData[0]->status = "FOLLOWUP";
            $saveData[0]->follow_up_date = trim($request->follow_up_date);


            $saveStatus = $saveData[0]->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Inquiry updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update inquiry',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function  showFollowUpInquiry()
    {
        return view('reception.follow-up-inquiry');
    }
    public function getFollowUpInquiryData(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('inquiry')->where('status', '=', 'FOLLOWUP')->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;

                    $followUp = route('reception.followUpInquiryIndex', $id);
                    $edit_url = route('reception.editInquiryIndex', $id);
                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                        <a class='dropdown-item'
                                            href='$edit_url'>
                                            <i class='fas fa-edit text-primary'></i> Edit Inqiury</a>                            
                                        <a class='dropdown-item'
                                            href='$followUp'>
                                            <i class='fas fa-edit text-primary'></i> Edit Follow Up Details</a>                            
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
                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })
                ->editColumn('follow_up_date', function ($data) {
                    $currentDate = date('Y-m-d');
                    $follow_up_date = $data->follow_up_date;
                    $date_dif = dateDifference($currentDate, $follow_up_date);
                    if ($date_dif >= 0 && $date_dif <= 5) {
                        return "<span class='badge rounded-pill text-bg-warning'>" . showDate($data->follow_up_date) . "</span>";
                    } elseif ($date_dif < 0) {
                        return "<span class='badge rounded-pill text-bg-danger'>" . showDate($data->follow_up_date) . "</span>";
                    } else {
                        return showDate($data->follow_up_date);
                    }
                })
                ->editColumn('website', function ($data) {

                    if (!is_null($data->website) && $data->website != '') {
                        return "<a href='$data->website'><i class='fas fa-link'></i></a>";
                    } else {
                        return '';
                    }
                })

                ->rawColumns(['action', 'checkbox', 'created_at', 'date', 'website', 'follow_up_date'])
                ->toJson();
        }

        return view('reception.follow-up-inquiry');
    }

    public function removeFollowUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input' => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => '',
                'message' => 'Failed to remove data from follow up',
                'redirect' => '#'
            ]);
        } else {
            $n = 0;
            foreach ($request->input as $id) {
                $saveData  =  InquiryModel::where('id', '=', $id)->get();
                $saveData[0]->status = null;
                $saveData[0]->follow_up_date = null;


                $saveStatus = $saveData[0]->save();
                if ($saveStatus === true) {
                    $n++;
                }
            }


            if ($n != 0) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Data removed from follow up successfully',
                    'redirect' => route('reception.showFollowUpInquiry')
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to remove data from follow up',
                    'redirect' => '#'
                ]);
            }
        }
    }
    public function exportFollowUpInquiryData()
    {
        return Excel::download(new FollowUpInquiryExport(), 'follow-up-inquiry.xlsx');
    }

    // =================   Follow Up Inquiry End =================

    // =================   Successfully Inquiry Start =================

    public  function successfullInquiryIndex($id)
    {
        $data = InquiryModel::where('id', '=', $id)->get();
        return view('reception.move-into-successfull-inquiry')->with(compact('data'));
    }


    public function saveSuccessfullInquiry(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "services" => "required",
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update inquiry',
                'redirect' => '0'
            ]);
        } else {

            $saveData  =  InquiryModel::where('id', '=', $id)->get();

            $saveData[0]->status = "SUCCESSFULL";
            $saveData[0]->service_taken = trim($request->services);


            $saveStatus = $saveData[0]->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Inquiry updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update inquiry',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function showSuccessfullInquiry()
    {
        return view('reception.successfull-inquiry');
    }
    public function removeSuccessfullInquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input' => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => '',
                'message' => 'Failed to remove data from successfull inquiry',
                'redirect' => '#'
            ]);
        } else {
            $n = 0;
            foreach ($request->input as $id) {
                $saveData  =  InquiryModel::where('id', '=', $id)->get();
                $saveData[0]->status = null;
                $saveData[0]->follow_up_date = null;
                $saveData[0]->service_taken = null;


                $saveStatus = $saveData[0]->save();
                if ($saveStatus === true) {
                    $n++;
                }
            }


            if ($n != 0) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Data removed from successfull inquiry',
                    'redirect' => route('reception.showSuccessfullInquiry')
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to remove data from successfull inquiry',
                    'redirect' => '#'
                ]);
            }
        }
    }

    public function getSuccessfullInquiryData(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('inquiry')->where('status', '=', 'SUCCESSFULL')->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route('reception.editInquiryIndex', $id);
                    $successfullInquiry = route('reception.successfullInquiryIndex', $id);
                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                        <a class='dropdown-item'
                                            href='$edit_url'>
                                            <i class='fas fa-edit text-primary'></i> Edit Inquiry</a>                            
                                        <a class='dropdown-item'
                                            href='$successfullInquiry'>
                                            <i class='fas fa-edit text-primary'></i> Edit Successfull Inquiry</a>                            
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
                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })

                ->editColumn('website', function ($data) {
                    if (!is_null($data->website) && $data->website != '') {
                        return "<a href='$data->website'><i class='fas fa-link'></i></a>";
                    } else {
                        return '';
                    }
                })

                ->rawColumns(['action', 'checkbox', 'created_at', 'date', 'website'])
                ->toJson();
        }

        return view('reception.successfull-inquiry');
    }
    public function exportSuccessfullInquiryData()
    {
        return Excel::download(new SuccessfullInquiryExport(), 'successfull-inquiry.xlsx');
    }
}
