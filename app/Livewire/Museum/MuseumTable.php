<?php

namespace App\Livewire\Museum;

use App\Models\Museum;
use Livewire\Component;
use Livewire\Attributes\On;

class MuseumTable extends Component
{
    public $search = "";

    #[On('museumAdded')]
    public function render()
    {
        $museums = Museum::OrderBy('created_at', 'desc')->paginate(10);
        return view('livewire.museum.museum-table', compact('museums'));
    }
}
