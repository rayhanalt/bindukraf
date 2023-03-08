<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_mapel';
    }


    // ? untuk kode otomatis

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {

                $model->kode_mapel = 'KMA-' . rand(100000, 999999);
            }
        );
    }
}
