<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class UserModel extends Authenticable
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = true;

    const CREATED_AT = null;
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'dosen_id',
        'role_id',
        'username',
        'password',
    ];

    protected $hidden = ['password']; //agar jangan di tampilkan saat select

    protected $casts = ['password' => 'hashed']; //casting password agar otomatis di hash

    public function dosen()
    {
        return $this->belongsTo(DosenModel::class, 'dosen_id', 'dosen_id');
    }
    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'role_id', 'role_id');
    }
}
