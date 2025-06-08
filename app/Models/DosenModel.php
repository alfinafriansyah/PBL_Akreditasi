<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'data_dosen';
    protected $primaryKey = 'dosen_id';
    protected $fillable = [
        'dosen_id',
        'nip',
        'nama',
    ];
    public function user()
    {
        return $this->hasOne(UserModel::class, 'dosen_id', 'dosen_id');
    }

}
