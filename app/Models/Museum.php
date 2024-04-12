<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MuseumImage;

class Museum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'address',
        'phone',
        'website',
        'email',
        'description',
        'latitude',
        'longitude',
        'working_hours',
    ];

    public function images()
    {
        return $this->hasMany(MuseumImage::class);
    }
}
