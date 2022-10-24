<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kontak;

class Jenis_Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_kontak'
    ];
    protected $table = 'jenis_kontak';
    public function Kontak(){
        return $this->hasMany(Kontak::class,'jenis_id');
    }
}
