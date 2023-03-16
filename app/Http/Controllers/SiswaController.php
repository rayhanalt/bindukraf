<?php

namespace App\Http\Controllers;

use App\Models\alamat;
use App\Models\kesehatan;
use App\Models\orangtua_wali;
use App\Models\siswa as ModelsSiswa;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->jabatan == 'admin') {
            return view('admin.siswa.index');
        }
        return redirect()->back()->with('error', 'Anda tidak memiliki hak akses.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->jabatan == 'admin') {
            return view('admin.siswa.create');
        }
        return redirect()->back()->with('error', 'Anda tidak memiliki hak akses.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->jabatan == 'admin') {
            $validasiSiswa = $request->validate([
                'nis' => 'required|numeric|unique:siswa,nis|unique:users,username',
                'nisn' => 'required|numeric|unique:siswa,nisn',
                'nama_lengkap' => 'required',
                'nama_panggilan' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'kewarganegaraan' => 'required',
                'anak_ke' => '',
                'jumlah_saudara_kandung' => '',
                'jumlah_saudara_angkat' => '',
                'jumlah_saudara_tiri' => '',
                'bahasa' => 'required',
                'yatim_piatu' => '',
                'agama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'numeric',
                'no_telp' => 'required',
            ]);

            $validasiSiswa['alamat'] = $request->nis;
            ModelsSiswa::create($validasiSiswa);

            $validasikesehatan = $request->validate([
                'nis' => 'required',
                'golongan_darah' => '',
                'penyakit_pernah_diderita' => '',
                'kelainan_jasmani' => '',
                'tinggi_badan' => '',
                'berat_badan' => '',
            ]);
            kesehatan::create($validasikesehatan);

            $validasialamat = $request->validate([
                'nis' => 'required',
                'jalan' => 'required',
                'rt_rw' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'kode_pos' => 'required',
                'tinggal_bersama' => 'required',
                'jarak_ke_sekolah' => '',

            ]);
            alamat::create($validasialamat);

            // create ayah
            orangtua_wali::create([
                'nis' => $request->nis,
                'nama' => $request->nama_ayah,
                'agama' => $request->agama_ayah,
                'kewarganegaraan' => $request->kewarganegaraan_ayah,
                'pendidikan_terakhir' => $request->pendidikan_terakhir_ayah,
                'pekerjaan' => $request->pekerjaan_ayah,
                'penghasilan' => $request->penghasilan_ayah,
                'no_telp' => $request->no_telp_ayah,
                'keadaan' => $request->keadaan_ayah,
                'status' => 'ayah'
            ]);

            // create ibu
            orangtua_wali::create([
                'nis' => $request->nis,
                'nama' => $request->nama_ibu,
                'agama' => $request->agama_ibu,
                'kewarganegaraan' => $request->kewarganegaraan_ibu,
                'pendidikan_terakhir' => $request->pendidikan_terakhir_ibu,
                'pekerjaan' => $request->pekerjaan_ibu,
                'penghasilan' => $request->penghasilan_ibu,
                'no_telp' => $request->no_telp_ibu,
                'keadaan' => $request->keadaan_ibu,
                'status' => 'ibu'
            ]);

            // create wali
            orangtua_wali::create([
                'nis' => $request->nis,
                'nama' => $request->nama_wali,
                'agama' => $request->agama_wali,
                'kewarganegaraan' => $request->kewarganegaraan_wali,
                'pendidikan_terakhir' => $request->pendidikan_terakhir_wali,
                'pekerjaan' => $request->pekerjaan_wali,
                'penghasilan' => $request->penghasilan_wali,
                'no_telp' => $request->no_telp_wali,
                'keadaan' => $request->keadaan_wali,
                'status' => 'wali'
            ]);

            DB::table('users')->insert([
                'username' => $validasiSiswa['nis'],
                'password' => bcrypt('12345'),
                'jabatan' => 'siswa',
            ]);

            return redirect('/siswa')->with('success', 'New Data has been added!')->withInput();
        }
        return redirect()->back()->with('error', 'Anda tidak memiliki hak akses.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsSiswa $siswa)
    {
        if (Auth::user()->jabatan == 'admin') {
            return view('admin.siswa.edit', [
                'item' => $siswa,
                'alamat' => $siswa->haveAlamat()->first(),
                'kesehatan' => $siswa->haveKesehatan()->first(),
                'ayah' => $siswa->haveOrangtuaWali()->where('status', 'ayah')->first(),
                'ibu' => $siswa->haveOrangtuaWali()->where('status', 'ibu')->first(),
                'wali' => $siswa->haveOrangtuaWali()->where('status', 'wali')->first(),
            ]);
        }
        return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk halaman Edit Pegawai Lain.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsSiswa $siswa)
    {
        $request->validate([
            'nis' => 'required',
            'nisn' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'anak_ke' => '',
            'jumlah_saudara_kandung' => '',
            'jumlah_saudara_angkat' => '',
            'jumlah_saudara_tiri' => '',
            'bahasa' => 'required',
            'yatim_piatu' => '',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'numeric',
            'no_telp' => 'required',
        ]);
        // validasi kesehatan
        $request->validate([
            'nis' => 'required',
            'golongan_darah' => '',
            'penyakit_pernah_diderita' => '',
            'kelainan_jasmani' => '',
            'tinggi_badan' => '',
            'berat_badan' => '',
        ]);
        // validasi alamat
        $request->validate([
            'nis' => 'required',
            'jalan' => 'required',
            'rt_rw' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'tinggal_bersama' => 'required',
            'jarak_ke_sekolah' => '',

        ]);

        if ($siswa->nis != $request->nis) {
            $request->validate([
                'nis' => 'unique:siswa,nis|unique:users,username',
            ]);
        }
        if ($siswa->nisn != $request->nisn) {
            $request->validate([
                'nisn' => 'unique:siswa,nisn',
            ]);
        }

        if ($request->password != null) {
            // update user
            DB::table('users')->where('username', '=', $siswa->nis)->update([
                'username' => $request->nis,
                'password' => bcrypt($request->password),
            ]);
            // update kesehatan
            DB::table('kesehatan')->where('nis', '=', $siswa->nis)->update([
                'nis' => $request->nis,
                'golongan_darah' => $request->golongan_darah,
                'penyakit_pernah_diderita' => $request->penyakit_pernah_diderita,
                'kelainan_jasmani' => $request->kelainan_jasmani,
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
            ]);
            // update alamat
            DB::table('alamat')->where('nis', '=', $siswa->nis)->update([
                'nis' => $request->nis,
                'jalan' => $request->jalan,
                'rt_rw' => $request->rt_rw,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'tinggal_bersama' => $request->tinggal_bersama,
                'jarak_ke_sekolah' => $request->jarak_ke_sekolah,
            ]);
            // update ibu
            DB::table('orangtua_wali')->where('nis', '=', $siswa->nis)->where('status', '=', 'ibu')->update([
                'nis' => $request->nis,
                'nama' => $request->nama_ibu,
                'agama' => $request->agama_ibu,
                'kewarganegaraan' => $request->kewarganegaraan_ibu,
                'pendidikan_terakhir' => $request->pendidikan_terakhir_ibu,
                'pekerjaan' => $request->pekerjaan_ibu,
                'penghasilan' => $request->penghasilan_ibu,
                'no_telp' => $request->no_telp_ibu,
                'keadaan' => $request->keadaan_ibu,
                'status' => 'ibu'
            ]);
            // update ayah
            DB::table('orangtua_wali')->where('nis', '=', $siswa->nis)->where('status', '=', 'ayah')->update([
                'nis' => $request->nis,
                'nama' => $request->nama_ayah,
                'agama' => $request->agama_ayah,
                'kewarganegaraan' => $request->kewarganegaraan_ayah,
                'pendidikan_terakhir' => $request->pendidikan_terakhir_ayah,
                'pekerjaan' => $request->pekerjaan_ayah,
                'penghasilan' => $request->penghasilan_ayah,
                'no_telp' => $request->no_telp_ayah,
                'keadaan' => $request->keadaan_ayah,
                'status' => 'ayah'
            ]);
            // update wali
            DB::table('orangtua_wali')->where('nis', '=', $siswa->nis)->where('status', '=', 'wali')->update([
                'nis' => $request->nis,
                'nama' => $request->nama_wali,
                'agama' => $request->agama_wali,
                'kewarganegaraan' => $request->kewarganegaraan_wali,
                'pendidikan_terakhir' => $request->pendidikan_terakhir_wali,
                'pekerjaan' => $request->pekerjaan_wali,
                'penghasilan' => $request->penghasilan_wali,
                'no_telp' => $request->no_telp_wali,
                'keadaan' => $request->keadaan_wali,
                'status' => 'wali'
            ]);
            // update siswa
            ModelsSiswa::where('nis', $siswa->nis)->update([
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'anak_ke' => $request->anak_ke,
                'jumlah_saudara_kandung' => $request->jumlah_saudara_kandung,
                'jumlah_saudara_angkat' => $request->jumlah_saudara_angkat,
                'jumlah_saudara_tiri' => $request->jumlah_saudara_tiri,
                'bahasa' => $request->bahasa,
                'agama' => $request->agama,
                'yatim_piatu' => $request->yatim_piatu,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->nis,
                'no_telp' => $request->no_telp,
            ]);
        }

        if ($request->password == null) {
            // update user
            DB::table('users')->where('username', '=', $siswa->nis)->update([
                'username' => $request->nis,
            ]);
            // update kesehatan
            DB::table('kesehatan')->where('nis', '=', $siswa->nis)->update([
                'nis' => $request->nis,
                'golongan_darah' => $request->golongan_darah,
                'penyakit_pernah_diderita' => $request->penyakit_pernah_diderita,
                'kelainan_jasmani' => $request->kelainan_jasmani,
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
            ]);
            // update alamat
            DB::table('alamat')->where('nis', '=', $siswa->nis)->update([
                'nis' => $request->nis,
                'jalan' => $request->jalan,
                'rt_rw' => $request->rt_rw,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
                'tinggal_bersama' => $request->tinggal_bersama,
                'jarak_ke_sekolah' => $request->jarak_ke_sekolah,
            ]);
            // update ibu
            DB::table('orangtua_wali')->where('nis', '=', $siswa->nis)->where('status', '=', 'ibu')->update([
                'nis' => $request->nis,
                'nama' => $request->nama_ibu,
                'agama' => $request->agama_ibu,
                'kewarganegaraan' => $request->kewarganegaraan_ibu,
                'pendidikan_terakhir' => $request->pendidikan_terakhir_ibu,
                'pekerjaan' => $request->pekerjaan_ibu,
                'penghasilan' => $request->penghasilan_ibu,
                'no_telp' => $request->no_telp_ibu,
                'keadaan' => $request->keadaan_ibu,
                'status' => 'ibu'
            ]);
            // update ayah
            DB::table('orangtua_wali')->where('nis', '=', $siswa->nis)->where('status', '=', 'ayah')->update([
                'nis' => $request->nis,
                'nama' => $request->nama_ayah,
                'agama' => $request->agama_ayah,
                'kewarganegaraan' => $request->kewarganegaraan_ayah,
                'pendidikan_terakhir' => $request->pendidikan_terakhir_ayah,
                'pekerjaan' => $request->pekerjaan_ayah,
                'penghasilan' => $request->penghasilan_ayah,
                'no_telp' => $request->no_telp_ayah,
                'keadaan' => $request->keadaan_ayah,
                'status' => 'ayah'
            ]);
            // update wali
            DB::table('orangtua_wali')->where('nis', '=', $siswa->nis)->where('status', '=', 'wali')->update([
                'nis' => $request->nis,
                'nama' => $request->nama_wali,
                'agama' => $request->agama_wali,
                'kewarganegaraan' => $request->kewarganegaraan_wali,
                'pendidikan_terakhir' => $request->pendidikan_terakhir_wali,
                'pekerjaan' => $request->pekerjaan_wali,
                'penghasilan' => $request->penghasilan_wali,
                'no_telp' => $request->no_telp_wali,
                'keadaan' => $request->keadaan_wali,
                'status' => 'wali'
            ]);
            // update siswa
            ModelsSiswa::where('nis', $siswa->nis)->update([
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kewarganegaraan' => $request->kewarganegaraan,
                'anak_ke' => $request->anak_ke,
                'jumlah_saudara_kandung' => $request->jumlah_saudara_kandung,
                'jumlah_saudara_angkat' => $request->jumlah_saudara_angkat,
                'jumlah_saudara_tiri' => $request->jumlah_saudara_tiri,
                'bahasa' => $request->bahasa,
                'agama' => $request->agama,
                'yatim_piatu' => $request->yatim_piatu,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->nis,
                'no_telp' => $request->no_telp,
            ]);
        }
        return redirect('/siswa')->with('success', 'Data has been updated!')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsSiswa $siswa)
    {
        if (Auth::user()->jabatan == 'admin') {
            AuthUser::where('username', $siswa->nis)->delete();
            kesehatan::where('nis', $siswa->nis)->delete();
            alamat::where('nis', $siswa->nis)->delete();
            orangtua_wali::where('nis', $siswa->nis)->delete();
            $siswa->delete();
            return redirect()->back()->with('success', 'Data has been deleted!');
        }
        return redirect()->back()->with('error', 'Anda tidak memiliki hak akses.');
    }
}
