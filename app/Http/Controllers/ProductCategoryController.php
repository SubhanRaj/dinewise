<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{

    // product category add page 
    // product category add page 

    public function addCategoryIndex()
    {
        return view('admin.add-product-category');
    }


    // Add Product Category 
    // Add Product Category 

    public function saveCategory(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'category_name' => "required|unique:product_categories,cat_name",
            'category_image' => "required",
            'category_banner' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add product category',
                'redirect' => '0'
            ]);
        } else {
            $create = new ProductCategory();
            $create->cat_id = uid_generator();
            $create->cat_name = sanitizeInput($request->category_name);
            $create->cat_img =  $request->category_image;
            $create->cat_banner =  $request->category_banner;
            $saveStatus = $create->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Product category added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add product category',
                    'redirect' => '0'
                ]);
            }
        }
    }


    // Show Product Category 
    // Show Product Category 

    public function showCategory(Request $request)
    {
        if ($request->ajax()) {
            // $data = DB::table('product_categories')->onlyTrashed()->orderBy('id', 'desc')->get();
            $data = ProductCategory::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("admin.editCategory", $id);
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
                                            onclick=single_deleteConfirm('product_categories',[$id],'false','','')><i
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
                ->editColumn('cat_img', function ($data) {
                    if (!is_null($data->cat_img) && $data->cat_img != 'null') {
                        $img = json_decode($data->cat_img, true);
                        return getMediaFile($img[0]['file_id']);
                    } else {
                        return 'Not Found';
                    }
                })
                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->rawColumns(['action', 'checkbox', 'cat_img'])
                ->toJson();
        }

        return view('admin.view-product-category');
    }


    // Edit Product Category 
    // Edit Product Category 

    public function  editCategory($id)
    {
        $data = ProductCategory::find($id);
        return view('admin.edit-product-category')->with(compact('data'));
    }

    // Update Product Category
    // Update Product Category
    public function updateCategory(Request $request, $id)
    {

        $validator =  Validator::make($request->all(), [
            'category_name' => "required|unique:product_categories,cat_name, $id",
            'category_image' => "required",
            'category_banner' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update product category',
                'redirect' => '0'
            ]);
        } else {
            $update = ProductCategory::find($id);
            $update->cat_name = sanitizeInput($request->category_name);
            $update->cat_img =  $request->category_image;
            $update->cat_banner =  $request->category_banner;
            $saveStatus = $update->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Product category updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update product category',
                    'redirect' => '0'
                ]);
            }
        }
    }
}
