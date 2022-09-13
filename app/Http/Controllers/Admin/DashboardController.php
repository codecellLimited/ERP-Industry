<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class DashboardController extends Controller
{
    // show dashboard
    public function index()
    {
        return view('admin.dashboard');
    }
}
