<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/** Models */
use App\Models\Product;
use App\Models\ProductImg;

class ProductController extends Controller
{
    //** Show gifts */
    public function showAll($section)
    {
        $rows = DB::table('products as p')
                ->join('categories as cat', 'p.category_id', 'cat.id')
                ->where('p.status', true)
                ->where('cat.item', $section)
                ->get([
                    'p.id',
                    'category_name as category',
                    'product_name',
                    'product_code',
                    'description',
                    'price',
                    'quantity',
                    'in_stock',
                ]);

        return response()->json([
            'success' => true,
            'message' => $rows->count() . " items found",
            'data'    => $rows,
        ], 201);
    }


    /** showProductImages */
    public function showProductImages(Request $request)
    {
        $key = $request->key;

        $rows = ProductImg::where('product_id', $key);

        if($rows->exists())
        {
            return response()->json([
                'success' => true,
                'message' => $rows->count() . " items found",
                'data'    => $rows->get('file_name as image'),
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => "Image not found",
        ], 404);

    }


    /** find one record */
    public function findOne(Request $request)
    {
        $key = trim($request->key);

        if(Product::find($key))
        {
            $rows = DB::table('products as p')
                    ->join('categories as cat', 'p.category_id', 'cat.id')
                    ->where('p.status', true)
                    ->where('p.id', $key)
                    ->get([
                        'p.id',
                        'category_name as category',
                        'product_name',
                        'product_id',
                        'description',
                        'price',
                        'quantity',
                        'in_stock',
                    ]);

            return response()->json([
                'success' => true,
                'message' => $rows->count() . " item found",
                'user'    => $rows,
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => "Profile does not exists",
        ], 404);
    }
}
