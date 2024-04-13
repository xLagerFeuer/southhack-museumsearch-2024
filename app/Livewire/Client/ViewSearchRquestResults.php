<?php

namespace App\Livewire\Client;

use App\Models\AnalysisQueueTaskResults;
use Livewire\Component;

class ViewSearchRquestResults extends Component
{
    public $task;

    public function mount($task = null)
    {
        $this->task = $task;
    }

    public function render()
    {
        $results = AnalysisQueueTaskResults::where('task_id', $this->task->id)->orderBy('number_of_similarities', 'desc')->get();
        return view('livewire.client.view-search-rquest-results', compact('results'));
    }
}
