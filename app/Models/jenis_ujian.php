<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_ujian extends Model
{
    use HasFactory;
    protected $table = 'jenis_ujian';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_jenis_ujian';
    }


    // ? untuk kode otomatis

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {

                $model->kode_jenis_ujian = 'KJU-' . rand(100000, 999999);
            }
        );
    }

    // ? untuk relasi

    // HasMany
    public function haveNilai()
    {
        return $this->hasMany(nilai::class, 'kode_jenis_ujian', 'kode_jenis_ujian');
    }
}
