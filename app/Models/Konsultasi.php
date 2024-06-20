<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id_antrian',
        'nama_konsultasi',
        'nama_dokter',
        'tanggal',
        'waktu',
        'ruangan',
        'status',
        // Add other fields here as necessary
    ];
}
