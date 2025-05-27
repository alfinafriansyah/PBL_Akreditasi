<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function edit_ajax(string $id)
    {
        $user = UserModel::find($id);
        $dosen = DosenModel::select('dosen_id', 'nama')->get();
        $role = RoleModel::select('role_id', 'role_nama')->get();

        return view('Admin.edit_ajax', ['user' => $user, 'dosen' => $dosen, 'role' => $role]);
    }

    public function update_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'username' => 'readonly|string|min:10|max:10|unique:user,username,' . $id . ',user_id',
                'dosen_id' => 'required|string|max:100', // nama user harus diisi, berupa string, dan maksimal 100 karakter  
                'role_id' => 'readonly|string|max:100',
                'password' => 'required|string|min:5',
            ];
            // use Illuminate\Support\Facades\Validator; 
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,    // respon json, true: berhasil, false: gagal 
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors()  // menunjukkan field mana yang error 
                ]);
            }

            $check = UserModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }
    public function show_ajax(string $id)
    {
        $user = UserModel::find($id);
        return view('Admin.show_ajax', ['user' => $user]);
    }
}
