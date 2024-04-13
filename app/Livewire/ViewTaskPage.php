<?php

namespace App\Livewire;

use App\Models\AnalysisQueueTask;
use Illuminate\Console\View\Components\Task;
use Livewire\Component;

class ViewTaskPage extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $task = AnalysisQueueTask::where('id', $this->id)->first();
        return view('livewire.view-task-page', compact('task'));
    }
}
