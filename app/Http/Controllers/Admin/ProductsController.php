<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** models */
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImg;

class ProductsController extends Controller
{

    /** show products */
    public function showList($sector)
    {
        $data = Product::whereHas('category', function($query) use ($sector){
                            $query->where('item', $sector);
                        })
                        ->with('category')
                        ->latest()->get();

        return view('admin.products.index')->with(compact('data', 'sector'));
    }


    /** show products create page */
    public function showCreatePage($sector)
    {
        $data = Category::where('status', true)
                ->where('item', $sector)
                ->latest()->get();

        return view('admin.products.form')->with(compact('data', 'sector'));
    }


    /** create product */
    public function create(Request $request)
    {

        $request->validate([
            'category'      => 'required|integer',
            'productName'   => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required',
            'quantity'      => 'required|integer',
            'quantity'      => 'required|integer',
            'product_code'  => 'required|unique:products,product_code',
        ],[
            'product_code.unique' => 'Something went wrong with product code. Please try again',
        ]);

        $create = Product::create([
                    'category_id'   => (int)$request->category,
                    'product_name'  => $request->productName,
                    'description'   => $request->description,
                    'price'         => $request->price,
                    'quantity'      => $request->quantity,
                    'colors'        => $request->colors,
                    'sizes'         => implode(", ", $request->sizes),
                    'product_code'  => trim($request->product_code),
                    'slug'          => uniqid(),
                ]);

        if($request->hasFile('productImage'))
        {
            foreach($request->file('productImage') as $file)
            {
                $OriginalFileName = $file->getClientOriginalName();
                $FileName = $file->hashName(); // Generate a unique, random name...
                $extension = $file->extension();
                $size = $file->getSize();

                // save into folder
                $file->move(public_path('upload'), $FileName);

                // save into database
                $path = 'upload/' . $FileName;

                $row = new ProductImg();
                $row->product_id = $create->id;
                $row->file_name = $OriginalFileName;
                $row->file_size = $size;
                $row->file_path = $path;
                $row->file_type = $extension;
                $row->save();
            }
        }

        return to_route('admin.product.list', $request->item)->with('success', 'Gift created successfully');
    }



    /** show update page */
    public function showUpdatePage(Request $request)
    {
        $key = $request->key;
        $sector = $request->sector;

        $data = Category::where(['status' => true, 'item' => $sector])->get();

        if($row = Product::find($key))
        {
            // return explode(', ', $row->sizes);

            return view('admin.products.form')->with(compact('row', 'data', 'sector'));
        }

        return back()->with('error', 'Record does not exists');
    }


    /** Destroy Product Image */
    public function destroyImage(Request $request)
    {
        $key = $request->key;

        if($row = ProductImg::find($key))
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
        $key = $request->key;

        $request->validate([
            'category'      => 'required|integer',
            'productName'   => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required',
            'quantity'      => 'required',
        ]);

        Product::find($key)->update([
            'category_id'   => (int)$request->category,
            'product_name'  => $request->productName,
            'description'   => $request->description,
            'price'         => $request->price,
            'quantity'      => $request->quantity,
            'slug'          => uniqid(),
        ]);


        if($request->hasFile('productImage'))
        {
            foreach($request->file('productImage') as $file)
            {
                $OriginalFileName = $file->getClientOriginalName();
                $FileName = $file->hashName(); // Generate a unique, random name...
                $extension = $file->extension();
                $size = $file->getSize();

                // save into folder
                $file->move(public_path('upload'), $FileName);

                // save into database
                $path = 'upload/' . $FileName;

                $row = new ProductImg();
                $row->product_id = $key;
                $row->file_name = $OriginalFileName;
                $row->file_size = $size;
                $row->file_path = $path;
                $row->file_type = $extension;
                $row->save();
            }
        }

        return to_route('admin.product.list')->with('success', 'Gift updated successfully');
    }


    /** upload product image */
    public function uploadImage(Request $request)
    {
        // return $request;
        $request->validate([
            'key'   => 'required|exists:products,id',
            'file' => 'required|mimes:png,jpg,jpeg,webp|image'
        ]);

        $key = $request->key;

        $OriginalFileName = $request->file->getClientOriginalName();
        $FileName = $request->file->hashName(); // Generate a unique, random name...
        $extension = $request->file->extension();
        $size = $request->file->getSize();

        // save into folder
        $request->file->move(public_path('products'), $FileName);

        // save into database
        $path = 'products/' . $FileName;

        $row = new ProductImg();
        $row->product_id = $key;
        $row->file_name = $OriginalFileName;
        $row->file_size = $size;
        $row->file_path = $path;
        $row->file_type = $extension;
        $row->save();

        return to_route('admin.product.list')->with('success', 'Product created successfully');
    }


    /** Product remove from database */
    public function destroy(Request $request)
    {
        $key = $request->key;

        if($row = Product::find($key))
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

        if($row = Product::find($key))
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



    /** stock update */
    public function updateStock(Request $request)
    {
        $key = $request->key;

        if($row = Product::find($key))
        {
            if($row->in_stock)
            {
                $row->in_stock = (int)false;
                $row->save();

                return back()->with('success', 'Status updated successfully');
            }
            else
            {
                $row->in_stock = (int)true;
                $row->save();

                return back()->with('success', 'Status updated successfully');
            }                       
        }

        return back()->with('error', 'Record does not exists');
    }
}
