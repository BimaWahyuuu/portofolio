<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kontak;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jenis_kelamin',
        'email',
        'foto',
        'about'
    ];
    protected $table = 'siswa';
    // public function Kontak(){
    //     return $this->hasMany('App\Models\Kontak' , 'id_siswa');
    // }
    public function Kontak(){
        return $this->hasMany(Kontak::class,'siswa_id','id');
    }
    
    public function Project(){
        return $this->hasMany('App\Models\Project' , 'siswa_id');
    }
}