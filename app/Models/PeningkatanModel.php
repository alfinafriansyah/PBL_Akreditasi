<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeningkatanModel extends Model
{
    use HasFactory;

    protected $table = 'peningkatan';
    protected $primaryKey = 'peningkatan_id';
    protected $fillable = ['kriteria_id', 'peningkatan', 'dokumen', 'created_at', 'updated_at'];
    
    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }

    public function detail()
    {
        return $this->hasMany(DetailModel::class, 'peningkatan_id', 'peningkatan_id');
    }
}
