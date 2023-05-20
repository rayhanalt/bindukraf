<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\siswa;
use App\Models\alamat;
use App\Models\kesehatan;
use App\Models\orangtua_wali;
use App\Models\pendidikan_sebelum;
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
            '6' => 'required',

        ])->validate();


        foreach ($rows as $row) {

            if (is_numeric($row[31])) {
                // redirect ke halaman siswa dengan pesan error
                $row[31] = \Carbon\Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($row[31] - 2)->isoFormat('D MMMM Y');
            }
            if (is_numeric($row[6])) {
                // redirect ke halaman siswa dengan pesan error
                $row[6] = \Carbon\Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($row[6] - 2)->isoFormat('D MMMM Y');
            }
            if (is_numeric($row[39])) {
                // redirect ke halaman siswa dengan pesan error
                $row[39] = \Carbon\Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($row[39] - 2)->isoFormat('D MMMM Y');
            }

            // $tanggal_lahir = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]));
            // $tanggal_ijazah = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[31]));
            // $tanggal_diterima = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[39]));
            // dd(json_encode($row[6]));



            siswa::create([
                'nis' => $row[0] ?? '',
                'nisn' => $row[1] ?? '',
                'nama_lengkap' => $row[2] ?? '',
                'nama_panggilan' => $row[3] ?? '',
                'agama' => $row[4] ?? '',
                'tempat_lahir' => $row[5] ?? '',
                'tanggal_lahir' => $row[6] ?? '',
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
                'kode_tahun_ajaran' => $row[64] ?? '',
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

            pendidikan_sebelum::create([
                'nis' => $row[0] ?? '',
                'sekolah_asal' => $row[30] ?? null,
                'tanggal_ijazah' => $row[31] ?? null,
                'nomor_ijazah' => $row[32] ?? null,
                'lama_belajar' => $row[33] ?? null,
                'dari_sekolah' => $row[34] ?? null,
                'alasan' => $row[35] ?? null,
                'di_kelas' => $row[36] ?? null,
                'kelompok' => $row[37] ?? null,
                'jurusan' => $row[38] ?? null,
                'tanggal' => $row[39] ?? null,
            ]);

            // create ayah
            orangtua_wali::create([
                'nis' => $row[0] ?? '',
                'nama' => $row[40] ?? null,
                'agama' => $row[41] ?? null,
                'kewarganegaraan' => $row[42] ?? null,
                'pendidikan_terakhir' => $row[43] ?? null,
                'pekerjaan' => $row[44] ?? null,
                'penghasilan' => $row[45] ?? null,
                'no_telp' => $row[46] ?? null,
                'keadaan' => $row[47] ?? null,
                'status' => 'ayah'
            ]);

            // create ibu
            orangtua_wali::create([
                'nis' => $row[0] ?? '',
                'nama' => $row[48] ?? null,
                'agama' => $row[49] ?? null,
                'kewarganegaraan' => $row[50] ?? null,
                'pendidikan_terakhir' => $row[51] ?? null,
                'pekerjaan' => $row[52] ?? null,
                'penghasilan' => $row[53] ?? null,
                'no_telp' => $row[54] ?? null,
                'keadaan' => $row[55] ?? null,
                'status' => 'ibu'
            ]);

            // create wali
            orangtua_wali::create([
                'nis' => $row[0] ?? '',
                'nama' => $row[56] ?? null,
                'agama' => $row[57] ?? null,
                'kewarganegaraan' => $row[58] ?? null,
                'pendidikan_terakhir' => $row[59] ?? null,
                'pekerjaan' => $row[60] ?? null,
                'penghasilan' => $row[61] ?? null,
                'no_telp' => $row[62] ?? null,
                'keadaan' => $row[63] ?? null,
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
