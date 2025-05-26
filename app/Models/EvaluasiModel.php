<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiModel extends Model
{
    use HasFactory;

    protected $table = 'evaluasi';
    protected $primaryKey = 'evaluasi_id';
    protected $fillable = ['kriteria_id', 'evaluasi', 'dokumen', 'created_at', 'updated_at'];
    
    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailModel::class, 'evaluasi_id', 'evaluasi_id');
    }
}
