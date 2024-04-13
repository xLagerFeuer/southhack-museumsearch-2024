<?php

namespace App\Jobs;

use App\Models\AnalysisQueueTask;
use App\Models\Author;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProcessSendSearchRequests implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $task = AnalysisQueueTask::where('is_ml_done', false)->where('is_ml_sent', false)->orderBy('created_at', 'desc')->first(); // STACK model

        $image = base64_encode(Storage::get('public/' . $task->image_path));

        $request = [
            'image' => $image,
            'author' => $task->author->name,
            'date' => (string) $task->date,
        ];

        $url = env('ML_INSTANCE_URL') . '/find_images/';

        echo("Task processed successfully! Task to Sent: (" . $task->id . ") from Author: " . $task->author->name);

        $task->update(['is_ml_sent' => true]);

        $response = Http::post($url, $request);

        if ($response->successful()) {
            $task->setMlSent();
        }
    }
}
