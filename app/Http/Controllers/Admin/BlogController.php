<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** MOdels */
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    /** show products */
    public function showList()
    {
        $data = Blog::with('category')->latest()->get();

        return view('admin.blogs.index')->with(compact('data'));
    }


    /** show products create page */
    public function showCreatePage()
    {
        $categories = Category::where('status', true)->latest()->get();

        return view('admin.blogs.form')->with(compact('categories'));
    }


    /** create product */
    public function create(Request $request)
    {

        $request->validate([
            'category'          => 'required|integer',
            'title'             => 'required|string',
            'title_in_bangla'   => 'nullable|string',
            'content'           => 'required|string',
            'content_in_bangla' => 'nullable|string',
            'tags'              => 'nullable',
            'image'             => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('blogs'), $FileName);

            // save into database
            $path = 'blogs/' . $FileName;
        }

        $create = Blog::create([
                    'category_id'       => (int)$request->category,
                    'title'             => $request->title,
                    'title_in_bangla'   => $request->title_in_bangla,
                    'content'           => $request->content,
                    'content_in_bangla' => $request->content_in_bangla,
                    'tags'              => $request->tags,
                    'slug'              => uniqid(),
                    'image'             => $path ?? null,
                    'admin_id'          => auth()->guard('admin')->id(),
                ]);        

        return to_route('admin.blog.list')->with('success', 'Content created successfully');
    }



    /** show update page */
    public function showUpdatePage(Request $request)
    {
        $slug = trim($request->slug);

        $categories = Category::where(['status' => true])->get();

        $row = Blog::where('slug', $slug);


        if($row->exists())
        {
            $row = $row->first();
            return view('admin.blogs.form')->with(compact('row', 'categories'));
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
        $key = $request->key;

        $request->validate([
            'category'      => 'required|integer',
            'title'         => 'required|string',
            'content'       => 'required|string',
            'image'         => 'nullable|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [
            'category_id'       => (int)$request->category,
            'title'             => $request->title,
            'title_in_bangla'   => $request->title_in_bangla,
            'content'           => $request->content,
            'content_in_bangla' => $request->content_in_bangla,
            'tags'              => $request->tags,
        ];

        if($request->hasFile('image'))
        {
            $FileName = $request->image->hashName(); // Generate a unique, random name...

            // save into folder
            $request->image->move(public_path('blogs'), $FileName);

            // save into database
            $path = 'blogs/' . $FileName;

            $data['image']  = $path;
        }

        Blog::find($key)->update($data);

       
        return to_route('admin.blog.list')->with('success', 'Content updated successfully');
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

        if($row = Blog::find($key))
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

        if($row = Blog::find($key))
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
