<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DosenController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Data Dosen',
            'list' => 'Data Dosen',
        ];

        $page = (object)[
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
                    // Link edit menggunakan route name sesuai web.php
                    $editUrl = route('admin.datadosen.edit', $row->dosen_id);

                    // Tombol Edit (panggil modalAction dengan URL edit)
                    $btn = '<button type="button" class="btn btn-sm btn-warning me-1" onclick="modalAction(\'' . $editUrl . '\')">';
                    $btn .= 'Edit</button> ';

                    // Tombol Hapus (pakai confirm simple lalu redirect ke route hapus)
                    $btn .= '<button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(' . $row->dosen_id . ')">Hapus</button>';
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

//    perhatikan function edit khususnya return view nya mau kemana
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
        $dosen = DosenModel::find($id);
        if (!$dosen) {
            return response()->json([
                'status' => false,
                'message' => 'Data dosen tidak ditemukan.'
            ], 404);
        }

        $dosen->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data dosen berhasil dihapus.'
        ]);
    }
    public function import()
    {
        return view('admin.importdatadosen');
    }

    public function import_ajax(Request $request)
    {
        if($request->ajax() || $request->wantsJson()) {
            $rules = [
                'file_datadosen' => ['required', 'mimes:xlsx', 'max:1024']
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $file = $request->file('file_datadosen');

            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(false);   //biar bisa akses format cell
            $spreadsheet = $reader->load($file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();

            $insert = [];
            $nipCount = 0;
            $errors = [];

            foreach ($sheet->getRowIterator() as $rowIndex => $row) {
                if ($rowIndex == 1) continue; // skip header

                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false);

                $cells = iterator_to_array($cellIterator);

                $nipRaw = $cells['A']->getFormattedValue(); // pakai formattedValue
                $nama   = $cells['B']->getValue();

                $nip = preg_replace('/\D/', '', $nipRaw); // buang karakter non-digit

                if (!empty($nip) && !empty($nama)) {
                    if (!preg_match('/^\d{18}$/', $nip)) {
                        $errors[] = "Baris $rowIndex: NIP tidak valid ($nip)";
                        continue;
                    }

                    $insert[] = [
                        'nip' => $nip,
                        'nama' => $nama,
                        'created_at' => now()
                    ];
                    $nipCount++;
                }
            }

            if (!empty($errors)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Beberapa baris gagal divalidasi:',
                    'errors' => $errors
                ]);
            }

            if ($nipCount < 1) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak ada baris valid ditemukan dalam file.'
                ]);
            }

            DosenModel::insertOrIgnore($insert);
            return response()->json([
                'status' => true,
                'message' => "$nipCount data dosen berhasil diimport."
            ]);
        }

        return redirect('/');
    }


}
