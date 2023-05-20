<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahunAjaran extends Model
{
    use HasFactory;
    protected $table = 'tahun_ajaran';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_tahun_ajaran';
    }


    // ? untuk kode otomatis

    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(
    //         function ($model) {

    //             $model->kode_tahun_ajaran = 'KTA-' . rand(1000, 9999);
    //         }
    //     );
    // }

    public function hasSiswa()
    {
        return $this->hasMany(siswa::class, 'kode_tahun_ajaran', 'kode_tahun_ajaran');
    }
}
