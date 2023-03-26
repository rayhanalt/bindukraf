<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bidang;
use App\Models\guru;
use App\Models\jenis_ujian;
use App\Models\kelas;
use App\Models\mapel;
use App\Models\Pegawai;
use App\Models\siswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Bidang::create([

        //     "nama_bidang" => 'Front End',
        // ]);
        // Bidang::create([

        //     "nama_bidang" => 'Back End',
        // ]);
        // Bidang::create([

        //     "nama_bidang" => 'Full Stack',
        // ]);
        // Bidang::create([

        //     "nama_bidang" => 'Data Analis',
        // ]);

        User::create([
            'username' => 'raafi',
            'jabatan' => 'admin',
            'password' => bcrypt('admin'),

        ]);

        // User::create([
        //     'username' => '2',
        //     'jabatan' => 'guru',
        //     'password' => bcrypt('guru'),

        // ]);
        // User::create([
        //     'username' => '21',
        //     'jabatan' => 'guru',
        //     'password' => bcrypt('guru'),

        // ]);

        // User::create([
        //     'username' => '3',
        //     'jabatan' => 'siswa',
        //     'password' => bcrypt('siswa'),

        // ]);

        // User::create([
        //     'username' => '31',
        //     'jabatan' => 'siswa',
        //     'password' => bcrypt('siswa'),

        // ]);


        // guru::create([
        //     'nip' => '2',
        //     'nama_guru' => 'Subkhi',
        //     'kode_mapel' => 'KTA-200',

        // ]);
        // guru::create([
        //     'nip' => '21',
        //     'nama_guru' => 'Raafi',
        //     'kode_mapel' => 'KTA-20',

        // ]);

        // siswa::create([
        //     'nis' => '3',
        //     'nama_lengkap' => 'Qomar Al Akhmar',
        //     'nama_panggilan' => 'Qomar',
        //     'tempat_lahir' => 'Cirebon',
        //     'tanggal_lahir' => '2000-01-01',
        //     'jenis_kelamin' => 'L',
        //     'alamat' => 'Kamboja',
        //     'no_telp' => '08429241294',

        // ]);

        // siswa::create([
        //     'nis' => '31',
        //     'nama_lengkap' => 'Samid Al Akhmar',
        //     'nama_panggilan' => 'Samid',
        //     'tempat_lahir' => 'Cirebon',
        //     'tanggal_lahir' => '2000-04-01',
        //     'jenis_kelamin' => 'L',
        //     'alamat' => 'Gunung Kelud',
        //     'no_telp' => '08492451294',

        // ]);

        jenis_ujian::create([
            'jenis_ujian' => 'Ulangan 1'
        ]);
        jenis_ujian::create([
            'jenis_ujian' => 'Ulangan 2'
        ]);
        jenis_ujian::create([
            'jenis_ujian' => 'Ulangan 3'
        ]);
        jenis_ujian::create([
            'jenis_ujian' => 'Ulangan 4'
        ]);
        jenis_ujian::create([
            'jenis_ujian' => 'PAS'
        ]);
        jenis_ujian::create([
            'jenis_ujian' => 'PTS'
        ]);


        kelas::create([
            'nama_kelas' => 'X IPA 1',
            'kapasitas' => '30',
            'nip' => '21',
        ]);
        kelas::create([
            'nama_kelas' => 'X IPS 1',
            'kapasitas' => '34',
            'nip' => '2',
        ]);


        mapel::create([
            'nama_mapel' => 'Matematika',
        ]);
        mapel::create([
            'nama_mapel' => 'Bahasa Indonesia',
        ]);
        mapel::create([
            'nama_mapel' => 'Bahasa Inggris',
        ]);
        mapel::create([
            'nama_mapel' => 'IPA',
        ]);
    }
}
