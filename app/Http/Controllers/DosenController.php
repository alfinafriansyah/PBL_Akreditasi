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

        return view('Admin.datadosen', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $dosen = DosenModel::select('dosen_id', 'nip', 'nama');

            return DataTables::of($dosen)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    $btn = '<button class="btn btn-sm btn-warning me-1" onclick="modalAction(\'' . url("datadosen/{$row->dosen_id}/editdosen_ajax") . '\')">Edit</button>';
                    $btn .= '<button class="btn btn-sm btn-danger" onclick="confirmDelete(' . $row->dosen_id . ')">Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('Admin.createdosen_ajax');
    }

    public function store(Request $request)
    {
        // Handle JSON request
        if ($request->isJson()) {
            $data = $request->json()->all();
        } else {
            $data = $request->all();
        }

        $validator = Validator::make($data, [
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
                'nip' => $data['nip'],
                'nama' => $data['nama'],
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

    public function edit($id)
    {
        $dosen = DosenModel::find($id);
        return view('Admin.editdosen_ajax', compact('dosen'));
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
                DB::rollBack(); // rollback tambahan agar aman
                return response()->json([
                    'status' => false,
                    'message' => 'Data dosen tidak ditemukan.'
                ], 404);
            }

            $dosen->update([
                'nama' => $request->input('nama'),
                'nip' => $request->input('nip'),
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
