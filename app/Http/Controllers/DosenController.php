<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DosenController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Dosen',
            'list' => 'Data Dosen',
        ];

        $page = (object) [
            'title' => 'Daftar Dosen yang tersimpan',
        ];

        $activeMenu = 'data_dosen';

        return view('admin.datadosen', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $dosen = DosenModel::select('dosen_id', 'nip', 'nama');

            return DataTables::of($dosen)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    $btn = '<button class="btn btn-sm btn-warning me-1" onclick="modalAction(`' . url("datadosen/{$row->dosen_id}/edit_ajax") . '`)">Edit</button>';
                    $btn .= '<button class="btn btn-sm btn-danger" onclick="confirmDelete(' . $row->dosen_id . ')">Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('admin.dosen_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:3|max:100',
            'nip' => 'required|numeric|digits_between:8,20|unique:data_dosen,nip',
        ], [
            'nip.unique' => 'NIP sudah terdaftar',
            'nip.digits_between' => 'NIP harus antara 8 sampai 20 digit'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            DosenModel::create([
                'nip' => $request->nip,
                'nama' => $request->nama,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Data dosen berhasil disimpan.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit_ajax($id)
    {
        $dosen = DosenModel::find($id);
        if (!$dosen) {
            return "<div class='alert alert-danger'>Data dosen tidak ditemukan</div>";
        }

        return view('admin.dosen_edit', compact('dosen'));
    }

    public function update_ajax(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:3|max:100',
            'nip' => 'required|numeric|digits_between:8,20|unique:data_dosen,nip,' . $id . ',dosen_id',
        ], [
            'nip.unique' => 'NIP sudah terdaftar',
            'nip.digits_between' => 'NIP harus antara 8 sampai 20 digit'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $dosen = DosenModel::find($id);
            if (!$dosen) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data dosen tidak ditemukan.'
                ], 404);
            }

            $dosen->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Data dosen berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function delete_ajax($id)
    {
        try {
            DB::beginTransaction();

            $dosen = DosenModel::findOrFail($id);
            $dosen->delete();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Data dosen berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage()
            ], 500);
        }
    }
}
