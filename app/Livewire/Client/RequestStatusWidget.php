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

    public function setium()
    {
        $this->task->is_ml_done = true;
        $this->task->save();
    }

    public function render()
    {
        $status = "";
        $tmp = AnalysisQueueTask::find($this->task->id);
        if (!$tmp->is_ml_sent && !$tmp->is_ml_done) {
            $status = "waiting";
        }
        if ($tmp->is_ml_sent && !$tmp->is_ml_done) {
            $status = "computing";
        }
        if ($tmp->is_ml_sent && $tmp->is_ml_done) {
            $status = "done";
        }
        return view('livewire.client.request-status-widget', compact('status'));
    }
}
