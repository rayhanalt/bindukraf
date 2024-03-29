<!doctype html>
<html data-theme="cmyk">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/title.png') }}" />
    @include('layout.css')
</head>

<body>

    {{-- drawer --}}
    <div class="drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <!-- Page content here -->

            {{-- Navbar --}}
            @include('layout.navbar')
            {{-- end navbar --}}

            {{-- content --}}
            <div class="flex w-full flex-col">
                <div class="card rounded-box ml-2 mr-2 mt-2 grid h-full place-items-stretch lg:h-[530px]">
                    {{-- yield content --}}
                    @yield('content')
                    {{-- Notif hak akses --}}
                    @if (session()->has('error'))
                        <div class="fixed bottom-14 left-0 right-0 m-auto flex h-12 w-full items-center justify-center">
                            <button class="btn-error btn btn-xs">
                                {{ session('error') }}
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            {{-- end content --}}

            {{-- footer --}}
            @include('layout.footer')
            {{-- end footer --}}

        </div>
        <div class="drawer-side">
            <label for="my-drawer" class="drawer-overlay"></label>
            <ul class="menu w-80 bg-base-100 p-4 text-base-content">
                <!-- Sidebar content here -->
                @can('guru')
                    {{-- <li><a href="/proyek">Proyek</a></li>
                    <li><a href="/bidang">Bidang</a></li>
                    <li><a href="/pegawai">Pegawai</a></li>
                    <li><a href="/pekerjaProyek">Tim Proyek</a></li>
                    <li><a href="/barang">Pengadaan Barang</a></li>
                    <li><a href="/perkembangan">Perkembangan Proyek</a></li> --}}
                @endcan
                @can('admin')
                    {{-- <li><a href="/guru">Guru</a></li> --}}
                    <li><a href="/siswa">Siswa</a></li>
                    <li><a href="/tahun_ajaran">Tahun Ajaran</a></li>
                    {{-- <li><a href="/kelas">Kelas</a></li> --}}
                    {{-- <li><a href="/mapel">Mapel</a></li> --}}
                    {{-- <li><a href="/jenis_ujian">Jenis Ujian</a></li> --}}
                    {{-- <li><a href="/bidang">Bidang</a></li>
                    <li><a href="/pegawai">Pegawai</a></li>
                    <li><a href="/pekerjaProyek">Tim Proyek</a></li>
                    <li><a href="/barang">Pengadaan Barang</a></li> --}}
                @endcan
                @can('siswa')
                    {{-- <li><a href="/pekerjaProyek">Tim Proyek</a></li>
                    <li><a href="/barang">Pengadaan Barang</a></li>
                    <li><a href="/perkembangan">Perkembangan Proyek</a></li> --}}
                @endcan
                <hr class="my-4 rounded-3xl border-2 border-dashed border-emerald-500" />
                <li><a href="/user/edit/{{ auth()->user()->username }}" class="btn-outline btn btn-secondary">Ubah
                        Profil</a></li>
            </ul>
        </div>
    </div>
    {{-- end drawer --}}
    @include('layout.script')
</body>

</html>
