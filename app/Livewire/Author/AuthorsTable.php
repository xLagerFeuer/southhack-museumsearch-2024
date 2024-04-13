<?php

namespace App\Livewire\Author;

use App\Models\Author;
use Livewire\Attributes\On;
use Livewire\Component;

class AuthorsTable extends Component
{
    public $search = "";

    #[On('authorAdded')]
    public function render()
    {
        $authors = Author::OrderBy('created_at', 'desc')->paginate(10);
        return view('livewire.author.authors-table', compact('authors'));
    }
}
