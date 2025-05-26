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
use Illuminate\Support\Facades\Validator;

class Kriteria1Controller extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Kriteria 1',
            'list' => 'Kriteria 1',
        ];

        $page = (object) [
            'title' => 'Daftar kriteria yang tersimpan',
        ];

        $activeMenu = 'kriteria1';

        $status = StatusModel::all();
 
        return view('kriteria1.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'page' => $page, 'status' => $status]);
    }

    public function list(Request $request)
    {
        $kriterias = KriteriaModel::select('kriteria_id', 'kriteria_kode', 'kriteria_nama', 'status_id', 'komentar')
            ->with('status')
            ->where('kriteria_kode', 'KRT1');

        if ($request->status) {
            $kriterias->where('status_id', $request->status);
        }

        return DataTables::of($kriterias)
            // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kriteria) { // Menambahkan kolom aksi
                // $btn = '<a href="'.url('/kriteria/' . $kriteria->kriteria_id).'" class="btn btn-info btn-sm">Detail</a> ';
                // $btn .= '<a href="'.url('/kriteria/' . $kriteria->kriteria_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="'.url('/kriteria/'.$kriteria->kriteria_id).'">'
                //     . csrf_field() . method_field('DELETE') .
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                
                $btn = '<button onclick="modalAction(\'' . url('/kriteria/' . $kriteria->kriteria_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
 
                $btn .= '<button onclick="modalAction(\'' . url('/kriteria/' . $kriteria->kriteria_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';

                $btn .= '<button onclick="modalAction(\'' . url('/kriteria/' . $kriteria->kriteria_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                
                return $btn;
            })
            ->rawColumns(['aksi']) // Memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data Kriteria 1',
            'list' => 'Tambah Kriteria 1',
        ];

        $page = (object) [
            'title' => 'Tambah data kriteria 1',
        ];

        $activeMenu = 'kriteria1';
 
        return view('kriteria1.create', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'page' => $page]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'penetapan' => 'required',
            'pelaksanaan' => 'required',
            'evaluasi' => 'required',
            'pengendalian' => 'required',
            'peningkatan' => 'required',
            'doc_penetapan.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:2048',
            'doc_pelaksanaan.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:2048',
            'doc_evaluasi.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:2048',
            'doc_pengendalian.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:2048',
            'doc_peningkatan.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:2048',
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
                        $path = $file->store("public/documents/kriteria1/{$folder}");
                        $paths[] = str_replace('public/', 'storage/', $path);
                    }
                }
                $documentPaths[$field] = !empty($paths) ? json_encode($paths) : null;
            }

            // Save to database
            $penetapan = PenetapanModel::create([
                'kriteria_id' => 1, // kriteria_id is 1 for Kriteria 1
                'penetapan' => $request->penetapan,
                'dokumen' => $documentPaths['doc_penetapan'],
            ]);

            $pelaksanaan = PelaksanaanModel::create([
                'kriteria_id' => 1,
                'pelaksanaan' => $request->pelaksanaan,
                'dokumen' => $documentPaths['doc_pelaksanaan'],
            ]);
            
            $evaluasi = EvaluasiModel::create([
                'kriteria_id' => 1,
                'evaluasi' => $request->evaluasi,
                'dokumen' => $documentPaths['doc_evaluasi'],
            ]);

            $pengendalian = PengendalianModel::create([
                'kriteria_id' => 1,
                'pengendalian' => $request->pengendalian,
                'dokumen' => $documentPaths['doc_pengendalian'],
            ]);

            $peningkatan = PeningkatanModel::create([
                'kriteria_id' => 1,
                'peningkatan' => $request->peningkatan,
                'dokumen' => $documentPaths['doc_peningkatan'],
            ]);

            // Save detail
            DetailModel::create([
                'user_id' => 1,
                'kriteria_id' => auth()->user()->user_id,
                'penetapan_id' => $penetapan->penetapan_id,
                'pelaksanaan_id' => $pelaksanaan->pelaksanaan_id,
                'evaluasi_id' => $evaluasi->evaluasi_id,
                'pengendalian_id' => $pengendalian->pengendalian_id,
                'peningkatan_id' => $peningkatan->peningkatan_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update Kriteria status
            $kriteria = KriteriaModel::find(1);
            $kriteria->status_id = 1; 
            $kriteria->save();
            // Commit the transaction

            DB::commit();

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil disimpan!'
                ]);
            }

            return redirect()->back()->with('success', 'Data berhasil disimpan!');

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
}
