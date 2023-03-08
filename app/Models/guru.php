<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'nip';
    }



    //  ? untuk relasi
    public function haveKelas()
    {
        return $this->hasOne(kelas::class, 'nip', 'nip');
    }
}
