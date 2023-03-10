@extends('app')
@section('content')
    <h3 class="sticky top-0 z-10 text-lg font-bold">Tambah Data
        <hr>
    </h3>
    <div class="overflow-x-auto">
        <div class="card shadow-xl">
            <div class="card-body">
                <form action="/siswa" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control w-full max-w-full">
                        <label class="label rounded-lg bg-stone-300">
                            <span class="label-tex text-lg font-medium">Data Siswa</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <div class="overflow-x-auto">
                            <table class="table-compact table">
                                <tr>
                                    <td>

                                        <input name="nis" type="text" placeholder="NIS" value="{{ old('nis') }}"
                                            class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('nis')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="nama_lengkap" type="text" placeholder="Nama Lengkap"
                                            value="{{ old('nama_lengkap') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('nama_lengkap')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="nama_panggilan" type="text" placeholder="Nama Panggilan"
                                            value="{{ old('nama_panggilan') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('nama_panggilan')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="agama" type="text" placeholder="Agama" value="{{ old('agama') }}"
                                            class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('agama')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="tempat_lahir" type="text" placeholder="Tempat Lahir"
                                            value="{{ old('tempat_lahir') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('tempat_lahir')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="tanggal_lahir" type="date" placeholder="Tanggal Lahir"
                                            value="{{ old('tanggal_lahir') }}" class="datepicker input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('tanggal_lahir')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="kewarganegaraan" type="text" placeholder="Kewarganegaraan"
                                            value="{{ old('kewarganegaraan') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('kewarganegaraan')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>

                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="kewarganegaraan" type="text" placeholder="Kewarganegaraan"
                                            value="{{ old('kewarganegaraan') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('kewarganegaraan')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="anak_ke" type="number" placeholder="Anak Ke"
                                            value="{{ old('anak_ke') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('anak_ke')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="jumlah_saudara_kandung" type="number" placeholder="Saudara Kandung"
                                            value="{{ old('jumlah_saudara_kandung') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('jumlah_saudara_kandung')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>

                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="jumlah_saudara_angkat" type="number" placeholder="Saudara Angkat"
                                            value="{{ old('jumlah_saudara_angkat') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('jumlah_saudara_angkat')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="yatim_piatu" type="text" placeholder="Yatim / Piatu"
                                            value="{{ old('yatim_piatu') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('yatim_piatu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="bahasa" type="text" placeholder="Bahasa Sehari - hari"
                                            value="{{ old('bahasa') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('bahasa')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <select class="select-bordered select w-full" name="jenis_kelamin">
                                            <option disabled selected value="">Jenis Kelamin</option>
                                            <option value="L">Pria</option>
                                            <option value="P">Wanita</option>
                                        </select>
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('jenis_kelamin')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-control mt-10 w-full max-w-full lg:mt-0">
                        <label class="label rounded-lg bg-stone-300">
                            <span class="label-text text-lg font-medium">Alamat</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <div class="overflow-x-auto">
                            <table class="table-compact table">
                                <tr>
                                    <td>

                                        <input name="jalan" type="text" placeholder="Jalan"
                                            value="{{ old('jalan') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('jalan')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="rt_rw" type="text" placeholder="RT/RW"
                                            value="{{ old('rt_rw') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('rt_rw')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="desa" type="text" placeholder="Desa"
                                            value="{{ old('desa') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('desa')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="kecamatan" type="text" placeholder="Kecamatan"
                                            value="{{ old('kecamatan') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('kecamatan')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="kabupaten" type="text" placeholder="Kabupaten"
                                            value="{{ old('kabupaten') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('kabupaten')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="provinsi" type="text" placeholder="Provinsi"
                                            value="{{ old('provinsi') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('provinsi')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="kode_pos" type="text" placeholder="Kode Pos"
                                            value="{{ old('kode_pos') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('kode_pos')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="tinggal_bersama" type="text" placeholder="Tinggal Bersama"
                                            value="{{ old('tinggal_bersama') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('tinggal_bersama')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="jarak_ke_sekolah" type="text" placeholder="Jarak Ke Sekolah"
                                            value="{{ old('jarak_ke_sekolah') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('jarak_ke_sekolah')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="no_telp" type="text" placeholder="No Telp"
                                            value="{{ old('no_telp') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('no_telp')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="form-control mt-10 w-full max-w-full lg:mt-0">
                        <label class="label rounded-lg bg-stone-300">
                            <span class="label-text text-lg font-medium">Data Ayah</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <div class="overflow-x-auto">
                            <table class="table-compact table">
                                <tr>
                                    <td>

                                        <input name="nama_ayah" type="text" placeholder="Nama Ayah"
                                            value="{{ old('nama_ayah') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('nama_ayah')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="agama_ayah" type="text" placeholder="Agama"
                                            value="{{ old('agama_ayah') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('agama_ayah')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="kewarganegaraan_ayah" type="text" placeholder="Kewarganegaraan"
                                            value="{{ old('kewarganegaraan_ayah') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('kewarganegaraan_ayah')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="pendidikan_terakhir_ayah" type="text"
                                            placeholder="Pendidikan Terakhir"
                                            value="{{ old('pendidikan_terakhir_ayah') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('pendidikan_terakhir_ayah')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="pekerjaan_ayah" type="text" placeholder="Pekerjaan"
                                            value="{{ old('pekerjaan_ayah') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('pekerjaan_ayah')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="penghasilan_ayah" type="text" placeholder="Penghasilan"
                                            value="{{ old('penghasilan_ayah') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('penghasilan_ayah')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="no_telp_ayah" type="text" placeholder="No Telp"
                                            value="{{ old('no_telp_ayah') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('no_telp_ayah')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="keadaan_ayah" type="text" placeholder="Keadaan"
                                            value="{{ old('keadaan_ayah') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('keadaan_ayah')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="form-control mt-10 w-full max-w-full lg:mt-0">
                        <label class="label rounded-lg bg-stone-300">
                            <span class="label-text text-lg font-medium">Data Ibu</span>
                            <span class="label-text-alt"></span>
                        </label>

                        <div class="overflow-x-auto">
                            <table class="table-compact table">
                                <tr>
                                    <td>

                                        <input name="nama_ibu" type="text" placeholder="Nama Ibu"
                                            value="{{ old('nama_ibu') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('nama_ibu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="agama_ibu" type="text" placeholder="Agama"
                                            value="{{ old('agama_ibu') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('agama_ibu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="kewarganegaraan_ibu" type="text" placeholder="Kewarganegaraan"
                                            value="{{ old('kewarganegaraan_ibu') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('kewarganegaraan_ibu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="pendidikan_terakhir_ibu" type="text"
                                            placeholder="Pendidikan Terakhir"
                                            value="{{ old('pendidikan_terakhir_ibu') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('pendidikan_terakhir_ibu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="pekerjaan_ibu" type="text" placeholder="Pekerjaan"
                                            value="{{ old('pekerjaan_ibu') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('pekerjaan_ibu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="penghasilan_ibu" type="text" placeholder="Penghasilan"
                                            value="{{ old('penghasilan_ibu') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('penghasilan_ibu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="no_telp_ibu" type="text" placeholder="No Telp"
                                            value="{{ old('no_telp_ibu') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('no_telp_ibu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="keadaan_ibu" type="text" placeholder="Keadaan"
                                            value="{{ old('keadaan_ibu') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('keadaan_ibu')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="form-control mt-10 w-full max-w-full lg:mt-0">
                        <label class="label rounded-lg bg-stone-300">
                            <span class="label-text text-lg font-medium">Data Wali</span>
                            <span class="label-text-alt"></span>
                        </label>

                        <div class="overflow-x-auto">
                            <table class="table-compact table">
                                <tr>
                                    <td>

                                        <input name="nama_wali" type="text" placeholder="Nama Wali"
                                            value="{{ old('nama_wali') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('nama_wali')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="agama_wali" type="text" placeholder="Agama"
                                            value="{{ old('agama_wali') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('agama_wali')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="kewarganegaraan_wali" type="text" placeholder="Kewarganegaraan"
                                            value="{{ old('kewarganegaraan_wali') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('kewarganegaraan_wali')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>

                                        <input name="pendidikan_terakhir_wali" type="text"
                                            placeholder="Pendidikan Terakhir"
                                            value="{{ old('pendidikan_terakhir_wali') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('pendidikan_terakhir_wali')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="pekerjaan_wali" type="text" placeholder="Pekerjaan"
                                            value="{{ old('pekerjaan_wali') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('pekerjaan_wali')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="penghasilan_wali" type="text" placeholder="Penghasilan"
                                            value="{{ old('penghasilan_wali') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('penghasilan_wali')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="no_telp_wali" type="text" placeholder="No Telp"
                                            value="{{ old('no_telp_wali') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('no_telp_wali')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="label">
                                            <span class="label-text"></span>
                                            <span class="label-text-alt"></span>
                                        </label>
                                        <input name="keadaan_wali" type="text" placeholder="Keadaan"
                                            value="{{ old('keadaan_wali') }}" class="input-bordered input">
                                        <label class="label">
                                            <span class="label-text-alt"></span>
                                            <span class="label-text-alt text-red-600">
                                                @error('keadaan_wali')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text text-lg font-medium">Password</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="password" type="text" readonly value="12345"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt text-blue-600">Ubah sendiri saat sudah login</span>
                            <span class="label-text-alt text-red-600">
                                Password default untuk login Guru
                            </span>
                        </label>
                    </div><br>

                    <div class="card-actions justify-end">
                        <button type="submit" class="btn-error btn">Reset</button>
                        <button type="submit"class="btn btn-success">Simpan</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
@endsection
