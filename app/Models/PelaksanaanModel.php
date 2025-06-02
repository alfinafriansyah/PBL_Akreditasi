<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaksanaanModel extends Model
{
    use HasFactory;

    protected $table = 'pelaksanaan';
    protected $primaryKey = 'pelaksanaan_id';
    protected $fillable = ['kriteria_id', 'pelaksanaan', 'dokumen', 'created_at', 'updated_at'];
    
    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailModel::class, 'pelaksanaan_id', 'pelaksanaan_id');
    }
}
