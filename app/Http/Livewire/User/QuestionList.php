<?php

namespace App\Http\Livewire\User;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionList extends Component
{
    use WithPagination;

    public string $search = '';
    public Collection $tags;
    public array $selectedTags = [];
    public string $sort = 'created_at.desc';

    public function mount(): void
    {
        $this->tags = Tag::orderBy('name')
            ->limit(20)
            ->pluck('id','name');
    }

    public function render(): View
    {
        [ $sortColumn, $sortDirection ] = explode('.', $this->sort);

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
            ->when(!empty($this->search), function($q) {
                $q->search('title', $this->search);
            })
            ->orderBy($sortColumn, $sortDirection)
            ->paginate(12);

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
