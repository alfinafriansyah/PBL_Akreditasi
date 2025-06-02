<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengendalianModel extends Model
{
    use HasFactory;

    protected $table = 'pengendalian';
    protected $primaryKey = 'pengendalian_id';
    protected $fillable = ['kriteria_id', 'pengendalian', 'dokumen', 'created_at', 'updated_at'];
    
    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailModel::class, 'pengendalian_id', 'pengendalian_id');
    }
}
