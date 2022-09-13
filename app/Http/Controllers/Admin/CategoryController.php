<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** Models */
use App\Models\Category;

class CategoryController extends Controller
{

    /** show categories */
    public function showCategoryList()
    {

        $data = Category::latest()->get();

        return view('admin.category.index')->with(compact('data'));   
    }


    /** show category create page */
    public function showCreatePage()
    {
        return view('admin.category.form');       
    }


    /** create category */
    public function create(Request $request)
    {
        // return $request;

        $request->validate([
            'categoryName' => 'required|unique:categories,category_name|string',
        ],[
            'categoryName.unique' => "The category is already exists.",
        ]);

        $slug = strtolower(str_replace(' ', '-', trim($request->categoryName)));

        Category::create([
            'category_name' => $request->categoryName,
            'slug'          => $slug,
        ]);

        return to_route('admin.category.list', $request->item)->with('success', 'Category created successfully');
    }


    /** show update page */
    public function showUpdatePage(Request $request)
    {
        $key = $request->key;

        if($row = Category::find($key))
        {
            return view('admin.category.form')->with(compact('row'));
        }

        return back()->with('error', 'Record does not exists');
    }


    /** update category */
    public function update(Request $request)
    {
        $key = $request->key;

        $request->validate([
            'categoryName' => 'required|unique:categories,category_name|string',
        ]);

        Category::find($key)->update([
            'category_name' => $request->categoryName,
        ]);

        return to_route('admin.category.list')->with('success', 'Record updated successfully');
    }


    /** Category remove from database */
    public function destroy(Request $request)
    {
        $key = $request->key;

        if($row = Category::find($key))
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

        if($row = Category::find($key))
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
