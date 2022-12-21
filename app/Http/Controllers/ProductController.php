<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Product;

class ProductController extends Controller
{
    /** --------------- product data table
     * =============================================*/
    public function show()
    {
        $products = product::where('status', true)->latest()->get();

        return view('sales.product.table')->with(compact('products'));
    }


    /** --------------- product data table
     * =============================================*/
    public function create()
    {
        return view('sales.product.form');
    }



    /** --------------- Store product
     * =============================================*/
    public function store(Request $request)
    {
        

        $data = $request->all();

        $request->validate([
        


            'name'  => 'required',
            'catagory_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required | integer',
            'unit_id' => 'required',
            'image' => 'nullable|memes:jpg,png,jpeg'

        ]);

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('products'), $FileName);

            // save into database
            $path = 'products/' . $FileName;

            $data['image'] = $path;
        }

        $products = Product::create($data);

        return to_route('product')->with('success', 'Record created successfully');
    }


    
    /** --------------- product data edit
     * =============================================*/
    public function edit(Request $request)
    {
        $key = $request->key;
        $products = product::find($key);

        return view('sales.product.form')->with(compact('products'));
    }




    /** --------------- Update product
     * =============================================*/
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
        


            'name'  => 'required',
            'catagory_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required | integer',
            'unit_id' => 'required',
            'image' => 'nullable|memes:jpg,png,jpeg'

        ]);

        
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('products'), $FileName);

            // save into database
            $path = 'products/' . $FileName;

            $data['image'] = $path;
        }

        $products = product::find($key)->update($data);

        return to_route('product')->with('success', 'Record updated successfully');
    }



    /** --------------- Update product
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $product = product::destroy($key);

        return to_route('product')->with('success', 'Record deleted successfully');
    }

}
