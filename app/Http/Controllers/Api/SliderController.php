<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // get Slider
    public function getSliders(Request $request)
    {
        $category = $request->category;

        $array = [
            'welcome_slider',
            'top_slider_in_home',
            'shop_gift_slider_in_home',
            'new_uploaded_bg_in_home',
            'all_category_bg_in_home',
            'top_slider_in_market',
            'recomended_product_bg_in_market',
        ];

        if(in_array($category, $array))
        {

            $data = \App\Models\AppSlider::where('status', true)
                    ->where('slider_name', $category)
                    ->get();

            return response()->json([
                'success'   => true,
                'message'   => $data->count() . " record found",
                'data'      => $data
            ], 200);
        }

        return response()->json([
                'success'   => false,
                'message'   => "Record not found",
            ], 400);

        
    }
}
