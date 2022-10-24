<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nama_projek',
        'deskripsi',
        'tanggal',
        'foto'
    ];
    protected $table = 'project';
}
