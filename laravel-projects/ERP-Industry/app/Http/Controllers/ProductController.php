<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Models */
use App\Models\Product;
use App\Models\Unit;

class ProductController extends Controller
{
    /** --------------- product data table
     * =============================================*/
    public function show()
    {
        $products = Product::where('status', true)->latest()->get();

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

        $products = Product::find($key)->update($data);

        return to_route('product')->with('success', 'Record updated successfully');
    }



    /** --------------- Update product
     * =============================================*/
    public function destroy(Request $request)
    {
        $key = $request->key;

        $product = Product::destroy($key);

        return to_route('product')->with('success', 'Record deleted successfully');
    }




    public function getProductUnit(Request $request)
    {
        $companyId = auth()->user()->company_id;
        $key = $request->key;

        $units = Unit::where('company_id', $companyId)->where('status', true)->get();
        $html = "";

        if($product = Product::find($key))
        {
            $html .= "<label>Unit*</label>
            <select name=\"unit[]\" class=\"form-control\" required>
            <option value=\"\" selected disabled>Select One</option>";

            foreach($units as $item)
            {
                if($item->id == $product->unit_id):
                $selected = "selected";
                else:
                $selected = "";
                endif;

                $html .= "<option value=\"{$item->id}\" $selected>{$item->name}</option>";
            }

            $html .= "</select>";
        }
        else
        {
            $html .= "Not Found";
        }

        return $html;
    }



    public function getProductPrice(Request $request)
    {
        $companyId = auth()->user()->company_id;
        $key = $request->key;
        $html = 0;

        if($product = Product::find($key))
        {
            $html = $product->price;
        }

        return $html;
    }

}
