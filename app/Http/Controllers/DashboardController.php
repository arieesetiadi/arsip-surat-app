<?php

namespace App\Http\Controllers;

use App\Models\T_Pengguna;
use App\Models\T_SuratMasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Halaman dashboard
    public function dashboard(){
        $data['title'] = 'Dashboard';
        $data['count'] = [
            'suratMasuk' => T_SuratMasuk::count(),
            'suratKeluar' => 2,
            'pengguna' => T_Pengguna::count(),
        ];
        return view('pages.dashboard')->with($data);
    }
}
