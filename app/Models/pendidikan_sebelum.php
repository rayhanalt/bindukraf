<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendidikan_sebelum extends Model
{
     use HasFactory;
     protected $table = 'pendidikan_sebelum';
     protected $guarded = ['id'];


     //  ? untuk relasi
     public function getSiswa()
     {
          return $this->belongsTo(siswa::class, 'nis', 'nis');
     }
}
