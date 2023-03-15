<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\siswa;
use App\Models\alamat;
use App\Models\kesehatan;
use App\Models\orangtua_wali;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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

        Validator::make($rows->toArray(), [
            '0' => 'required|unique:siswa,nis|unique:users,username',

        ])->validate();

        foreach ($rows as $row) {


            $tanggal_lahir = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]));;
            // dd(json_encode($tanggal_lahir));
            siswa::create([
                'nis' => $row[0] ?? '',
                'nama_lengkap' => $row[1] ?? '',
                'nama_panggilan' => $row[2] ?? '',
                'agama' => $row[3] ?? '',
                'tempat_lahir' => $row[4] ?? '',
                'tanggal_lahir' => $tanggal_lahir ?? '',
                'kewarganegaraan' => $row[6] ?? '',
                'anak_ke' => $row[7] ?? '',
                'jumlah_saudara_kandung' => $row[8] ?? '',
                'jumlah_saudara_angkat' => $row[9] ?? '',
                'jumlah_saudara_tiri' => $row[10] ?? '',
                'yatim_piatu' => $row[11] ?? '',
                'bahasa' => $row[12] ?? '',
                'jenis_kelamin' => $row[13] ?? '',
                'alamat' => $row[0] ?? '',
                'no_telp' => $row[14] ?? '',
            ]);
            alamat::create([
                'nis' => $row[0] ?? '',
                'jalan' => $row[15] ?? '',
                'rt_rw' => $row[16] ?? '',
                'desa' => $row[17] ?? '',
                'kecamatan' => $row[18] ?? '',
                'kabupaten' => $row[19] ?? '',
                'provinsi' => $row[20] ?? '',
                'kode_pos' => $row[21] ?? '',
                'tinggal_bersama' => $row[22] ?? '',
                'jarak_ke_sekolah' => $row[23] ?? '',
            ]);
            kesehatan::create([
                'nis' => $row[0] ?? '',
                'golongan_darah' => $row[24] ?? '',
                'penyakit_pernah_diderita' => $row[25] ?? '',
                'kelainan_jasmani' => $row[26] ?? '',
                'tinggi_badan' => $row[27] ?? '',
                'berat_badan' => $row[28] ?? '',
            ]);

            // create ayah
            orangtua_wali::create([
                'nis' => $row[0] ?? '',
                'nama' => $row[29] ?? '',
                'agama' => $row[30] ?? '',
                'kewarganegaraan' => $row[31] ?? '',
                'pendidikan_terakhir' => $row[32] ?? '',
                'pekerjaan' => $row[33] ?? '',
                'penghasilan' => $row[34] ?? '',
                'no_telp' => $row[35] ?? '',
                'keadaan' => $row[36] ?? '',
                'status' => 'ayah'
            ]);

            // create ibu
            orangtua_wali::create([
                'nis' => $row[0] ?? '',
                'nama' => $row[37] ?? '',
                'agama' => $row[38] ?? '',
                'kewarganegaraan' => $row[39] ?? '',
                'pendidikan_terakhir' => $row[40] ?? '',
                'pekerjaan' => $row[41] ?? '',
                'penghasilan' => $row[42] ?? '',
                'no_telp' => $row[43] ?? '',
                'keadaan' => $row[44] ?? '',
                'status' => 'ibu'
            ]);

            // create wali
            orangtua_wali::create([
                'nis' => $row[0] ?? '',
                'nama' => $row[45] ?? '',
                'agama' => $row[46] ?? '',
                'kewarganegaraan' => $row[47] ?? '',
                'pendidikan_terakhir' => $row[48] ?? '',
                'pekerjaan' => $row[49] ?? '',
                'penghasilan' => $row[50] ?? '',
                'no_telp' => $row[51] ?? '',
                'keadaan' => $row[52] ?? '',
                'status' => 'wali'
            ]);
            DB::table('users')->insert([
                'username' => $row[0] ?? '',
                'password' => bcrypt('12345') ?? '',
                'jabatan' => 'siswa',
            ]);
        }
    }
}
