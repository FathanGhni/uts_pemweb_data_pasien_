<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasienn extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pasien',
        'umur',
        'jenis_kelamin',
        'diagnosa',
        'waktu_kedatangan',
        'lama_kunjungan',
    ];

    public const JENIS_KELAMIN = [
        'laki-laki' => 'laki-laki',
        'perempuan' => 'perempuan',
    ];
}
