<?php

namespace App\Http\Livewire;

use App\Models\guru as ModelsGuru;
use Livewire\Component;
use Livewire\WithPagination;

class Guru extends Component
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
        return view('livewire.guru', [
            "data" => $this->search === null ?
                ModelsGuru::paginate(3)->withQueryString() :
                ModelsGuru::orderBy('id', 'desc')->where('nama_guru', 'like', '%' . $this->search . '%')
                ->orWhere('nip', 'like', '%' . $this->search . '%')
                ->orWhere('kode_mapel', 'like', '%' . $this->search . '%')
                ->paginate(3)->withQueryString()
        ]);
    }
}
