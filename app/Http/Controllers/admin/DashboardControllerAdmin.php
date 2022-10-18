<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Admin_user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardControllerAdmin extends Controller
{
   
    public function index()
    {
        //
        return view('admin/admin_home/dashboard');
    }

    public function logout()
    {
        //
        session()->flush();
 
        return redirect('admin/login');
    }    
}
