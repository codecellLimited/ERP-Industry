<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** Models */
use App\Models\AppContent;
use App\Models\AppSlider;

class WebContentController extends Controller
{
    /** show products */
    public function showList($tab = null)
    {
        return view('admin.web-content.index')->with(compact('tab'));
    }


    /** show products create page */
    public function showCreatePage()
    {
        $categories = Service::where('status', true)->latest()->get();

        return view('admin.service.form')->with(compact('categories'));
    }


    /** create product */
    public function create(Request $request)
    {

        $request->validate([
            'title'             => 'required|string',
            'title_in_bangla'   => 'nullable|string',
            'content'           => 'required|string',
            'content_in_bangla' => 'nullable|string',
            'image'             => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('services'), $FileName);

            // save into database
            $path = 'services/' . $FileName;
        }

        $create = Service::create([
                    'title'             => $request->title,
                    'title_in_bangla'   => $request->title_in_bangla,
                    'content'           => $request->content,
                    'content_in_bangla' => $request->content_in_bangla,
                    'slug'              => uniqid(),
                    'image'             => $path ?? null,
                    'admin_id'          => auth()->guard('admin')->id(),
                ]);        

        return to_route('admin.service.list')->with('success', 'Content created successfully');
    }



    /** show update page */
    public function showUpdatePage(Request $request)
    {
        $slug = trim($request->slug);


        $row = Service::where('slug', $slug);


        if($row->exists())
        {
            $row = $row->first();
            return view('admin.service.form')->with(compact('row'));
        }

        return back()->with('error', 'Record does not exists');
    }


    /** Destroy Product Image */
    public function destroyImage(Request $request)
    {
        $key = $request->key;

        if($row = Blog::find($key))
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
        $section = $request->section;

        $row = AppContent::where('section', $section);
        
        if($row->exists())
        {
            $row->update([
                'data'                  =>      $request->data,
                'data_in_bangla'        =>      $request->data_in_bangla,
            ]);

            return back()->with('success', 'Content updated successfully');

        }
        
        return back()->with('error', 'Failed to update. Please try again');

       
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

        return to_route('admin.blogs.list')->with('success', 'Product created successfully');
    }


    /** Product remove from database */
    public function destroy(Request $request)
    {
        $key = $request->key;

        if($row = Service::find($key))
        {
            if($row->delete())
            {
                return back()->with('success', 'Content remove successfully');
            }
            return back()->with('info', 'Something went wrong. Please try again');            
        }

        return back()->with('error', 'Record does not exists');
    }



    /** status update */
    public function updateStatus(Request $request)
    {
        $key = $request->key;

        if($row = Service::find($key))
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
