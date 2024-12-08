<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';
    protected $guarded = ['id'];

    public function gejala()
    {
        return $this->hasMany(Gejala::class);
    }

    public function solusi()
    {
        return $this->hasOne(SolusiPenyakit::class);
    }
}
