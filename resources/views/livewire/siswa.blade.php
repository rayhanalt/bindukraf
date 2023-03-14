<div>
    <div class="fixed top-[72px] bottom-2 right-2 left-2 flex flex-grow justify-between">
        <div>
            <a href="/siswa/create" class="btn-outline btn btn-success btn-sm mr-2">➕ Data</a>
            <a href="/export-data" class="btn-outline btn btn-secondary btn-sm mr-2">Export</a>

        </div>
        <div>
            @include('layout.notif')
        </div>
        <div>
            <form method="post" enctype="multipart/form-data" action="/import-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td width="40%" align="right"><label>Select File for Upload</label></td>
                            <td width="30">
                                <input type="file" name="select_file" />
                            </td>
                            <td width="30%" align="left">
                                <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" align="right"></td>
                            <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                            <td width="30%" align="left"></td>
                        </tr>
                    </table>
                </div>
            </form>
            <input wire:model="search" type="text" class="input-info input input-sm ml-2"
                placeholder="Search, if date: 'Y-m-d'">

        </div>
    </div>
    <table class="table-compact mt-10 table w-full">
        <!-- head -->
        <thead class="sticky top-0">
            <tr>
                <th></th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Nama panggilan</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th>{{ $loop->iteration + $data->FirstItem() - 1 }}</th>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->nama_panggilan }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ date('d F Y', strtotime($item->tanggal_lahir)) }}</td>
                    <td>{{ $item->haveAlamat->jalan }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>
                        <a href="/siswa/{{ $item->nis }}/edit" class="btn-outline btn btn-accent btn-sm mb-1">
                            ✎
                        </a>
                        <form action="/siswa/{{ $item->nis }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn-outline btn btn-error btn-sm"
                                onclick="return confirm('yakin hapus data {{ $item->nama_panggilan }} ?')">
                                🗑
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="fixed bottom-28 left-0 right-0">
        <div class="btn-group mx-auto grid w-fit grid-cols-2">
            <button wire:click="previousPage" @if ($data->onFirstPage()) disabled @endif
                class="btn-outline btn btn-sm">previous</button>

            <button wire:click="nextPage" @if (!$data->hasMorePages()) disabled @endif
                class="btn-outline btn btn-sm">next</button>
        </div>
    </div>
</div>
