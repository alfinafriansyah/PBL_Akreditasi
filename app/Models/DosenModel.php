<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    use HasFactory;

    protected $table = 'data_dosen';
    protected $primaryKey = 'dosen_id';
    protected $fillable = [
        'dosen_id',
        'nip',
        'nama',
        'created_at',
        'updated_at',
    ];
    public function User()
    {
        return $this->hasMany(UserModel::class, 'dosen_id', 'dosen_id');
    }

}
