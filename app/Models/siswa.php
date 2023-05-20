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
    public function haveAlamat()
    {
        return $this->hasOne(alamat::class, 'nis', 'nis');
    }

    public function haveOrangtuaWali()
    {
        return $this->hasOne(orangtua_wali::class, 'nis', 'nis');
    }

    public function havePendidikanSebelum()
    {
        return $this->hasOne(pendidikan_sebelum::class, 'nis', 'nis');
    }

    public function haveKesehatan()
    {
        return $this->hasOne(kesehatan::class, 'nis', 'nis');
    }

    public function getTahunAjaran()
    {
        return $this->belongsTo(tahunAjaran::class, 'kode_tahun_ajaran', 'kode_tahun_ajaran');
    }
}
