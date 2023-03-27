<?php

namespace App\Http\Livewire;

use App\Models\siswa as ModelsSiswa;
use Livewire\Component;
use Livewire\WithPagination;

class Siswa extends Component
{
    use WithPagination;
    public $search;
    public $page = 1;
    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];
    public function render()
    {
        return view('livewire.siswa', [
            'data' => $this->search === null ?
                ModelsSiswa::with('haveAlamat', 'haveOrangtuaWali')->orderBy('id', 'desc')->Paginate(3)->withQueryString() :
                ModelsSiswa::with('haveAlamat', 'haveOrangtuaWali')->orderBy('id', 'desc')
                ->where('nama_lengkap', 'like', '%' . $this->search . '%')
                ->orWhere('nama_panggilan', 'like', '%' . $this->search . '%')
                ->orWhere('nis', 'like', '%' . $this->search . '%')
                ->orWhere('nisn', 'like', '%' . $this->search . '%')
                ->orWhere('tempat_lahir', 'like', '%' . $this->search . '%')
                ->orWhere('tanggal_lahir', 'like', '%' . $this->search . '%')
                ->orWhere('jenis_kelamin', 'like', '%' . $this->search . '%')
                ->orWhere('no_telp', 'like', '%' . $this->search . '%')
                ->orWhereHas('haveAlamat', function ($query) {
                    $query->where('jalan', 'like', '%' . $this->search . '%')
                        ->orWhere('rt_rw', 'like', '%' . $this->search . '%')
                        ->orWhere('desa', 'like', '%' . $this->search . '%')
                        ->orWhere('kecamatan', 'like', '%' . $this->search . '%')
                        ->orWhere('kabupaten', 'like', '%' . $this->search . '%')
                        ->orWhere('provinsi', 'like', '%' . $this->search . '%')
                        ->orWhere('kode_pos', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('haveOrangtuaWali', function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('pekerjaan', 'like', '%' . $this->search . '%');
                })
                ->paginate(3)->withQueryString()
        ]);
    }
}
