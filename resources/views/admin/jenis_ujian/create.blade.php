@extends('app')
@section('content')
    <div class="overflow-x-auto">
        <div class="card shadow-xl">
            <h3 class="sticky top-0 text-lg font-bold">Tambah Data
                <hr>
            </h3>
            <div class="card-body">
                <form action="/jenis_ujian" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-control w-full max-w-full">
                        <label class="label">
                            <span class="label-text">Jenis Ujian</span>
                            <span class="label-text-alt"></span>
                        </label>
                        <input name="jenis_ujian" type="text" placeholder="Type here" value="{{ old('jenis_ujian') }}"
                            class="input-bordered input w-full max-w-full" />
                        <label class="label">
                            <span class="label-text-alt"></span>
                            <span class="label-text-alt text-red-600">
                                @error('jenis_ujian')
                                    {{ $message }}
                                @enderror
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
