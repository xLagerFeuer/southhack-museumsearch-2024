<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisQueueTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'creation_date',
        'author',
        'is_ml_done',
        'is_ml_sent',
    ];

    public function results()
    {
        return $this->hasMany(AnalysisQueueTaskResults::class, 'task_id');
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
