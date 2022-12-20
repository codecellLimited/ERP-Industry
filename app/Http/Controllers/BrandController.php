<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Brand;

class BrandController extends Controller
{
    /** --------------- Brand data table
     * =============================================*/
    public function show()
    {
        $Brand = Brand::where('status', true)->latest()->get();

        return view('sales.Brand.table')->with(compact('Brand'));
    }


    /** --------------- Brand data table
     * =============================================*/
    public function create()
    {
        return view('sales.Brand.form');
    }



    /** --------------- Store Brand
     * =============================================*/
    public function store(Request $request)
    {

        //return $data = $request->all();

        $request->validate([
            'name'  => 'required',
            'description'=>'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp'           
        ]);

        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('Brand'), $FileName);

            // save into database
            $path = 'Brand/' . $FileName;

            $data['image'] = $path;
        }

        $Brand = Brand::create($data);

        return to_route('Brand')->with('success', 'Record created successfully');
    }


    
    /** --------------- Brand data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $Brand = Brand::find($key);

        return view('sales.brand.form')->with(compact('Brand'));
    }




    /** --------------- Update Brand
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'  => 'required',
            'description'=>'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp'           
        ]);
        
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('Brand'), $FileName);

            // save into database
            $path = 'Brand/' . $FileName;

            $data['image'] = $path;
        }

        $Brand = Brand::find($key)->update($data);

        return to_route('Brand')->with('success', 'Record updated successfully');
    }



    /** --------------- Update Brand
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $Brand = Brand::destroy($key);

        return to_route('Brand')->with('success', 'Record deleted successfully');
    }

}
