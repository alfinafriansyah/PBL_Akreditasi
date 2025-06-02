<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\DosenModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Http\Request;

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

        return view('admin.datadosen', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'page' => $page
        ]);
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

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $dosen = DosenModel::select('dosen_id', 'nip', 'nama');

            return DataTables::of($dosen)
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    $btn = '<button class="btn btn-sm btn-primary" onclick="editDosen('.$row->dosen_id.')">Edit</button> ';
                    $btn .= '<button class="btn btn-sm btn-danger" onclick="hapusDosen('.$row->dosen_id.')">Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function edit($id)
    {
        $dosen = DosenModel::find($id);
        
        if (!$dosen) {
            return response()->json([
                'status' => false,
                'message' => 'Data dosen tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $dosen
        ]);
    }

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string|min:3|max:100',
        'nip' => 'required|numeric|digits_between:8,20|unique:data_dosen,nip,'.$id.',dosen_id',
    ], [
        'nip.unique' => 'NIP sudah terdaftar',
        'nip.digits_between' => 'NIP harus antara 8 sampai 20 digit'
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }

    try {
        DB::beginTransaction();

        $dosen = DosenModel::find($id);
        if (!$dosen) {
            return redirect()->route('dosen.index')
                ->with('error', 'Data dosen tidak ditemukan');
        }

        $dosen->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
        ]);

        DB::commit();

        return redirect()->route('dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage())
            ->withInput();
    }
}

        public function destroy($id)
    {
        DB::beginTransaction();
        try {
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
