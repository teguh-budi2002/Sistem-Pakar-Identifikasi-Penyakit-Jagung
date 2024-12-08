<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatHasilDiagnosa extends Model
{
    use HasFactory;

    protected $table = 'riwayat_hasil_diagnosa';
    protected $guarded = ['id'];
}
