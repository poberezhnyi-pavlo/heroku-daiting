<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class HomepageController
 * @package App\Http\Controllers\Admin
 */
class HomepageController extends Controller
{
    public function index()
    {
        return view('admin.homepage.index');
    }
}
