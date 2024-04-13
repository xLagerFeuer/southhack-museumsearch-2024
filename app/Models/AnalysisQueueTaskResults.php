<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisQueueTaskResults extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'name',
        'description',
        'number_of_similarities',
        'image_path',
        'class',
    ];

    public function task()
    {
        return $this->belongsTo(AnalysisQueueTask::class, 'task_id');
    }
}
