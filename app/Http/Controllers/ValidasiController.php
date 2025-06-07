<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusModel;
use App\Models\KriteriaModel;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Date;

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

    public function kjm()
    {
        
        $breadcrumb = (object) [
            'title' => 'Validasi KJM',
            'list' => 'Validasi KJM',
        ];

        $page = (object) [
            'title' => 'Daftar kriteria yang tersimpan',
        ];

        $activeMenu = 'validasi_kjm';

        $status = StatusModel::all();
 
        return view('validasi.kjm.index', compact('status', 'breadcrumb', 'activeMenu', 'page'));
    }

    public function kjm_form(string $id)
    {

        $breadcrumb = (object) [
            'title' => 'Kriteria ' . $id,
            'list' => 'Validasi KJM',
        ];

        $page = (object) [
            'title' => 'Kriteria ' . $id,
        ];

        $activeMenu = 'validasi_kjm';

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
 
        return view('validasi.kjm.form', compact('kriteria', 'breadcrumb', 'activeMenu', 'page'));
    }

    public function kjm_validate(string $id)
    {
        $kriteria = KriteriaModel::findOrFail($id);
        $kriteria->status_id = 5;
        $kriteria->save();

        return redirect()->route('validasi.kjm')->with('success', 'Status kriteria berhasil diperbarui.');
    }

    public function direktur()
    {
        
        $breadcrumb = (object) [
            'title' => 'Validasi Direktur',
            'list' => 'Validasi Direktur',
        ];

        $page = (object) [
            'title' => 'Daftar kriteria yang tersimpan',
        ];

        $activeMenu = 'validasi_direktur';

        $status = StatusModel::all();
 
        return view('validasi.direktur.index', compact('status', 'breadcrumb', 'activeMenu', 'page'));
    }

    public function direktur_form(string $id)
    {

        $breadcrumb = (object) [
            'title' => 'Kriteria ' . $id,
            'list' => 'Validasi Direktur',
        ];

        $page = (object) [
            'title' => 'Kriteria ' . $id,
        ];

        $activeMenu = 'validasi_direktur';

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
 
        return view('validasi.direktur.form', compact('kriteria', 'breadcrumb', 'activeMenu', 'page'));
    }

    public function direktur_validate(string $id)
    {
        $kriteria = KriteriaModel::findOrFail($id);
        $kriteria->status_id = 6;
        $kriteria->save();

        return redirect()->route('validasi.direktur')->with('success', 'Status kriteria berhasil diperbarui.');
    }

    public function export_pdf($id)
    {
        // Cek apakah kriteria sudah divalidasi direktur (status_id = 6)
        $kriteria = KriteriaModel::with([
            'penetapan',
            'pelaksanaan',
            'evaluasi',
            'pengendalian',
            'peningkatan',
            'status'
        ])->findOrFail($id);

        if ($kriteria->status_id != 6) {
            return redirect()->back()->with('error', 'Hanya kriteria yang sudah divalidasi direktur yang dapat di-export.');
        }

        $pdf = Pdf::loadView('validasi.export_pdf', [
            'kriteria' => $kriteria,
            'tanggal' => now()->format('d-m-Y')
        ]);

        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption("isRemoteEnabled", true);
        set_time_limit(300);

        return $pdf->download('Kriteria ' . $id . '_' . now()->format('YmdHis') . '.pdf');
    }
}
