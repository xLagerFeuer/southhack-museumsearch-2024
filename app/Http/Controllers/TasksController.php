<?php

namespace App\Http\Controllers;

use App\Models\AnalysisQueueTask;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return view('pages.view-stasks');
    }

    public function view(int $id)
    {
        $task = AnalysisQueueTask::where('id', $id)->first();
        return view('pages.view-task', compact('task'));
    }
}
