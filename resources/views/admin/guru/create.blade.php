@extends('app')
@section('content')
    <div class="overflow-x-auto">
        <div class="card shadow-xl">
            <h3 class="sticky top-0 text-lg font-bold">Tambah Data
                <hr>
            </h3>
            <div class="card-body">
                <form action="/guru" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">NIP</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="nip" type="text" placeholder="Type here" value="{{ old('nip') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('nip')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Nama Guru</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="nama_guru" type="text" placeholder="Type here" value="{{ old('nama_guru') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('nama_guru')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Mapel</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="kode_mapel" type="text" placeholder="Type here" value="{{ old('kode_mapel') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('kode_mapel')
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
