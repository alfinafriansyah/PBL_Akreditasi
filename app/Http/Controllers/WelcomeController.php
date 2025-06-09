<?php

namespace App\Http\Controllers;

use App\Models\KriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard Kriteria',
        ];

        $activeMenu = 'dashboard_kriteria';
        $kriteria = KriteriaModel::with('status')->get();
        $revisiCount = KriteriaModel::where('status_id', 2)->count();
        $datatervalidasi = KriteriaModel::where('status_id', 6)->count();

        $dosen = Auth::user()->dosen;
        $namaLengkap = $dosen->nama;
        $namaPendek = collect(explode(' ', $namaLengkap))->take(2)->implode(' ');

        return view('dashboard.kriteria', compact(
            'breadcrumb',
            'activeMenu',
            'kriteria',
            'revisiCount',
            'namaPendek',
            'datatervalidasi',
        ));
    }


    public function koordinator()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard Koordinator',
        ];

        $activeMenu = 'dashboard_koordinator';
        $kriteria = KriteriaModel::with('status')->get();
        $revisiCount = KriteriaModel::where('status_id', 2)->count();
        $datatervalidasi = KriteriaModel::where('status_id', 6)->count();

        $dosen = Auth::user()->dosen;
        $namaLengkap = $dosen->nama;
        $namaPendek = collect(explode(' ', $namaLengkap))->take(2)->implode(' ');

        return view('dashboard.koordinator', compact('breadcrumb', 'activeMenu','kriteria','revisiCount','namaPendek','datatervalidasi','dosen'));
    }

    public function kpskajur()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard KPS / KAJUR',
        ];

        $activeMenu = 'dashboard_kpskajur';
        $kriteria = KriteriaModel::with('status')->get();
        $revisiCount = KriteriaModel::where('status_id', 2)->count();
        $datatervalidasi = KriteriaModel::where('status_id', 6)->count();

        $dosen = Auth::user()->dosen;
        $namaLengkap = $dosen->nama;
        $namaPendek = collect(explode(' ', $namaLengkap))->take(2)->implode(' ');
        return view('dashboard.kpskajur', compact('breadcrumb', 'activeMenu','kriteria','revisiCount','namaPendek','datatervalidasi','dosen'));
    }

    public function kjm()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard KJM',
        ];

        $activeMenu = 'dashboard_kjm';
        $kriteria = KriteriaModel::with('status')->get();
        $revisiCount = KriteriaModel::where('status_id', 2)->count();
        $datatervalidasi = KriteriaModel::where('status_id', 6)->count();

        $dosen = Auth::user()->dosen;
        $namaLengkap = $dosen->nama;
        $namaPendek = collect(explode(' ', $namaLengkap))->take(2)->implode(' ');
        return view('dashboard.kjm', compact('breadcrumb', 'activeMenu','kriteria','revisiCount','namaPendek','datatervalidasi','dosen'));
    }

    public function direktur()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => 'Dashboard Direktur',
        ];

        $activeMenu = 'dashboard_direktur';
        $kriteria = KriteriaModel::with('status')->get();
        $revisiCount = KriteriaModel::where('status_id', 2)->count();
        $datatervalidasi = KriteriaModel::where('status_id', 6)->count();

        $dosen = Auth::user()->dosen;
        $namaLengkap = $dosen->nama;
        $namaPendek = collect(explode(' ', $namaLengkap))->take(2)->implode(' ');
        return view('dashboard.direktur', compact('breadcrumb', 'activeMenu','kriteria','revisiCount','namaPendek','datatervalidasi','dosen'));
    }
}
