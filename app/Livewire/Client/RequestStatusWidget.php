<?php

namespace App\Livewire\Client;

use App\Models\AnalysisQueueTask;
use Livewire\Component;

class RequestStatusWidget extends Component
{

    public $task;

    public function mount($task = null)
    {
        $this->task = $task;
    }

    public function render()
    {
        $updTask = AnalysisQueueTask::find($this->task->id);
        return view('livewire.client.request-status-widget', compact('updTask'));
    }
}
