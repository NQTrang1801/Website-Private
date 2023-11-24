<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin.categories');
    }

    public function subCategories()
    {
        return view('admin.sub-categories');
    }
}
