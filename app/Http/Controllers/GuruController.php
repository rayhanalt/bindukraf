<?php

namespace App\Http\Controllers;

use App\Models\guru as ModelsGuru;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->jabatan == 'admin') {
            return view('admin.guru.index');
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
            return view('admin.guru.create');
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
            $validasiGuru = $request->validate([
                'nip' => 'required|numeric|unique:guru,nip|unique:users,username',
                'nama_guru' => 'required',
                'kode_mapel' => 'required'
            ]);

            ModelsGuru::create($validasiGuru);

            DB::table('users')->insert([
                'username' => $validasiGuru['nip'],
                'password' => bcrypt('12345'),
                'jabatan' => 'guru',
            ]);

            return redirect('/guru')->with('success', 'New Data has been added!')->withInput();
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
    public function edit(ModelsGuru $guru)
    {
        if (Auth::user()->jabatan == 'admin') {
            return view('admin.guru.edit', [
                'item' => $guru,
            ]);
        }
        return redirect()->back()->with('error', 'Anda tidak memiliki hak akses.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsGuru $guru)
    {
        $request->validate([
            'nip' => 'required',
            'nama_guru' => 'required',
            'kode_mapel' => 'required',
        ]);

        if ($guru->nip != $request->nip) {
            $request->validate([
                'nip' => 'unique:guru,nip|unique:users,username'
            ]);
        }

        if ($request->password != null) {

            DB::table('users')->where('username', '=', $guru->nip)->update([
                'username' => $request->nip,
                'password' => bcrypt($request->password),
            ]);

            ModelsGuru::where('nip', $guru->nip)->update([
                'nip' => $request->nip,
                'nama_guru' => $request->nama_guru,
                'kode_mapel' => $request->kode_mapel,
            ]);
        }

        if ($request->password == null) {

            DB::table('users')->where('username', '=', $guru->nip)->update([
                'username' => $request->nip,
            ]);
            ModelsGuru::where('nip', $guru->nip)->update([
                'nip' => $request->nip,
                'nama_guru' => $request->nama_guru,
                'kode_mapel' => $request->kode_mapel,
            ]);
        }
        return redirect('/guru')->with('success', 'Data has been updated!')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsGuru $guru)
    {
        if (Auth::user()->jabatan == 'admin') {
            AuthUser::where('username', $guru->nip)->delete();
            $guru->delete();
            return redirect()->back()->with('success', 'Data has been deleted!');
        }
        return redirect()->back()->with('error', 'Anda tidak memiliki hak akses.');
    }
}
