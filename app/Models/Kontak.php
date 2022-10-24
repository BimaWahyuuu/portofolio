<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Jenis_Kontak;

class Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'jenis_kontak_id',
        'deskripsi'
    ];
    protected $table = 'jenis_kontak_siswa';
    public function siswa(){
        return $this->belongsTo( Siswa::class, 'siswa_id', 'id');
    }
    public function jenis_kontak(){
        return $this->belongsTo( Jenis_Kontak::class , 'jenis_id', 'id');
    }
}