<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Museum;

class MuseumImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'museum_id',
        'image',
    ];

    public function museum()
    {
        return $this->belongsTo(Museum::class);
    }
}
