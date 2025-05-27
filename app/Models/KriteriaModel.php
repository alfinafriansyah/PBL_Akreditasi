<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'kriteria_id';
    protected $fillable = ['kriteria_kode', 'status_id', 'komentar', 'created_at', 'updated_at'];

    public function status()
    {
        return $this->belongsTo(StatusModel::class, 'status_id', 'status_id');
    }

    public function penetapan()
    {
        return $this->hasOne(PenetapanModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function pelaksanaan()
    {
        return $this->hasOne(PelaksanaanModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function evaluasi()
    {
        return $this->hasOne(EvaluasiModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function pengendalian()
    {
        return $this->hasOne(PengendalianModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function peningkatan()
    {
        return $this->hasOne(PeningkatanModel::class, 'kriteria_id', 'kriteria_id');
    }
}
