<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AppSlider;

class SliderController extends Controller
{
    /** show products */
    public function showList()
    {
        /**
         * 
         * =====  Slider category List  =====
         * 
         * welcome_slider
         * top_slider_in_home
         * shop_gift_slider_in_home
         * new_uploaded_bg_in_home
         * all_category_bg_in_home
         * top_slider_in_market
         * recomended_product_bg_in_market
         * 
        */

        $welcome_slider = AppSlider::where('slider_name', 'welcome_slider')->get();
        $top_slider_in_home = AppSlider::where('slider_name', 'top_slider_in_home')->get();
        $shop_gift_slider_in_home = AppSlider::where('slider_name', 'shop_gift_slider_in_home')->get();
        $new_uploaded_bg_in_home = AppSlider::where('slider_name', 'new_uploaded_bg_in_home')->get();
        $all_category_bg_in_home = AppSlider::where('slider_name', 'all_category_bg_in_home')->get();
        $top_slider_in_market = AppSlider::where('slider_name', 'top_slider_in_market')->get();
        $recomended_product_bg_in_market = AppSlider::where('slider_name', 'recomended_product_bg_in_market')->get();

        $data = compact([
            'welcome_slider',
            'top_slider_in_home',
            'shop_gift_slider_in_home',
            'new_uploaded_bg_in_home',
            'all_category_bg_in_home',
            'top_slider_in_market',
            'recomended_product_bg_in_market',
        ]);

        return view('admin.sliders.index')->with($data);
    }


    /** show products create page */
    public function showCreatePage(Request $request)
    {
        return view('admin.sliders.form');
    }


    /** show update page */
    public function showUpdatePage(Request $request)
    {
        $key = $request->key;

        if($row = AppSlider::find($key))
        {
            return view('admin.sliders.form')->with(compact('row'));
        }

        return back()->with('error', 'Record does not exists');
    }


    /** Destroy Product Image */
    public function destroyImage(Request $request)
    {
        $key = $request->key;

        if($row = AppSlider::find($key))
        {
            if($row->delete())
            {
                return back()->with('success', 'Image deleted successfully');
            }
            
            return back()->with('error', 'Something went wrong. Please try again');
        }

        return back()->with('error', 'Record does not exists');
    }


    /** update Product */
    public function update(Request $request)
    {
        // return $request;
        $key = $request->key;

        $request->validate([
            'image' => 'mimes:png,jpg,jpeg,webp|image',
            'title' =>  'required|string',
            'title_in_bangla' =>  'required|string',
        ]);

        $title = $request->title;
        $title_in_bangla = $request->title_in_bangla;

        $row = AppSlider::find($key);
        $row->title = $title;
        $row->title_in_bangla = $title_in_bangla;
        

        if($request->hasFile('image'))
        {
            $OriginalFileName = $request->image->getClientOriginalName();
            $FileName = $request->image->hashName(); // Generate a unique, random name...
            $extension = $request->image->extension();

            // save into folder
            $request->image->move(public_path('images/sliders'), $FileName);

            // save into database
            $path = 'images/sliders/' . $FileName;

            $row->image_path = $path;
            $row->slider_name = $OriginalFileName;
            $row->slider_type = $extension;
        }
        
        $row->save();

        return to_route('admin.content.list', ['sliders'])->with('success', 'Slider added successfully');

    }


    /** upload product image */
    public function uploadImage(Request $request)
    {        
        // return $request;

        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,webp|image',
            'title' =>  'required|string',
            'title_in_bangla' =>  'required',
        ]);


        // return $request;

        $OriginalFileName = $request->image->getClientOriginalName();
        $FileName = $request->image->hashName(); // Generate a unique, random name...
        $extension = $request->image->extension();
        $title = $request->title;
        $title_in_bangla = $request->title_in_bangla;

        // save into folder
        $request->image->move(public_path('images/sliders'), $FileName);

        // save into database
        $path = 'images/sliders/' . $FileName;

        $row = new AppSlider();
        $row->title = $title;
        $row->title_in_bangla = $title_in_bangla;
        $row->image_path = $path;
        $row->slider_name = $OriginalFileName;
        $row->slider_type = $extension;
        $row->save();

        return to_route('admin.content.list', ['sliders'])->with('success', 'Slider added successfully');
    }


    /** Product remove from database */
    public function destroy(Request $request)
        {
        $key = $request->key;

        if($row = AppSlider::find($key))
        {
            if($row->delete())
            {
                return back()->with('success', 'Record remove successfully');
            }
            return back()->with('info', 'Something went wrong. Please try again');            
        }

        return back()->with('error', 'Record does not exists');
    }



    /** status update */
    public function updateStatus(Request $request)
    {
        $key = $request->key;

        if($row = AppSlider::find($key))
        {
            if($row->status)
            {
                $row->status = (int)false;
                $row->save();

                return back()->with('success', 'Status updated successfully');
            }
            else
            {
                $row->status = (int)true;
                $row->save();

                return back()->with('success', 'Status updated successfully');
            }                       
        }

        return back()->with('error', 'Record does not exists');
    }


}
