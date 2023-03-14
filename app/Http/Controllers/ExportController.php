<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
     public function exportData()
     {
          $data = DB::table('siswa')
               ->select(
                    // siswa
                    'siswa.nis',
                    'siswa.nama_lengkap',
                    'siswa.nama_panggilan',
                    'siswa.agama',
                    'siswa.tempat_lahir',
                    'siswa.tanggal_lahir',
                    'siswa.kewarganegaraan',
                    'siswa.anak_ke',
                    'siswa.jumlah_saudara_kandung',
                    'siswa.jumlah_saudara_angkat',
                    'siswa.jumlah_saudara_tiri',
                    'siswa.yatim_piatu',
                    'siswa.bahasa',
                    'siswa.jenis_kelamin',
                    'siswa.no_telp',
                    // alamat
                    'alamat.jalan',
                    'alamat.rt_rw',
                    'alamat.desa',
                    'alamat.kecamatan',
                    'alamat.kabupaten',
                    'alamat.provinsi',
                    'alamat.kode_pos',
                    'alamat.tinggal_bersama',
                    'alamat.jarak_ke_sekolah',
                    // kesehatan
                    'kesehatan.golongan_darah',
                    'kesehatan.penyakit_pernah_diderita',
                    'kesehatan.kelainan_jasmani',
                    'kesehatan.tinggi_badan',
                    'kesehatan.berat_badan',
                    //
               )
               ->join('alamat', 'alamat.nis', '=', 'siswa.nis')
               ->join('kesehatan', 'kesehatan.nis', '=', 'siswa.nis')
               ->get()
               ->toArray();

          return Excel::download(new ExportSingleTable($data), 'filename.xlsx');
     }
}

class ExportSingleTable implements FromCollection, WithHeadings
{
     protected $data;

     public function __construct(array $data)
     {
          $this->data = $data;
     }

     public function headings(): array
     {
          return [
               'nis',
               'nama_lengkap',
               'nama_panggilan',
               'agama',
               'tempat_lahir',
               'tanggal_lahir',
               'kewarganegaraan',
               'anak_ke',
               'jumlah_saudara_kandung',
               'jumlah_saudara_angkat',
               'jumlah_saudara_tiri',
               'yatim_piatu',
               'bahasa',
               'jenis_kelamin',
               'no_telp',
               // alamat
               'jalan',
               'rt_rw',
               'desa',
               'kecamatan',
               'kabupaten',
               'provinsi',
               'kode_pos',
               'tinggal_bersama',
               'jarak_ke_sekolah',
               // kesehatan
               'golongan_darah',
               'penyakit_pernah_diderita',
               'kelainan_jasmani',
               'tinggi_badan',
               'berat_badan',
          ];
     }

     public function collection()
     {
          return collect($this->data);
     }
}
