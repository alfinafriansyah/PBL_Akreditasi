<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusModel extends Model
{
    use HasFactory;

    protected $table = 'status';
    protected $primaryKey = 'status_id';
    protected $fillable = ['status_kode', 'keterangan', 'created_at', 'updated_at'];

    public function kriteria()
    {
        return $this->hasMany(KriteriaModel::class, 'status_id', 'status_id');
    }
}
