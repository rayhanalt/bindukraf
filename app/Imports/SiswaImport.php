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
use Maatwebsite\Excel\Concerns\WithStartRow;

class SiswaImport implements ToCollection, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {

        Validator::make($rows->toArray(), [
            '0' => 'required|unique:siswa,nis|unique:users,username',
            '1' => 'required|unique:siswa,nisn',

        ])->validate();


        foreach ($rows as $row) {

            if (!is_numeric($row[6])) {
                return redirect('/siswa/create')->with('failed', 'Format tanggal belum diubah.'); // redirect ke halaman siswa dengan pesan error
            }

            $tanggal_lahir = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]));
            // dd(json_encode($tanggal_lahir));



            siswa::create([
                'nis' => $row[0] ?? '',
                'nisn' => $row[1] ?? '',
                'nama_lengkap' => $row[2] ?? '',
                'nama_panggilan' => $row[3] ?? '',
                'agama' => $row[4] ?? '',
                'tempat_lahir' => $row[5] ?? '',
                'tanggal_lahir' => $tanggal_lahir ?? '',
                'kewarganegaraan' => $row[7] ?? '',
                'anak_ke' => $row[8] ?? null,
                'jumlah_saudara_kandung' => $row[9] ?? null,
                'jumlah_saudara_angkat' => $row[10] ?? null,
                'jumlah_saudara_tiri' => $row[11] ?? null,
                'yatim_piatu' => $row[12] ?? '',
                'bahasa' => $row[13] ?? '',
                'jenis_kelamin' => $row[14] ?? '',
                'alamat' => $row[0] ?? '',
                'no_telp' => $row[15] ?? '',
            ]);
            alamat::create([
                'nis' => $row[0] ?? '',
                'jalan' => $row[16] ?? '',
                'rt_rw' => $row[17] ?? '',
                'desa' => $row[18] ?? '',
                'kecamatan' => $row[19] ?? '',
                'kabupaten' => $row[20] ?? '',
                'provinsi' => $row[21] ?? '',
                'kode_pos' => $row[22] ?? '',
                'tinggal_bersama' => $row[23] ?? '',
                'jarak_ke_sekolah' => $row[24] ?? null,
            ]);
            kesehatan::create([
                'nis' => $row[0] ?? '',
                'golongan_darah' => $row[25] ?? null,
                'penyakit_pernah_diderita' => $row[26] ?? null,
                'kelainan_jasmani' => $row[27] ?? null,
                'tinggi_badan' => $row[28] ?? null,
                'berat_badan' => $row[29] ?? null,
            ]);

            // create ayah
            orangtua_wali::create([
                'nis' => $row[0] ?? '',
                'nama' => $row[30] ?? null,
                'agama' => $row[31] ?? null,
                'kewarganegaraan' => $row[32] ?? null,
                'pendidikan_terakhir' => $row[33] ?? null,
                'pekerjaan' => $row[34] ?? null,
                'penghasilan' => $row[35] ?? null,
                'no_telp' => $row[36] ?? null,
                'keadaan' => $row[37] ?? null,
                'status' => 'ayah'
            ]);

            // create ibu
            orangtua_wali::create([
                'nis' => $row[0] ?? '',
                'nama' => $row[38] ?? null,
                'agama' => $row[39] ?? null,
                'kewarganegaraan' => $row[40] ?? null,
                'pendidikan_terakhir' => $row[41] ?? null,
                'pekerjaan' => $row[42] ?? null,
                'penghasilan' => $row[43] ?? null,
                'no_telp' => $row[44] ?? null,
                'keadaan' => $row[45] ?? null,
                'status' => 'ibu'
            ]);

            // create wali
            orangtua_wali::create([
                'nis' => $row[0] ?? '',
                'nama' => $row[46] ?? null,
                'agama' => $row[47] ?? null,
                'kewarganegaraan' => $row[48] ?? null,
                'pendidikan_terakhir' => $row[49] ?? null,
                'pekerjaan' => $row[50] ?? null,
                'penghasilan' => $row[51] ?? null,
                'no_telp' => $row[52] ?? null,
                'keadaan' => $row[53] ?? null,
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
