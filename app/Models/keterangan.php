<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keterangan extends Model
{
    use HasFactory;
    protected $table = 'keterangan';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_keterangan';
    }


    // ? untuk kode otomatis

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {

                $model->kode_keterangan = 'KKT-' . rand(100000, 999999);
            }
        );
    }
}
