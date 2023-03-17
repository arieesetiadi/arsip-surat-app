<?php

namespace App\Http\Controllers;

use App\Models\T_Pengguna;
use App\Models\T_SuratKeluar;
use App\Models\T_SuratMasuk;
class DashboardController extends Controller
{
    // Halaman dashboard
    public function dashboard(){
        $data['title'] = 'Dashboard';
        $data['count'] = [
            'suratMasuk' => T_SuratMasuk::count(),
            'suratKeluar' => T_SuratKeluar::count(),
            'pengguna' => T_Pengguna::count(),
        ];
        return view('pages.dashboard')->with($data);
    }
}
