<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahun_ajaran extends Model
{
    use HasFactory;
    protected $table = 'tahun_ajaran';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_tahun_ajaran';
    }


    // ? untuk kode otomatis

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {

                $model->kode_tahun_ajaran = 'KTA-' . rand(100000, 999999);
            }
        );
    }
}
