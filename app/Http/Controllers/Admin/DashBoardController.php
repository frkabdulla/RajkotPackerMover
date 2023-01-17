<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;

class DashBoardController extends MainController
{
    // super admin
    public function adminDashboard(Request $request)
    {   
        return view('admin.dashboard.index');
    }
}
