<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusModel;
use App\Models\KriteriaModel;
use Yajra\DataTables\Facades\DataTables;

class ValidasiController extends Controller
{
    public function list(Request $request)
    {
        $kriterias = KriteriaModel::select('kriteria_id', 'kriteria_kode', 'kriteria_nama', 'status_id', 'komentar')
            ->with('status');

        if ($request->status) {
            $kriterias->where('status_id', $request->status);
        }

        return DataTables::of($kriterias)
            // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->make(true);
    }

    public function addKomentar(Request $request, string $id)
    {
        $kriteria = KriteriaModel::findOrFail($id);
        $kriteria->komentar = $request->komentar;
        $kriteria->status_id = 2;
        $kriteria->save();

        return redirect($request->redirect_to)->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function koordinator()
    {
        
        $breadcrumb = (object) [
            'title' => 'Validasi Koordinator',
            'list' => 'Validasi Koordinator',
        ];

        $page = (object) [
            'title' => 'Daftar kriteria yang tersimpan',
        ];

        $activeMenu = 'validasi_koordinator';

        $status = StatusModel::all();
 
        return view('validasi.koordinator.index', compact('status', 'breadcrumb', 'activeMenu', 'page'));
    }

    public function koordinator_form(string $id)
    {

        $breadcrumb = (object) [
            'title' => 'Kriteria ' . $id,
            'list' => 'Validasi Koordinator',
        ];

        $page = (object) [
            'title' => 'Kriteria ' . $id,
        ];

        $activeMenu = 'validasi_koordinator';

        $kriteria = KriteriaModel::with([
            'penetapan',
            'pelaksanaan',
            'evaluasi',
            'pengendalian',
            'peningkatan'
        ])->findOrFail($id);

        // Jika data kosong, tampilkan error
        if (
            !$kriteria->penetapan &&
            !$kriteria->pelaksanaan &&
            !$kriteria->evaluasi &&
            !$kriteria->pengendalian &&
            !$kriteria->peningkatan
        ) {
           return redirect()->back()->with('error', 'Data kriteria tidak ditemukan atau belum diisi.');
        }
 
        return view('validasi.koordinator.form', compact('kriteria', 'breadcrumb', 'activeMenu', 'page'));
    }

    public function koordinator_validate(string $id)
    {
        $kriteria = KriteriaModel::findOrFail($id);
        $kriteria->status_id = 3;
        $kriteria->save();

        return redirect()->route('validasi.koordinator')->with('success', 'Status kriteria berhasil diperbarui.');
    }

    public function kpskajur()
    {
        
        $breadcrumb = (object) [
            'title' => 'Validasi KPS / Kajur',
            'list' => 'Validasi KPS / Kajur',
        ];

        $page = (object) [
            'title' => 'Daftar kriteria yang tersimpan',
        ];

        $activeMenu = 'validasi_kpskajur';

        $status = StatusModel::all();
 
        return view('validasi.kpskajur.index', compact('status', 'breadcrumb', 'activeMenu', 'page'));
    }

    public function kpskajur_form(string $id)
    {

        $breadcrumb = (object) [
            'title' => 'Kriteria ' . $id,
            'list' => 'Validasi KPS / Kajur',
        ];

        $page = (object) [
            'title' => 'Kriteria ' . $id,
        ];

        $activeMenu = 'validasi_kpskajur';

        $kriteria = KriteriaModel::with([
            'penetapan',
            'pelaksanaan',
            'evaluasi',
            'pengendalian',
            'peningkatan'
        ])->findOrFail($id);

        // Jika data kosong, tampilkan error
        if (
            !$kriteria->penetapan &&
            !$kriteria->pelaksanaan &&
            !$kriteria->evaluasi &&
            !$kriteria->pengendalian &&
            !$kriteria->peningkatan
        ) {
           return redirect()->back()->with('error', 'Data kriteria tidak ditemukan atau belum diisi.');
        }
 
        return view('validasi.kpskajur.form', compact('kriteria', 'breadcrumb', 'activeMenu', 'page'));
    }

    public function kpskajur_validate(string $id)
    {
        $kriteria = KriteriaModel::findOrFail($id);
        $kriteria->status_id = 4;
        $kriteria->save();

        return redirect()->route('validasi.kpskajur')->with('success', 'Status kriteria berhasil diperbarui.');
    }
}
