<?php

namespace App\Http\Controllers;

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
                'nama_lengkap' => 'required',
                'nama_panggilan' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
            ]);

            ModelsSiswa::create($validasiSiswa);

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
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        if ($siswa->nis != $request->nis) {
            $request->validate([
                'nis' => 'unique:siswa,nis'
            ]);
        }

        if ($request->password != null) {

            DB::table('users')->where('username', '=', $siswa->nis)->update([
                'username' => $request->nis,
                'password' => bcrypt($request->password),
            ]);

            ModelsSiswa::where('nis', $siswa->nis)->update([
                'nis' => $request->nis,
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]);
        }

        if ($request->password == null) {

            DB::table('users')->where('username', '=', $siswa->nis)->update([
                'username' => $request->nis,
            ]);
            ModelsSiswa::where('nis', $siswa->nis)->update([
                'nis' => $request->nis,
                'nama_lengkap' => $request->nama_lengkap,
                'nama_panggilan' => $request->nama_panggilan,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
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
            $siswa->delete();
            return redirect()->back()->with('success', 'Data has been deleted!');
        }
        return redirect()->back()->with('error', 'Anda tidak memiliki hak akses.');
    }
}
