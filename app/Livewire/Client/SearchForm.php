<?php

namespace App\Livewire\Client;

use App\Models\AnalysisQueueTask;
use App\Models\Author;
use Livewire\Component;
use Livewire\WithFileUploads;

class SearchForm extends Component
{
    use WithFileUploads;

    public $status = "create";
    public $currentTask;

    public $photo;
    public $creationDate;
    public $selectedAuthor;
    public $newAuthorName;

    public function save()
    {
        if($this->selectedAuthor === "_CREATE_NEW_")
        {
            $this->validate([
                'photo' => 'image|max:2048', // Максимальный размер файла 2 МБ
                'creationDate' => 'required|date',
                'selectedAuthor' => 'required',
                'newAuthorName' => 'unique:authors,name|required|min:3',
            ]);

            $author = new Author();
            $author->name = $this->newAuthorName;
            $author->save();
            $this->selectedAuthor = $author;
        } else {
            $this->validate([
                'photo' => 'image|max:2048', // Максимальный размер файла 2 МБ
                'creationDate' => 'required|date',
                'selectedAuthor' => 'required',
            ]);
        }

        // Сохранение изображения на сервере
        $path = $this->photo->store('photos', 'public');

         $this->currentTask = AnalysisQueueTask::create([
//             'image_path' => $this->photo->getClientOriginalName(),
             'image_path' => $path,
             'creation_date' => $this->creationDate,
             'author_id' => $this->selectedAuthor,
         ]);

        $this->reset(['photo', 'creationDate', 'selectedAuthor', 'newAuthorName']);
        $this->status = "waiting";
    }


    public function render()
    {
        if ($this->status == "waiting") {
            $tmp = AnalysisQueueTask::find($this->currentTask->id);
            if ($tmp->is_ml_sent && !$tmp->is_ml_done) {
                $this->status = "computing";
            }
        } elseif ($this->status == "computing") {
            $tmp = AnalysisQueueTask::find($this->currentTask->id);
            if ($tmp->is_ml_sent && $tmp->is_ml_done) {
                $this->status = "done";
                $this->currentTask = $tmp;
            }
        }

        $authors = Author::all();
        return view('livewire.client.search-form', compact('authors'));
    }
}
