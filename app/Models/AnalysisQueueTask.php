<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisQueueTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'result',
        'creation_date',
        'author_id',
        'is_ml_done',
        'is_ml_sent',
        'is_ml_saved',
    ];

    public function results()
    {
        return $this->hasMany(AnalysisQueueTaskResults::class, 'task_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function setMlDone(bool $isDone = true): void
    {
        $this->is_ml_done = $isDone;
        $this->save();
    }


    public function setMlSent(bool $isSent = true): void
    {
        $this->is_ml_sent = $isSent;
        $this->save();
    }
}
