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

        $user = UserModel::all();

        return view('admin.datadosen', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'page' => $page, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:3|max:100',
            'NIP' => 'required|numeric|digits_between:8,20|unique:data_dosen,NIP',
        ], [
            'NIP.unique' => 'NIP sudah terdaftar',
            'NIP.digits_between' => 'NIP harus antara 8 sampai 20 digit'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'msgField' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            DosenModel::create([
                'NIP' => $request->NIP,
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
            // Ambil data dari model sesuai field tabel
            $dosen = DosenModel::select('dosen_id', 'nip', 'nama');

            return DataTables::of($dosen)
                ->addIndexColumn()
                ->addColumn('nip', fn($row) => $row->nip)
                ->addColumn('nama', fn($row) => $row->nama)
                ->addColumn('aksi', function ($row) {
                    return '
                    <button class="btn btn-sm btn-primary" onclick="editDosen(' . $row->dosen_id . ')">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="hapusDosen(' . $row->dosen_id . ')">Hapus</button>
                ';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }


    //     $dosens = DosenModel::select('dosen_id', 'dosen_nama', 'nip', 'role_nama')
    //         ->with('user');


    //     $users =

    //     if ($request->status) {
    //         $kriterias->where('status_id', $request->status);
    //     }
    //     return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->addColumn('aksi', function ($row) {
    //             $btn = '<button class="btn btn-sm btn-primary">Edit</button> ';
    //             $btn .= '<button class="btn btn-sm btn-danger">Hapus</button>';
    //             return $btn;
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    // }

}
