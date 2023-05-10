<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        
        if ( $admin = 1) {
            # code...
            return view('admin.dashboard');
        } else if ( $user = 1){
            # code...
            return view('dashboard');
        }
    }

        
}
