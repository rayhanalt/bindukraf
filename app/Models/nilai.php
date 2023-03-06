<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode_nilai';
    }


    // ? untuk kode otomatis

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($model) {

                $model->kode_nilai = 'KN-' . rand(100000, 999999);
            }
        );
    }
}
