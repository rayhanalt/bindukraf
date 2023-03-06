<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bidang;
use App\Models\guru;
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
            'username' => '1',
            'jabatan' => 'admin',
            'password' => bcrypt('admin'),

        ]);

        User::create([
            'username' => '2',
            'jabatan' => 'guru',
            'password' => bcrypt('guru'),

        ]);

        User::create([
            'username' => '3',
            'jabatan' => 'siswa',
            'password' => bcrypt('siswa'),

        ]);


        guru::create([
            'nip' => '2',
            'nama_guru' => 'Subkhi',
            'kode_mapel' => 'KTA-200',

        ]);
        siswa::create([
            'nis' => '3',
            'nama_lengkap' => 'Qomar Al Akhmar',
            'nama_panggilan' => 'Qomar ',
            'tempat_lahir' => 'Cirebon',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'L',
            'alamat' => 'DIsana',
            'no_telp' => '0849241294',

        ]);
        // Pegawai::create([
        //     'nip' => '12345',
        //     'nama' => 'Rayhan Althaf',
        //     'kode_bidang' => Bidang::inRandomOrder()->first()->kode_bidang,

        // ]);
        // Pegawai::create([
        //     'nip' => '123',
        //     'nama' => 'Qomar',
        //     'kode_bidang' => Bidang::inRandomOrder()->first()->kode_bidang,

        // ]);
        // Pegawai::create([
        //     'nip' => '1234',
        //     'nama' => 'Samidi',
        //     'kode_bidang' => Bidang::inRandomOrder()->first()->kode_bidang,

        // ]);
        // Customer::factory(10)->create();
        // Mobil::factory(10)->create();
        // Rental::factory(10)->create();
    }
}
