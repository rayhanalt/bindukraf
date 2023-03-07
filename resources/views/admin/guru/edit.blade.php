@extends('app')
@section('content')
    <div class="overflow-x-auto">
        <div class="card shadow-xl">
            <h3 class="sticky top-0 text-lg font-bold">Ubah Data Pegawai
                <hr>
            </h3>
            <div class="card-body">
                <form action="/guru/{{ $item->nip }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">NIP</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="nip" type="text" placeholder="Type here" value="{{ old('nip', $item->nip) }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </span>
                        </label>
                    </div>

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Nama</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="nama_guru" type="text" placeholder="Type here"
                            value="{{ old('nama_guru', $item->nama_guru) }}"
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
                        <input name="kode_mapel" type="text" placeholder="Type here"
                            value="{{ old('kode_mapel', $item->kode_mapel) }}"
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
                        <input name="password" type="password" placeholder="" value="{{ old('password') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                biarkan kosong jika tidak ingin ganti password
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
