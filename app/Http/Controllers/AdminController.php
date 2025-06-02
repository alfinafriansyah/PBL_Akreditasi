<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'list' => 'Dashboard',
            'title' => 'Dashboard'
        ];

        $activeMenu = 'dashboard';

        // Hitung total user yang update_at hari ini
        $todaysUserEdit = UserModel::whereDate('updated_at', Carbon::today())->count();

        // Hitung total user dan dosen
        $totalUser = UserModel::count('user_id');
        $totalDatadosen = DosenModel::count('dosen_id');

        // Ambil semua user yang pernah diupdate (updated_at ≠ created_at) yakni data saat admin update ntar muncul di tabel nya itu
        $updatedUsers  = UserModel::with(['dosen', 'role'])
            ->whereNotNull('updated_at')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'breadcrumb',
            'activeMenu',
            'todaysUserEdit', //-> ini kita masukkan untuk ntar di panggil oleh table view di dashboard
            'totalUser',
            'totalDatadosen',
            'updatedUsers'
        ));
    }

    public function edit_ajax(string $id)
    {
        $user = UserModel::find($id);
        $dosen = DosenModel::select('dosen_id', 'nama')->get();
        $role = RoleModel::select('role_id', 'role_nama')->get();

        return view('Admin.edit_ajax', ['user' => $user, 'dosen' => $dosen, 'role' => $role]);
    }

    public function update_ajax(Request $request, $id)
    {
        $rules = [
            'dosen_id' => 'required|string|max:100',
            'password' => 'nullable|string|min:5',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => false,
                'message'  => 'Validasi gagal',
                'msgField' => $validator->errors()
            ], 422);
        }

        $user = UserModel::find($id);
        if (!$user) {
            return response()->json([
                'status'  => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data = ['dosen_id' => $request->dosen_id];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'status'  => true,
            'message' => 'Data berhasil diupdate'
        ]);
    }

    public function show_ajax(string $id)
    {
        $user = UserModel::find($id);
        return view('Admin.show_ajax', ['user' => $user]);
    }

    public function akunpengguna(Request $request)
    {
        $breadcrumb = (object)[
            'list' => 'Akun Pengguna',
            'title' => 'Kelola Akun Pengguna'
        ];

        $activeMenu = 'KelolaAkunPengguna';

        $roles = RoleModel::all();

        $query = UserModel::with('dosen', 'role')
            ->where('username', '!=', 'admin')
            ->where('role_id', '!=', 10);

        if ($request->filled('role_id')) {
            $query->where('role_id', $request->role_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('dosen', function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
            });
        }

        $users = $query->paginate(10)->withQueryString();

        return view('admin.akunpengguna', compact('breadcrumb', 'activeMenu', 'users', 'roles'));
    }

}
