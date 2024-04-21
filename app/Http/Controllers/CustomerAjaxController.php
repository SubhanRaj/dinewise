<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\ProductCategory;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerAjaxController extends Controller
{
    public function customerAjax(Request $request)
    {
        if ($request->has('isset_get_product_according_to_category')) {
            $cat_id = sanitizeInput($request->cat_id);

            $sendProductData  = [];

            if ($cat_id != 'all') {
                $ProductData = ProductModel::with('category')->where('cat_id', '=', $cat_id)->get();
            } else {
                $ProductData = ProductModel::with('category')->get();
            }

            if (count($ProductData) != 0) {
                foreach ($ProductData as $single_product) {
                    $auto_product_id = $single_product->auto_product_id;
                    $product_name = $single_product->product_name;
                    $product_image = getMediaFile($single_product->product_image);
                    $product_price_arr = $single_product->price;
                    $product_price = getProductPrice($product_price_arr);

                    array_push(
                        $sendProductData,
                        [
                            'auto_product_id' => $auto_product_id,
                            'name' => $product_name,
                            'img' =>   $product_image,
                            'price' => $product_price,
                            'category' => $single_product->category->cat_name,
                        ]
                    );
                }

                return response()->json([
                    'status' => true,
                    'product' => $sendProductData,
                ]);
            } else {
                return response()->json([
                    'status' => false,
                ]);
            }
        }

        if ($request->has('isset_get_category_banner')) {
            $cat_id = sanitizeInput($request->cat_id);
            $category_data = ProductCategory::where('cat_id', '=', $cat_id)->first();
            if (!is_null($category_data)) {
                $cat_banner = json_decode($category_data->cat_banner, true);
                $banner = getMediaUrl($cat_banner[0]['file_id'], true);
            } else {
                $banner = '';
            }
            return response()->json([
                'banner' => $banner
            ]);
        }

        if ($request->has('isset_get_product_according_to_search')) {
            $search = sanitizeInput($request->search);

            $sendProductData  = [];

            $ProductData = ProductModel::with('category')->where('product_id', 'like', "%$search%")
                ->orWhere('product_name', 'like', "%$search%")
                ->get();

            if (count($ProductData) != 0) {
                foreach ($ProductData as $single_product) {
                    $auto_product_id = $single_product->auto_product_id;
                    $product_name = $single_product->product_name;
                    $product_image = getMediaFile($single_product->product_image);
                    $product_price_arr = $single_product->price;
                    $product_price = getProductPrice($product_price_arr);

                    array_push(
                        $sendProductData,
                        [
                            'auto_product_id' => $auto_product_id,
                            'name' => $product_name,
                            'img' =>   $product_image,
                            'price' => $product_price,
                            'category' => $single_product->category->cat_name,
                        ]
                    );
                }

                return response()->json([
                    'status' => true,
                    'product' => $sendProductData,
                ]);
            } else {
                return response()->json([
                    'status' => false,
                ]);
            }
        }


        if ($request->has('isset_print_bill')) {

            try {
                $order_id = $request->order_id;

                $check = Orders::where([
                    ['order_id', '=', $order_id],
                ])->count();

                if ($check != 0) {
                    $pdf = Pdf::loadView('admin.pdf-bill',  compact('order_id'));
                    $pdf->setOption(['defaultFont' => 'Courier']);
                    $fileName = time() . mt_rand(100, 10000) . '.pdf';
                    $pdf->save(public_path() . "/tempPdf/" . $fileName);
                    $pdf = url('public/tempPdf') . '/' . $fileName;
                    return response()->json([
                        'status' => true,
                        'url' => $pdf,
                        'filename' => $fileName
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'msg' => 'Order not completed'
                    ]);
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'error' => $th,
                    'msg' => 'Order not completed'
                ]);
            }
        }


        if ($request->has('isset_delete_bill')) {
            try {
                $file_name = $request->file_name;
                if (file_exists(public_path() . "/tempPdf/" . $file_name)) {
                    if (unlink(public_path() . "/tempPdf/" . $file_name)) {
                        return response()->json([
                            'status' => true,
                            'msg' => 'File unlinked'
                        ]);
                    } else {
                        return response()->json([
                            'status' => false,
                            'msg' => 'Failed to unlink'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'msg' => 'File not exists'
                    ]);
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'error' => $th,
                    'msg' => 'File not exists'
                ]);
            }
        }
    }
}
