<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class ProductModelController extends Controller
{
    public function  addProducts()
    {
        return view('admin.add-products');
    }
    public function  saveProducts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "product_category" => ["required"],
            "product_id" => ["required", "unique:products,product_id", "max:20"],
            "product_name" => ["required", "string"],
            "product_stock" => ["required"],
            "pricing_unit" => ["required"],
            "price" => ["required"],
            "product_picture" => ["required"],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add products',
                'redirect' => '0'
            ]);
        } else {
            $price_arr = [];
            $price_val = $request->price;
            foreach ($request->pricing_unit as $key => $unit_id) {
                array_push($price_arr, [$unit_id, $price_val[$key]]);
            }

            $product_img_arr = json_decode($request->product_picture, true);
            $file_id = $product_img_arr[0]['file_id'];

            $create = new ProductModel();
            $create->auto_product_id = uid_generator();
            $create->product_id = sanitizeInput($request->product_id);
            $create->cat_id = sanitizeInput($request->product_category);
            $create->product_name = sanitizeInput($request->product_name);
            $create->product_image = $file_id;
            $create->stock = sanitizeInput($request->product_stock);
            $create->price =  json_encode($price_arr);
            $saveStatus = $create->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Product added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add product',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function  editProducts($id)
    {
        $data = ProductModel::find($id);
        return view('admin.edit-products')->with(compact('data'));
    }
    public function  updateProducts(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "product_category" => ["required"],
            "product_name" => ["required", "string"],
            "product_stock" => ["required"],
            "pricing_unit" => ["required"],
            "price" => ["required"],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update products',
                'redirect' => '0'
            ]);
        } else {
            $price_arr = [];
            $price_val = $request->price;
            foreach ($request->pricing_unit as $key => $unit_id) {
                array_push($price_arr, [$unit_id, $price_val[$key]]);
            }

            $saveData =  ProductModel::where('id', '=', "$id")->get();

            if ($request->has('product_picture') && $request->product_picture != '') {
                $product_picture = json_decode($request->product_picture, true);
                $file_id = $product_picture[0]['file_id'];
            } else {
                $file_id = $saveData[0]->product_image;
            }


            $update = ProductModel::find($id);
            $update->product_id = sanitizeInput($request->product_id);
            $update->cat_id = sanitizeInput($request->product_category);
            $update->product_name = sanitizeInput($request->product_name);
            $update->product_image = $file_id;
            $update->stock = sanitizeInput($request->product_stock);
            $update->price =  json_encode($price_arr);
            $saveStatus = $update->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Product updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update product',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function  showProducts(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductModel::orderBy('id', 'desc')->with('category')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("admin.editProducts", $id);
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
                                            onclick=single_deleteConfirm('products',[$id],'false','','')><i
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
                    $get_img_id = $data->product_image;
                    return getMediaFile($get_img_id);
                })
                ->rawColumns(['action', 'checkbox', 'cat_id', 'product_image', 'price'])
                ->toJson();
        }

        return view('admin.view-product-details');
    }
}
