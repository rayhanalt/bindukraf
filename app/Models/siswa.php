<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'nis';
    }



    //  ? untuk relasi
    // public function alternatif()
    // {
    //     return $this->hasMany(alternatif::class, 'kode_kategori', 'kode_kategori');
    // }
}
