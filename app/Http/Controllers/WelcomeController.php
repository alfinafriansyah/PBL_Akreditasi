<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard Kriteria',
        ];

        $activeMenu = 'dashboard_kriteria';

        return view('dashboard.kriteria', compact('breadcrumb', 'activeMenu'));
    }

    public function koordinator()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard Koordinator',
        ];

        $activeMenu = 'dashboard_koordinator';

        return view('dashboard.koordinator', compact('breadcrumb', 'activeMenu'));
    }

    public function kpskajur()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard KPS / KAJUR',
        ];

        $activeMenu = 'dashboard_kpskajur';

        return view('dashboard.kpskajur', compact('breadcrumb', 'activeMenu'));
    }

    public function kjm()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard KJM',
        ];

        $activeMenu = 'dashboard_kjm';

        return view('dashboard.kjm', compact('breadcrumb', 'activeMenu'));
    }

    public function direktur()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard Direktur',
        ];

        $activeMenu = 'dashboard_direktur';

        return view('dashboard.direktur', compact('breadcrumb', 'activeMenu'));
    }
}
