<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Booking;
use App\Models\LeaveModel;
use App\Models\MediaModel;
use App\Models\StaffModel;
use App\Models\TableModel;
use App\Models\PricingUnit;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CustomersModel;
use App\Models\ReleasePayment;
use App\Models\AttendanceModel;
use App\Models\ProductCategory;
use App\Models\ProductMaterial;
use App\Models\DefineSalaryModal;
use App\Models\CreatePaymentModel;
use Illuminate\Support\Facades\DB;
use App\Models\AdvancePaymentModel;
use App\Models\StaffAccountDetails;
use App\Models\IncrementSalaryModel;
use Yajra\DataTables\Facades\DataTables;

class TrashController extends Controller
{
    public function Trash($trash_of)
    {
        $data = [];
        if (strtolower($trash_of) == 'media-trash') {   // media trash
            $data['table'] = 'media';
            $data['column'] = 'Trash_mediaColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'product-category-trash') {  // product category trash
            $data['table'] = 'product_categories';
            $data['column'] = 'Trash_ProductCategoryColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'pricing-unit-trash') {   // pricing unit trash
            $data['table'] = 'pricing_units';
            $data['column'] = 'Trash_PricingUnitColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'all-product-trash') {  // all products trash
            $data['table'] = 'products';
            $data['column'] = 'Trash_AllProductColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'material-trash') {    // material trash
            $data['table'] = 'product_materials';
            $data['column'] = 'Trash_ProductMaterialColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'tables-trash') {     // tables trash
            $data['table'] = 'tables';
            $data['column'] = 'Trash_TablesColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'bookings-trash') {   // bookings trash
            $data['table'] = 'bookings';
            $data['column'] = 'Trash_BookingTablesColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'product-order-trash') {   // order trash
            $data['table'] = 'orders_details';
            $data['column'] = 'Trash_OrderTablesColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'customers-trash') {   // customers trash
            $data['table'] = 'customers';
            $data['column'] = 'Trash_CustomersTablesColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'staff-trash') {   // staff trash
            $data['table'] = 'staffs';
            $data['column'] = 'Trash_staffColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'show-staff-account-trash') {   // staff account details trash
            $data['table'] = 'staff_account_details';
            $data['column'] = 'Trash_staffAccountColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'incremented-trash') {   // salary increment trash
            $data['table'] = 'salary_increment';
            $data['column'] = 'Trash_staffIncrementSalaryColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'salary-details-trash') {   // define salary trash
            $data['table'] = 'define_salary';
            $data['column'] = 'Trash_staffDefineSalaryColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'advance-payment-trash') {   // advance payment trash
            $data['table'] = 'advance_payment';
            $data['column'] = 'Trash_AdvanceSalaryColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'released-trash') {   // released payment trash
            $data['table'] = 'released_payment';
            $data['column'] = 'Trash_releasedPaymentCol';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'leave-trash') {   // leaves  trash
            $data['table'] = 'leaves';
            $data['column'] = 'Trash_leaveColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'attendance-trash') {   // attendance trash
            $data['table'] = 'attendance';
            $data['column'] = 'Trash_attendanceColumn';
            return view('admin.trash')->with(compact('data'));
        } elseif (strtolower($trash_of) == 'created-payment-trash') {   // created-payment-trash trash
            $data['table'] = 'create_payment';
            $data['column'] = 'Trash_createdPaymentColumn';
            return view('admin.trash')->with(compact('data'));
        } else {
            return abort(404, 'Not Found');
        }
    }

    public function getTrashData(Request $request)
    {
        if ($request->has('trash_of')) {
            $trash_of =  $request->trash_of;
            if ($trash_of == 'media-trash') { // media trash
                if ($request->ajax()) {
                    $data = MediaModel::onlyTrashed()->orderBy('id', 'desc')->get();
                    return DataTables::of($data)->addIndexColumn()
                        ->addColumn('checkbox', function ($data) {
                            $checkbox = $data->id;
                            return $checkbox;
                        })
                        ->addColumn('img_name', function ($data) {
                            $get_extension = pathinfo('mystorage/media/' . $data->img_name, PATHINFO_EXTENSION);
                            if ($get_extension == 'pdf') {
                                $image_url = asset('admin-assets/assets/images/icons/pdf.png');
                                $url =   asset('mystorage/media/' . $data->img_name);
                            } else {
                                $image_url = asset('mystorage/media/' . $data->img_name);
                                $url =   asset('mystorage/media/' . $data->img_name);
                            }

                            $media = "<a href='$url' target='_blank'><img src='$image_url' style='height:40px'></a>";
                            return $media;
                        })
                        ->editColumn('created_at', function ($data) {
                            return showDateTime($data->created_at);
                        })
                        ->editColumn('updated_at', function ($data) {
                            return showDateTime($data->updated_at);
                        })
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->rawColumns(['checkbox', 'img_name', 'created_at'])
                        ->toJson();
                }
            } elseif ($trash_of == 'product-category-trash') { // product category trash data
                if ($request->ajax()) {
                    $data = ProductCategory::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
                    return DataTables::of($data)->addIndexColumn()
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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->rawColumns(['checkbox'])
                        ->toJson();
                }
            } elseif ($trash_of == 'pricing-unit-trash') { // pricing unit trash data
                if ($request->ajax()) {
                    $data = PricingUnit::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
                    return DataTables::of($data)->addIndexColumn()
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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->rawColumns(['checkbox'])
                        ->toJson();
                }
            } elseif ($trash_of == 'all-product-trash') { // all product trash data
                if ($request->ajax()) {
                    $data = ProductModel::onlyTrashed()->orderBy('id', 'desc')->with('category')->get();
                    return DataTables::of($data)->addIndexColumn()

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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->editColumn('cat_id', function ($data) {
                            return $data->category->cat_name;
                        })
                        ->editColumn('price', function ($data) {
                            $product_price = getProductPrice($data->price);
                            $price_str = '';
                            foreach ($product_price as $price) {
                                $price_str .= "<li class='text-start text-nowrap'><b> $price[0]</b> : $price[1]</li>";
                            }
                            return "<ul>$price_str</ul>";
                        })
                        ->editColumn('product_image', function ($data) {
                            $img_data = getMediaFile($data->product_image);

                            return $img_data;
                        })
                        ->rawColumns(['checkbox', 'cat_id', 'product_image', 'price'])
                        ->toJson();
                }
            } elseif ($trash_of == 'material-trash') { // material trash data
                if ($request->ajax()) {
                    $data = ProductMaterial::onlyTrashed()->orderBy('id', 'desc')->get();
                    return DataTables::of($data)->addIndexColumn()

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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->editColumn('status', function ($data) {
                            if ($data->status == 'instock') {
                                return "<span class='badge text-bg-success'>In Stock</span>";
                            } else {
                                return "<span class='badge text-bg-danger'>Out Of Stock</span>";
                            }
                        })
                        ->rawColumns(['checkbox', 'status'])
                        ->toJson();
                }
            } elseif ($trash_of == 'tables-trash') {
                if ($request->ajax()) {
                    $data = TableModel::onlyTrashed()->orderBy('id', 'desc')->get();
                    return DataTables::of($data)->addIndexColumn()
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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })

                        ->rawColumns(['checkbox'])
                        ->toJson();
                }
            } elseif ($trash_of == 'bookings-trash') { {
                    if ($request->ajax()) {
                        $data = Booking::onlyTrashed()->orderBy('id', 'desc')->get();
                        return DataTables::of($data)->addIndexColumn()

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
                            ->editColumn('deleted_at', function ($data) {
                                return showDateTime($data->deleted_at);
                            })
                            ->editColumn('booked_from', function ($data) {
                                return showDateTime($data->booked_from);
                            })
                            ->editColumn('booked_to', function ($data) {
                                return showDateTime($data->booked_to);
                            })
                          
                            // ->editColumn('tables', function ($data) {
                            //     return  implode(', ', json_decode($data->tables, true));
                            // })

                            ->rawColumns(['action', 'checkbox'])
                            ->toJson();
                    }
                }
            } elseif ($trash_of == 'product-order-trash') {
                if ($request->ajax()) {

                    $data = Orders::onlyTrashed()->orderBy('id', 'desc')->get();

                    return DataTables::of($data)->addIndexColumn()

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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })

                        ->editColumn('productData', function ($data) {
                            $id = $data->id;
                            return  "<a href='javascript:;' onclick=showProductData('$id') class='text-primary'>View</a>";
                        })
                        ->editColumn('customer_name', function ($data) {
                            $customer_or_booking = $data->customer_or_booking;
                            $customer_id_or_booking_id = $data->customer_id_or_booking_id;
                            $customer_data = getCustomer($customer_or_booking, $customer_id_or_booking_id);
                            return $customer_data['name'];
                        })
                        ->editColumn('customer_mobile', function ($data) {
                            $customer_or_booking = $data->customer_or_booking;
                            $customer_id_or_booking_id = $data->customer_id_or_booking_id;
                            $customer_data = getCustomer($customer_or_booking, $customer_id_or_booking_id);

                            return $customer_data['phone'];
                        })
                        ->editColumn('selectedTable', function ($data) {
                            return  implode(', ', json_decode($data->selectedTable, true));
                        })
                        ->editColumn('status', function ($data) {
                            if ($data->status == 'completed') {
                                return "<span class='badge text-bg-success font-14'>completed</span>";
                            } else {
                                return $data->status;
                            }
                        })
                        ->rawColumns(['checkbox', 'productData', 'customer_name', 'customer_mobile', 'status'])
                        ->toJson();
                }
            } elseif ($trash_of == 'customers-trash') {
                if ($request->ajax()) {

                    $data = CustomersModel::onlyTrashed()->orderBy('id', 'desc')->get();

                    return DataTables::of($data)->addIndexColumn()
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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->editColumn('doa', function ($data) {
                            return showDate($data->doa);
                        })
                        ->editColumn('dob', function ($data) {
                            return showDate($data->dob);
                        })
                        ->rawColumns(['checkbox'])
                        ->toJson();
                }
            } elseif ($trash_of == 'staff-trash') {
                if ($request->ajax()) {
                    $data = StaffModel::onlyTrashed()->orderBy('id', 'desc')->get();
                    return DataTables::of($data)->addIndexColumn()
                        ->addColumn('checkbox', function ($data) {
                            $checkbox = $data->id;
                            return $checkbox;
                        })
                        ->editColumn('profile_picture', function ($data) {
                            $fileArr = json_decode($data->profile_picture, true);
                            $file = getMediaFile($fileArr[0]['file_id']);
                            return $file;
                        })
                        ->editColumn('documents', function ($data) {
                            $img_url = asset('admin-assets/assets/images/icons/folders.png');
                            return "<img src='$img_url' class='table-documents' onclick=showDocuments('$data->uid')>";
                        })
                        ->editColumn('doj', function ($data) {
                            return showDate($data->doj);
                        })
                        ->editColumn('created_at', function ($data) {
                            return showDateTime($data->created_at);
                        })
                        ->editColumn('updated_at', function ($data) {
                            return showDateTime($data->updated_at);
                        })
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->rawColumns(['checkbox', 'profile_picture', 'documents', 'doj'])
                        ->toJson();
                }
            } elseif ($trash_of == 'show-staff-account-trash') {
                if ($request->ajax()) {
                    $data = StaffAccountDetails::onlyTrashed()->orderBy('id', 'desc')->get();

                    return DataTables::of($data)->addIndexColumn()
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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->setRowClass(function ($data) {
                            $staffData  = getStaffDetailsUsingUid($data->uid);
                            if ($staffData != false) {
                                return '';
                            } else {
                                return 'table-danger';
                            }
                        })
                        ->rawColumns(['checkbox', 'profile_picture', 'name'])
                        ->toJson();
                }
            } elseif ($trash_of == 'incremented-trash') {
                if ($request->ajax()) {
                    $data = IncrementSalaryModel::onlyTrashed()->orderBy('id', 'desc')->get();

                    return DataTables::of($data)->addIndexColumn()

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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->editColumn('amount', function ($data) {
                            return IND_num_format($data->amount);
                        })

                        ->setRowClass(function ($data) {
                            $staffData  = getStaffDetailsUsingUid($data->uid);
                            if ($staffData != false) {
                                return '';
                            } else {
                                return 'table-danger';
                            }
                        })
                        ->rawColumns(['checkbox', 'profile_picture', 'name'])
                        ->toJson();
                }
            } elseif ($trash_of == 'salary-details-trash') {
                if ($request->ajax()) {
                    $data = DefineSalaryModal::onlyTrashed()->orderBy('id', 'desc')->get();

                    return DataTables::of($data)->addIndexColumn()

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
                        ->addColumn('salary_incremented', function ($data) {
                            $incrementData  = getIncrementedSalary($data->uid);
                            if ($incrementData != false) {
                                $totalIncrement = 0;
                                foreach ($incrementData as $single_increment) {
                                    $totalIncrement = $single_increment->amount + $totalIncrement;
                                }
                                return IND_num_format($totalIncrement);
                            } else {
                                return "0";
                            }
                        })
                        ->addColumn('increment_count', function ($data) {
                            $incrementData  = getIncrementedSalary($data->uid);
                            if ($incrementData != false) {
                                return count($incrementData);
                            } else {
                                return "0";
                            }
                        })
                        ->addColumn('current_salary', function ($data) {
                            $incrementData  = getIncrementedSalary($data->uid);
                            if ($incrementData != false) {
                                $totalIncrement = 0;
                                foreach ($incrementData as $single_increment) {
                                    $totalIncrement = $single_increment->amount + $totalIncrement;
                                }
                                return IND_num_format($totalIncrement + $data->starting_salary);
                            } else {
                                return IND_num_format($data->starting_salary);
                            }
                        })
                        ->addColumn('per_day', function ($data) {
                            $incrementData  = getIncrementedSalary($data->uid);
                            if ($incrementData != false) {
                                $totalIncrement = 0;
                                foreach ($incrementData as $single_increment) {
                                    $totalIncrement = $single_increment->amount + $totalIncrement;
                                }
                                return IND_num_format(round(($totalIncrement + $data->starting_salary) / 30, 2));
                            } else {
                                return IND_num_format(round(($data->starting_salary) / 30, 2));
                            }
                        })
                        ->editColumn('created_at', function ($data) {
                            return showDateTime($data->created_at);
                        })
                        ->editColumn('updated_at', function ($data) {
                            return showDateTime($data->updated_at);
                        })
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->editColumn('starting_salary', function ($data) {
                            return IND_num_format($data->starting_salary);
                        })
                        ->setRowClass(function ($data) {
                            $staffData  = getStaffDetailsUsingUid($data->uid);
                            if ($staffData != false) {
                                return '';
                            } else {
                                return 'table-danger';
                            }
                        })
                        ->rawColumns(['checkbox', 'created_at', 'profile_picture', 'name', 'salary_incremented', 'increment_count', 'current_salary', 'per_day'])
                        ->toJson();
                }
            } elseif ($trash_of == 'advance-payment-trash') {
                if ($request->ajax()) {
                    $data = AdvancePaymentModel::onlyTrashed()->orderBy('id', 'desc')->get();

                    return DataTables::of($data)->addIndexColumn()
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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->editColumn('amount', function ($data) {
                            return IND_num_format($data->amount);
                        })
                        ->editColumn('date', function ($data) {
                            return showDate($data->date);
                        })

                        ->setRowClass(function ($data) {
                            $staffData  = getStaffDetailsUsingUid($data->uid);
                            if ($staffData != false) {
                                return '';
                            } else {
                                return 'table-danger';
                            }
                        })
                        ->rawColumns(['checkbox', 'created_at', 'profile_picture', 'name', 'date'])
                        ->toJson();
                }
            } elseif ($trash_of == 'released-trash') {
                if ($request->ajax()) {
                    $data = ReleasePayment::onlyTrashed()->orderBy('id', 'desc')->get();
                    return DataTables::of($data)->addIndexColumn()
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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
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
                        ->rawColumns(['checkbox', 'created_at', 'profile_picture', 'name'])
                        ->toJson();
                }
            } elseif ($trash_of == 'leave-trash') {
                if ($request->ajax()) {

                    $data = LeaveModel::onlyTrashed()->orderBy('id', 'desc')->get();

                    return DataTables::of($data)->addIndexColumn()

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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->editColumn('l_from', function ($data) {
                            return showDate($data->l_from);
                        })

                        ->editColumn('l_to', function ($data) {
                            return showDate($data->l_to);
                        })

                        ->editColumn('date', function ($data) {
                            return showDate($data->date);
                        })

                        ->editColumn('status', function ($data) {
                            if ($data->status == 'Approved') {
                                return "<span class='badge text-bg-success'>$data->status</span>";
                            } elseif ($data->status == 'Denied') {
                                return "<span class='badge text-bg-danger'>$data->status</span><br><p><b>Reason :</b> $data->reject_reason</p>";
                            } elseif ($data->status == 'Pending') {
                                return "<span class='badge text-bg-warning'>$data->status</span>";
                            }
                        })
                        ->setRowClass(function ($data) {
                            $staffData  = getStaffDetailsUsingUid($data->uid);
                            if ($staffData != false) {
                                return '';
                            } else {
                                return 'table-danger';
                            }
                        })
                        ->rawColumns(['checkbox', 'created_at', 'profile_picture', 'status'])
                        ->toJson();
                }
            } elseif ($trash_of == 'attendance-trash') {
                if ($request->ajax()) {
                    $data = AttendanceModel::onlyTrashed()->orderBy('id', 'desc')->get();
                    return DataTables::of($data)->addIndexColumn()

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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->editColumn('date', function ($data) {
                            return showDate($data->date);
                        })
                        ->editColumn('login', function ($data) {
                            return ($data->login == null) ? '---' : showTime($data->login);
                        })
                        ->editColumn('logout', function ($data) {
                            return ($data->logout == null) ? '---' : showTime($data->logout);
                        })
                        ->editColumn('status', function ($data) {
                            if ($data->status == 'PP') {
                                return "<span class='rounded-circle bg-success attendance-status'>PP</span>";
                            } elseif ($data->status == 'AA') {
                                return "<span class='rounded-circle bg-danger attendance-status'>AA</span>";
                            } elseif ($data->status == 'WH') {
                                return "<span class='rounded-circle bg-warning attendance-status'>WH</span>";
                            } elseif ($data->status == 'OL') {
                                return "<span class='rounded-circle bg-info attendance-status'>OL</span>";
                            }
                        })

                        ->setRowClass(function ($data) {
                            $staffData  = getStaffDetailsUsingUid($data->uid);
                            if ($staffData != false) {
                                return '';
                            } else {
                                return 'table-danger';
                            }
                        })
                        ->rawColumns(['checkbox', 'created_at', 'profile_picture', 'name', 'date', 'status'])
                        ->toJson();
                }
            } elseif ($trash_of == 'created-payment-trash') {
                if ($request->ajax()) {
                    $data = CreatePaymentModel::onlyTrashed()->orderBy('id', 'desc')->get();

                    return DataTables::of($data)->addIndexColumn()
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
                        ->editColumn('deleted_at', function ($data) {
                            return showDateTime($data->deleted_at);
                        })
                        ->editColumn('final_amount', function ($data) {
                            return IND_num_format($data->final_amount);
                        })
                        ->editColumn('deduction', function ($data) {
                            return IND_num_format($data->deduction);
                        })
                        ->editColumn('bonus', function ($data) {
                            return IND_num_format($data->bonus);
                        })
                        ->editColumn('status', function ($data) {
                            if ($data->status == '0') {
                                return "<span class='badge text-bg-warning'>Unpaid</span>";
                            } else {
                                return "<span class='badge text-bg-success'>Paid</span>";
                            }
                        })
                        ->setRowClass(function ($data) {
                            $staffData  = getStaffDetailsUsingUid($data->uid);
                            if ($staffData != false) {
                                return '';
                            } else {
                                return 'table-danger';
                            }
                        })
                        ->rawColumns(['checkbox', 'created_at', 'profile_picture', 'name', 'status'])
                        ->toJson();
                }
            }
        } else {
            return abort(404, 'Not Found');
        }
    }
}
