<div>
    <div class="fixed top-[72px] bottom-2 right-2 left-2 flex flex-grow justify-between">
        <div>
            <a href="/siswa/create" class="btn-outline btn-success btn-sm btn mr-2">➕ Data</a>
            <a href="/export-data" class="btn-outline btn-secondary btn-sm btn mr-2">Export</a>
        </div>

        <div>
            @include('layout.notif')
        </div>
        <div>

            <input wire:model="search" type="text" class="input-info input input-sm ml-2" placeholder="Search">

        </div>
    </div>


    <table class="table-compact mt-10 table w-full">
        <!-- head -->
        <thead class="sticky top-0">
            <tr>
                <th></th>
                <th>NIS</th>
                <th>NISN</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th class="text-center">Alamat</th>
                <th>No Telp</th>
                <th class="text-center">Nama Ayah</th>
                <th class="text-center">Pekerjaan Ayah</th>
                <th class="text-center">Nama Ibu</th>
                <th class="text-center">Pekerjaan ibu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th>{{ $loop->iteration + $data->FirstItem() - 1 }}</th>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-Laki' : ($item->jenis_kelamin == 'P' ? 'Perempuan' : '') }}
                    </td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>
                        {{-- {{  \Carbon\Carbon::parse($item->tanggal_lahir)->isoFormat('D MMMM Y')  }} --}}
                        {{ $item->tanggal_lahir }}
                    </td>
                    <td>{{ $item->haveAlamat->jalan }}, {{ $item->haveAlamat->rt_rw }}, <br>
                        {{ $item->haveAlamat->desa }},
                        {{ $item->haveAlamat->kecamatan }}, <br>
                        {{ $item->haveAlamat->kabupaten }},
                        {{ $item->haveAlamat->provinsi }}
                    </td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->haveOrangtuaWali()->where('status', 'ayah')->first()->nama }}</td>
                    <td>{{ $item->haveOrangtuaWali()->where('status', 'ayah')->first()->pekerjaan }}</td>
                    <td>{{ $item->haveOrangtuaWali()->where('status', 'ibu')->first()->nama }}</td>
                    <td>{{ $item->haveOrangtuaWali()->where('status', 'ibu')->first()->pekerjaan }}</td>
                    <td>
                        <a href="/siswa/{{ $item->nis }}/edit" class="btn-outline btn-accent btn-sm btn mb-1">
                            ✎
                        </a>
                        <form action="/siswa/{{ $item->nis }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn-outline btn-error btn-sm btn"
                                onclick="return confirm('yakin hapus data {{ $item->nama_panggilan }} ?')">
                                🗑
                            </button>
                        </form>
                        <a href="/siswa/{{ $item->nis }}" class="btn-outline btn-info btn-sm btn mt-1">
                            {{-- 👁 --}}
                            🖨️
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="fixed bottom-24 left-0 right-0">
        <div class="btn-group mx-auto grid w-fit grid-cols-2">
            <button wire:click="previousPage" @if ($data->onFirstPage()) disabled @endif
                class="btn-outline btn btn-sm">previous</button>

            <button wire:click="nextPage" @if (!$data->hasMorePages()) disabled @endif
                class="btn-outline btn btn-sm">next</button>
        </div>
    </div>
</div>
