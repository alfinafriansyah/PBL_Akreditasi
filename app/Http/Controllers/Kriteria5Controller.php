<?php

namespace App\Http\Controllers;

use App\Models\DetailModel;
use App\Models\EvaluasiModel;
use App\Models\PelaksanaanModel;
use App\Models\PenetapanModel;
use App\Models\PeningkatanModel;
use App\Models\PengendalianModel;
use App\Models\KriteriaModel;
use App\Models\StatusModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class Kriteria5Controller extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Kriteria 5',
            'list' => 'Kriteria 5',
        ];

        $page = (object) [
            'title' => 'Daftar kriteria yang tersimpan',
        ];

        $activeMenu = 'kriteria5';

        $status = StatusModel::all();
 
        $kriteria = KriteriaModel::where('kriteria_kode', 'KRT5')->first();
        
        return view('kriteria5.index', compact('breadcrumb', 'activeMenu', 'page', 'kriteria', 'status'));
    }

    public function list(Request $request)
    {
        $kriterias = KriteriaModel::select('kriteria_id', 'kriteria_kode', 'kriteria_nama', 'status_id', 'komentar')
            ->with('status')
            ->where('kriteria_kode', 'KRT5');

        if ($request->status) {
            $kriterias->where('status_id', $request->status);
        }

        return DataTables::of($kriterias)
            // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kriteria) { 
                $btn = '<button onclick="modalAction(\'' . url('/kriteria5/' . $kriteria->kriteria_id . '/detail') . '\')" class="btn btn-info btn-sm">Detail</button> ';
 
                $btn .= '<a href="'.url('/kriteria5/' . $kriteria->kriteria_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';

                $btn .= '<button onclick="confirmDelete(\'' . url('/kriteria5/' . $kriteria->kriteria_id . '/delete') . '\', \'' . $kriteria->kriteria_id . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                
                return $btn;
            })
            ->rawColumns(['aksi']) // Memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data Kriteria 5',
            'list' => 'Tambah Kriteria 5',
        ];

        $page = (object) [
            'title' => 'Tambah data kriteria 5',
        ];

        $activeMenu = 'kriteria5';
 
        return view('kriteria5.create', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'page' => $page]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penetapan' => 'required',
            'pelaksanaan' => 'required',
            'evaluasi' => 'required',
            'pengendalian' => 'required',
            'peningkatan' => 'required',
            'doc_penetapan.*' => 'nullable|file|mimes:gif,jpg,jpeg,png|max:2048',
            'doc_pelaksanaan.*' => 'nullable|file|mimes:gif,jpg,jpeg,png|max:2048',
            'doc_evaluasi.*' => 'nullable|file|mimes:gif,jpg,jpeg,png|max:2048',
            'doc_pengendalian.*' => 'nullable|file|mimes:gif,jpg,jpeg,png|max:2048',
            'doc_peningkatan.*' => 'nullable|file|mimes:gif,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Process file uploads
            $documentPaths = [];
            $documentFields = [
                'doc_penetapan' => 'penetapan',
                'doc_pelaksanaan' => 'pelaksanaan',
                'doc_evaluasi' => 'evaluasi',
                'doc_pengendalian' => 'pengendalian',
                'doc_peningkatan' => 'peningkatan',
            ];
            foreach ($documentFields as $field => $folder) {
                $paths = [];
                if ($request->hasFile($field)) {
                    foreach ($request->file($field) as $file) {
                        $path = $file->store("public/documents/kriteria5/{$folder}");
                        $paths[] = str_replace('public/', 'storage/', $path);
                    }
                }
                $documentPaths[$field] = !empty($paths) ? json_encode($paths) : null;
            }

            // Save to database
            $penetapan = PenetapanModel::create([
                'kriteria_id' => 5, // kriteria_id is 5 for Kriteria 5
                'penetapan' => $request->penetapan,
                'dokumen' => $documentPaths['doc_penetapan'],
            ]);

            $pelaksanaan = PelaksanaanModel::create([
                'kriteria_id' => 5,
                'pelaksanaan' => $request->pelaksanaan,
                'dokumen' => $documentPaths['doc_pelaksanaan'],
            ]);
            
            $evaluasi = EvaluasiModel::create([
                'kriteria_id' => 5,
                'evaluasi' => $request->evaluasi,
                'dokumen' => $documentPaths['doc_evaluasi'],
            ]);

            $pengendalian = PengendalianModel::create([
                'kriteria_id' => 5,
                'pengendalian' => $request->pengendalian,
                'dokumen' => $documentPaths['doc_pengendalian'],
            ]);

            $peningkatan = PeningkatanModel::create([
                'kriteria_id' => 5,
                'peningkatan' => $request->peningkatan,
                'dokumen' => $documentPaths['doc_peningkatan'],
            ]);

            // Save detail
            DetailModel::create([
                'user_id' => auth()->user()->user_id,
                'kriteria_id' => 5,
                'penetapan_id' => $penetapan->penetapan_id,
                'pelaksanaan_id' => $pelaksanaan->pelaksanaan_id,
                'evaluasi_id' => $evaluasi->evaluasi_id,
                'pengendalian_id' => $pengendalian->pengendalian_id,
                'peningkatan_id' => $peningkatan->peningkatan_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update Kriteria status
            $kriteria = KriteriaModel::find(5);
            $kriteria->status_id = 1; 
            $kriteria->komentar = null; // Reset komentar jika ada
            $kriteria->save();
            // Commit the transaction

            DB::commit();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil disimpan!'
                ]);
            }

            return redirect('/kriteria5')->with('success', 'Data berhasil disimpan!');

        }catch (\Exception $e) {
            DB::rollBack();
            
            return back()
                ->with('error', 'Gagal menyimpan: '.$e->getMessage())
                ->withInput();
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }

        return redirect()->back()
            ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
            ->withInput();
                
    }

    public function detail(string $id)
    {
        $kriteria = KriteriaModel::with([
            'penetapan',
            'pelaksanaan',
            'evaluasi',
            'pengendalian',
            'peningkatan'
        ])->find($id);
        
        return view('kriteria5.detail', compact('kriteria'));
    }

    public function edit(string $id)
    {

        $breadcrumb = (object) [
            'title' => 'Edit Data Kriteria 5',
            'list' => 'Edit Kriteria 5',
        ];

        $page = (object) [
            'title' => 'Edit data kriteria 5',
        ];

        $activeMenu = 'kriteria5';

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
 
        return view('kriteria5.edit', compact('kriteria', 'breadcrumb', 'activeMenu', 'page'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'penetapan' => 'required',
            'pelaksanaan' => 'required',
            'evaluasi' => 'required',
            'pengendalian' => 'required',
            'peningkatan' => 'required',
            'doc_penetapan.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'doc_pelaksanaan.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'doc_evaluasi.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'doc_pengendalian.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'doc_peningkatan.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $kriteria = KriteriaModel::with([
                'penetapan', 'pelaksanaan', 'evaluasi', 'pengendalian', 'peningkatan'
            ])->findOrFail($id);

            $documentFields = [
                'doc_penetapan' => 'penetapan',
                'doc_pelaksanaan' => 'pelaksanaan',
                'doc_evaluasi' => 'evaluasi',
                'doc_pengendalian' => 'pengendalian',
                'doc_peningkatan' => 'peningkatan',
            ];
            $documentPaths = [];

            foreach ($documentFields as $field => $relasi) {
                $paths = [];
                if ($request->hasFile($field)) {
                    // Hapus file lama
                    $oldFiles = json_decode(optional($kriteria->$relasi)->dokumen ?? '[]');
                    foreach ($oldFiles as $oldFile) {
                        $storagePath = str_replace('storage/', 'public/', $oldFile);
                        if (Storage::exists($storagePath)) {
                            Storage::delete($storagePath);
                        }
                    }
                    // Simpan file baru
                    foreach ($request->file($field) as $file) {
                        $path = $file->store("public/documents/kriteria5/{$relasi}");
                        $paths[] = str_replace('public/', 'storage/', $path);
                    }
                    $documentPaths[$field] = !empty($paths) ? json_encode($paths) : null;
                } else {
                    // Pakai dokumen lama jika tidak upload baru
                    $documentPaths[$field] = optional($kriteria->$relasi)->dokumen;
                }
            }

            // Update relasi
            if ($kriteria->penetapan) {
                $kriteria->penetapan->update([
                    'penetapan' => $request->penetapan,
                    'dokumen' => $documentPaths['doc_penetapan'],
                ]);
            }
            if ($kriteria->pelaksanaan) {
                $kriteria->pelaksanaan->update([
                    'pelaksanaan' => $request->pelaksanaan,
                    'dokumen' => $documentPaths['doc_pelaksanaan'],
                ]);
            }
            if ($kriteria->evaluasi) {
                $kriteria->evaluasi->update([
                    'evaluasi' => $request->evaluasi,
                    'dokumen' => $documentPaths['doc_evaluasi'],
                ]);
            }
            if ($kriteria->pengendalian) {
                $kriteria->pengendalian->update([
                    'pengendalian' => $request->pengendalian,
                    'dokumen' => $documentPaths['doc_pengendalian'],
                ]);
            }
            if ($kriteria->peningkatan) {
                $kriteria->peningkatan->update([
                    'peningkatan' => $request->peningkatan,
                    'dokumen' => $documentPaths['doc_peningkatan'],
                ]);
            }

            $kriteria->status_id = 1; 
            $kriteria->komentar = null; // Reset komentar jika ada
            $kriteria->save();

            DB::commit();

            return redirect('/kriteria5')->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal update: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $kriteria = KriteriaModel::with([
                'penetapan', 'pelaksanaan', 'evaluasi', 'pengendalian', 'peningkatan'
            ])->findOrFail($id);

            // Hapus detail jika ada
            if ($kriteria->detail) {
                $kriteria->detail->delete();
            }

            // Hapus file dokumen pada setiap relasi jika ada
            $relasiList = ['penetapan', 'pelaksanaan', 'evaluasi', 'pengendalian', 'peningkatan'];
            foreach ($relasiList as $relasi) {
                $relasiData = $kriteria->$relasi;
                if ($relasiData) {
                    // Hapus file dokumen jika ada
                    if ($relasiData->dokumen) {
                        $files = json_decode($relasiData->dokumen, true) ?? [];
                        foreach ($files as $file) {
                            $storagePath = str_replace('storage/', 'public/', $file);
                            if (Storage::exists($storagePath)) {
                                Storage::delete($storagePath);
                            }
                        }
                    }
                    // Hapus data relasi
                    $relasiData->delete();
                }
            }

            // Update status_id dan komentar menjadi null
            $kriteria->status_id = null;
            $kriteria->komentar = null;
            $kriteria->save();

            DB::commit();
            return redirect('/kriteria5')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/kriteria5')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

}
