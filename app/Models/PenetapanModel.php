<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenetapanModel extends Model
{
    use HasFactory;

    protected $table = 'penetapan';
    protected $primaryKey = 'penetapan_id';
    protected $fillable = ['kriteria_id', 'penetapan', 'dokumen', 'created_at', 'updated_at'];

    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailModel::class, 'penetapan_id', 'penetapan_id');
    }
}
