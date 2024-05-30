<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UiController extends Controller
{
    public function index()
    {
        return view('SuperAdmin.signin');
    }

    public function dashboard()
    {
        $data['page_name']="dashboard";
        return view('SuperAdmin.dashboard',$data);
    }

    public function add_shop()
    {
        $data['page_name']="add_shop";
        return view('SuperAdmin.add_shop',$data);
    }

}
