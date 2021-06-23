<?php

namespace App\Http\Livewire\User;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class QuestionList extends Component
{
    public string $searchTerm = '';
    public Collection $tags;
    public array $selectedTags = [];

    public function mount(): void
    {
        $this->tags = Tag::orderBy('name')
            ->limit(20)
            ->pluck('id','name');
    }

    public function render(): View
    {
        $questions = Question::with('tags')
            ->withCount('comments')
            ->where(function($q) {
                $q->when(!empty($this->selectedTags), function($q) {
                    foreach ($this->selectedTags as $name) {
                        $q->whereHas('tags', function($q) use($name) {
                            $q->whereName($name);
                        });
                    }
                });
            })
            ->when(!empty($this->searchTerm), function($q) {
                $q->search('title', $this->searchTerm);
            })
            ->orderByDesc('rating')
            ->get();

        return view('livewire.user.question-list', [
            'questions' => $questions,
            'tags' => $this->tags,
            'selectedTags' => $this->selectedTags
        ]);
    }

    public function selectTag($name): void
    {
        if (($index = array_search($name, $this->selectedTags)) !== false) {
            unset($this->selectedTags[$index]);
        } else {
            $this->selectedTags[] = $name;
        }
    }
}
