<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cart;

class CartController extends Controller
{
    // add to cart
    public function store(Request $request)
    {
        $data = Cart::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Cart added successfully',
            'data'    => $data,
        ], 200);
    }


    /**  ========   delete One from cart ========    */
    public function getAll(Request $request)
    {
        $userId = $request->userId;

        $rows = Cart::where(['user_id' => $userId]);

        if($rows->exists())
        {
            $data = $rows->get();

            return response()->json([
                'success' => true,
                'message' => $data->count() . ' record found',
                'data'    => $data,
            ], 200);
        }


        return response()->json([
            'success' => false,
            'message' => 'Record does not exists',
        ], 400);
    }



    /**  ========   delete One from cart ========    */
    public function destroyOne(Request $request)
    {
        $userId = $request->userId;
        $productId = $request->productId;

        $rows = Cart::where(['user_id' => $userId, 'product_id' => $productId]);

        if($rows->exists())
        {
            $rows->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cart deleted successfully',
            ], 200);
        }


        return response()->json([
            'success' => false,
            'message' => 'Record does not exists',
        ], 400);
    }



    /**  ========   delete all from cart ========    */
    public function destroyAll(Request $request)
    {
        $userId = $request->userId;

        $rows = Cart::where(['user_id' => $userId]);

        if($rows->exists())
        {
            $rows->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cart deleted successfully',
            ], 200);
        }


        return response()->json([
            'success' => false,
            'message' => 'Record does not exists',
        ], 400);
    }
}
