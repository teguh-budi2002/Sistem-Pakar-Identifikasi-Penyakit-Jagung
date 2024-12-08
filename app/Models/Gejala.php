<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';
    protected $guarded = ['id'];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id', 'id');
    }
}
