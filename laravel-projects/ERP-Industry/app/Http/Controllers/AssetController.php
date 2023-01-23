<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Asset;

class AssetController extends Controller
{
    /** --------------- assets data table
     * =============================================*/
    public function show()
    {
        $asset = Asset::where('status', true)->latest()->get();

        return view('inventory.asset.table')->with(compact('asset'));
    }


    /** --------------- assets data table
     * =============================================*/
    public function create()
    {
        return view('inventory.asset.form');
    }



    /** --------------- Store assets
     * =============================================*/
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'quantity'=> 'required|integer',
            'quality'=> 'required',
            'image' => 'nullable | mimes: jpg,jpeg,png,webp'
        ]);

        $data = $request->all();

        
        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('asset'), $FileName);

            // save into database
            $path = 'asset/' . $FileName;

            $data['image'] = $path;
        }
        
        $asset = Asset::create($data);

        return to_route('asset')->with('success', 'Record created successfully');
    }


    
    /** --------------- edit assets data
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $asset = Asset::find($key);

        return view('inventory.asset.form')->with(compact('asset'));
    }




    /** --------------- Update assets
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'name'  => 'required',
            'image' => 'nullable | mimes: jpg,jpeg,png,webp',
            'quantity'=> 'required|integer',
            'quality'=> 'required',
        ]);

        
        $data = $request->all();

        
        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('asset'), $FileName);

            // save into database
            $path = 'asset/' . $FileName;

            $data['image'] = $path;
        }

        $asset = Asset::find($key)->update($data);

        return to_route('asset')->with('success', 'Record updated successfully');
    }



    /** --------------- delete asset
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $asset = Asset::destroy($key);

        return to_route('asset')->with('success', 'Record deleted successfully');
    }

}
