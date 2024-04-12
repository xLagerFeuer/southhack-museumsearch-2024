<?php

namespace App\Livewire\Museum;

use Livewire\Component;
use App\Models\Museum;

class CreateMuseumForm extends Component
{

    public $name;
    public $city;
    public $address;
    public $phone;
    public $website;
    public $email;
    public $description;
    public $latitude;
    public $longitude;

    public function createMuseum()
    {
        $this->validate([
            'name' => 'required|min:4|max:100',
            'city' => 'nullable|min:2|max:50',
            'address' => 'nullable|min:5|max:50',
            'phone' => 'nullable|min:10|max:20',
            'website' => 'nullable|min:5|max:50',
            'email' => 'nullable|email',
            'description' => 'nullable|min:5|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        Museum::create([
            'name' => $this->name,
            'city' => $this->city,
            'address' => $this->address,
            'phone' => $this->phone,
            'website' => $this->website,
            'email' => $this->email,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);

        $this->reset();

        $this->dispatch('museumAdded');
    }

    public function render()
    {
        return view('livewire.museum.create-museum-form');
    }
}
