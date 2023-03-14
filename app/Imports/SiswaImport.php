<?php

namespace App\Imports;

use App\Models\siswa;
use App\Models\alamat;
use App\Models\kesehatan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = siswa::create([
                'nis' => $row[0],
                'nama_lengkap' => $row[1],
                'nama_panggilan' => $row[2],
                'tempat_lahir' => $row[3],
                'tanggal_lahir' => $row[4],
                'kewarganegaraan' => $row[5],
                'anak_ke' => $row[6],
                'jumlah_saudara_kandung' => $row[7],
                'jumlah_saudara_angkat' => $row[8],
                'jumlah_saudara_tiri' => $row[9],
                'bahasa' => $row[10],
                'yatim_piatu' => $row[11],
                'agama' => $row[12],
                'jenis_kelamin' => $row[13],
                'alamat' => $row[14],
                'no_telp' => $row[15],
            ]);
            alamat::create([
                'nis' => $row[0],
                'jalan' => $row[16],
                'rt_rw' => $row[17],
                'desa' => $row[18],
                'kecamatan' => $row[19],
                'kabupaten' => $row[20],
                'provinsi' => $row[21],
                'kode_pos' => $row[22],
                'tinggal_bersama' => $row[23],
                'jarak_ke_sekolah' => $row[24],
            ]);
            kesehatan::create([
                'nis' => $row[0],
                'golongan_darah' => $row[25],
                'penyakit_pernah_diderita' => $row[26],
                'kelainan_jasmani' => $row[27],
                'tinggi_badan' => $row[28],
                'berat_badan' => $row[29],
            ]);

            // create ayah
            orangtua_wali::create([
                'nis' => $row[0],
                'nama' => $row[30],
                'agama' => $row[31],
                'kewarganegaraan' => $row[32],
                'pendidikan_terakhir' => $row[33],
                'pekerjaan' => $row[34],
                'penghasilan' => $row[35],
                'no_telp' => $row[36],
                'keadaan' => $row[37],
                'status' => 'ayah'
            ]);

            // create ibu
            orangtua_wali::create([
                'nis' => $row[0],
                'nama' => $row[38],
                'agama' => $row[39],
                'kewarganegaraan' => $row[40],
                'pendidikan_terakhir' => $row[41],
                'pekerjaan' => $row[42],
                'penghasilan' => $row[43],
                'no_telp' => $row[44],
                'keadaan' => $row[45],
                'status' => 'ibu'
            ]);

            // create wali
            orangtua_wali::create([
                'nis' => $row[0],
                'nama' => $row[46],
                'agama' => $row[47],
                'kewarganegaraan' => $row[48],
                'pendidikan_terakhir' => $row[49],
                'pekerjaan' => $row[50],
                'penghasilan' => $row[51],
                'no_telp' => $row[52],
                'keadaan' => $row[53],
                'status' => 'wali'
            ]);
            DB::table('users')->insert([
                'username' => $row[0],
                'password' => bcrypt('12345'),
                'jabatan' => 'siswa',
            ]);
        }
    }
}
