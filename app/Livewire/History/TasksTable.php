<?php

namespace App\Livewire\History;

use App\Models\AnalysisQueueTask;
use Livewire\Component;

class TasksTable extends Component
{
    public function render()
    {
        $tasks = AnalysisQueueTask::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.history.tasks-table', compact('tasks'));
    }
}
