<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\SearchHistory;

class SearchController extends Controller
{
    /** Search Item */
    public function searchItem(Request $request)
    {
        $request->validate([
            'section'   =>  'required',
            'item'      =>  'required',
        ]);



    }
}
