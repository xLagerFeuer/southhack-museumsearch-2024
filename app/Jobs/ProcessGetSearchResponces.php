<?php

namespace App\Jobs;

use App\Models\AnalysisQueueTask;
use App\Models\AnalysisQueueTaskResults;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessGetSearchResponces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $task = AnalysisQueueTask::where('is_ml_saved', false)->where('is_ml_done', true)->where('is_ml_sent', true)->orderBy('created_at', 'asc')->first(); // QUEUE model

            echo("Task to SAVE: (" . $task->id . ") from Author: " . $task->author->name);

            $fixed_string = preg_replace('/"/', '', (string) $task->result);
            $fixed_string = str_replace("'", "\"", $fixed_string);
            echo("\n\nDATA: " . $fixed_string . "\n\n");
            echo("\nhello worlds 77\n\n");

            $data_array = json_decode($fixed_string, true);

            foreach ($data_array as $item) {

                AnalysisQueueTaskResults::create([
                    'task_id' => $task->id,
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'class' => $item['class'],
                    'number_of_similarities' => $item['score'],
                    'image_path' => "dataset/train/" . $item['doc'] . "/" . $item['img'],
                ]);

                echo "Path: " . $item['path'] . "\n";
                echo "Name: " . $item['name'] . "\n";
                echo "Document ID: " . $item['doc'] . "\n";
                echo "Image Filename: " . $item['img'] . "\n";
                echo "Class: " . $item['class'] . "\n";
                echo "Score: " . $item['score'] . "\n";
                echo "Description: " . $item['description'] . "\n\n";
            }

            $task->is_ml_saved = true;
            $task->save();
        } catch (\Exception $e) {
            Log::error('Ошибка при обработке задачи: ' . $e->getMessage());
            echo('Ошибка при обработке задачи: ' . $e->getMessage());
            $this->fail($e);
        }
    }
}
