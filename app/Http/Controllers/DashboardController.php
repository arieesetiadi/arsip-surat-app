<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Halaman dashboard
    public function index(){
        $viewData = [
            'headTitle' => 'Dashboard'
        ];

        return view('pages.dashboard')->with($viewData);
    }
}
