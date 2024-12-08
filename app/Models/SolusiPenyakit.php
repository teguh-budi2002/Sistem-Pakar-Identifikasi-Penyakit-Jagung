<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolusiPenyakit extends Model
{
    use HasFactory;

    protected $table = 'solusi_penyakit';
    protected $guarded = ['id'];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
