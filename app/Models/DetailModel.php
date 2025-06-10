<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailModel extends Model
{
    use HasFactory;

    protected $table = 'detail_kriteria';
    protected $primaryKey = 'detail_id';
    public $timestamps = True;

    protected $fillable = ['user_id', 'kriteria_id', 'penetapan_id', 'pelaksanaan_id', 'evaluasi_id', 'pengendalian_id', 'peningkatan_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function penetapan()
    {
        return $this->belongsTo(PenetapanModel::class, 'penetapan_id', 'penetapan_id');
    }

    public function pelaksanaan()
    {
        return $this->belongsTo(PelaksanaanModel::class, 'pelaksanaan_id', 'pelaksanaan_id');
    }

    public function evaluasi()
    {
        return $this->belongsTo(EvaluasiModel::class, 'evaluasi_id', 'evaluasi_id');
    }

    public function pengendalian()
    {
        return $this->belongsTo(PengendalianModel::class, 'pengendalian_id', 'pengendalian_id');
    }

    public function peningkatan()
    {
        return $this->belongsTo(PeningkatanModel::class, 'peningkatan_id', 'peningkatan_id');
    }

}
