<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\mapel;
use App\Models\siswa;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'siswa' => siswa::count(),
            // 'guru' => guru::count(),
            // 'mapel' => mapel::count(),
        ]);
    }
}
