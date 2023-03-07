@extends('app')
@section('content')
    <div class="overflow-x-auto">
        <div class="card shadow-xl">
            <h3 class="sticky top-0 text-lg font-bold">Tambah Data
                <hr>
            </h3>
            <div class="card-body">
                <form action="/siswa" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">NIS</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="nis" type="text" placeholder="Type here" value="{{ old('nis') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('nis')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Nama Lengkap Siswa</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="nama_lengkap" type="text" placeholder="Type here" value="{{ old('nama_lengkap') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('nama_lengkap')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Nama Panggilan</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="nama_panggilan" type="text" placeholder="Type here"
                            value="{{ old('nama_panggilan') }}" class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('nama_panggilan')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Tempat Lahir</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="tempat_lahir" type="text" placeholder="Type here" value="{{ old('tempat_lahir') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('tempat_lahir')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Tanggal Lahir</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="tanggal_lahir" type="date" placeholder="Type here"
                            value="{{ old('tanggal_lahir') }}" class="datepicker input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('tanggal_lahir')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Jenis Kelamin</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <select class="select-bordered select" name="jenis_kelamin">
                            <option disabled selected value="">Pick one</option>
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
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Alamat</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="alamat" type="text" placeholder="Type here" value="{{ old('alamat') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">No Telp</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="no_telp" type="text" placeholder="Type here" value="{{ old('no_telp') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('no_telp')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Password</span>
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
                    </div>

                    <div class="card-actions justify-end">
                        <button type="submit" class="btn btn-error">Reset</button>
                        <button type="submit"class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
