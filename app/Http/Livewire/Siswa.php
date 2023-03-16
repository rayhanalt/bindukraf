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
                ModelsSiswa::with('haveAlamat')->orderBy('id', 'desc')->Paginate(4)->withQueryString() :
                ModelsSiswa::with('haveAlamat')->orderBy('id', 'desc')
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
                        ->where('rt_rw', 'like', '%' . $this->search . '%');
                })
                ->paginate(4)->withQueryString()
        ]);
    }
}
