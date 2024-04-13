<?php

namespace App\Livewire\Author;

use App\Models\Author;
use Livewire\Component;

class AuthorCreateForm extends Component
{

    public $name;

    public function createMuseum()
    {
        $this->validate([ 'name' => 'required|min:4|max:100' ]);

        Author::create([ 'name' => $this->name ]);

        $this->reset();

        $this->dispatch('authorAdded');
    }
    public function render()
    {
        return view('livewire.author.author-create-form');
    }
}
