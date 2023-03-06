<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_kelas';
    }


    // ? untuk kode otomatis

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {

                $model->kode_kelas = 'KK-' . rand(100000, 999999);
            }
        );
    }
}
