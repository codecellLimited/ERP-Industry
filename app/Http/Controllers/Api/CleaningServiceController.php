<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/** models */
use App\Models\CleaningService;
use App\Models\ImagesOfTrash;


class CleaningServiceController extends Controller
{
    //** Create service */
    public function create(Request $request)
    {
        $request->validate([
            'user_id'       => "required|exists:users,id",
            'title'         => "required|string",
            'description'   => "required|string",
            'price'         => "required|string",
            'category'      => "nullable|string",
        ]);
        

        $data = [
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'category'      => $request->category,
            'user_id'       => $request->user_id,
            'code'          => strtoupper(uniqid()),
        ];

        $create = CleaningService::create($data);

        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $file)
            {

                $OriginalFileName = $file->getClientOriginalName();
                $FileName = $file->hashName(); // Generate a unique, random name...
                $extension = $file->extension();
                $size = $file->getSize();

                // save into folder
                $file->move(public_path('cleaning-service'), $FileName);

                // save into database
                $path = 'cleaning-service/' . $FileName;

                $row = new ImagesOfTrash();
                $row->service_id = $create->id;
                $row->file_name = $OriginalFileName;
                $row->file_size = $size;
                $row->file_path = $path;
                $row->file_type = $extension;
                $row->save();
            }
            
        }

        return response()->json([
            'success'   =>  true,
            'message'   =>  'Service created successfully',
        ], 200);
    }


    //** Update service */
    public function update(Request $request)
    {
        $request->validate([
            'key'           => "required|exists:cleaning_services,id",            
        ]);        

        $data = [
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'category'      => $request->category,
            'user_id'       => $request->user_id,
        ];

        CleaningService::find($request->key)->update($data);

        if($request->hasFile('image'))
        {
            foreach($request->file('image') as $file)
            {

                $OriginalFileName = $file->getClientOriginalName();
                $FileName = $file->hashName(); // Generate a unique, random name...
                $extension = $file->extension();
                $size = $file->getSize();

                // save into folder
                $file->move(public_path('cleaning-service'), $FileName);

                // save into database
                $path = 'cleaning-service/' . $FileName;

                $row = new ImagesOfTrash();
                $row->service_id =$request->key;
                $row->file_name = $OriginalFileName;
                $row->file_size = $size;
                $row->file_path = $path;
                $row->file_type = $extension;
                $row->save();
            }
            
        }

        return response()->json([
            'success'   =>  true,
            'message'   =>  'Service updated successfully',
        ], 200);
    }
}
