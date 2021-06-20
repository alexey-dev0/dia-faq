<?php

namespace App\Http\Livewire\Components;

use Illuminate\Contracts\View\View;
use Livewire;
use Livewire\Component;
use Str;

class Tabs extends Component
{
    public array $tabs = [];
    public ?string $selected;

    public function mount(): void
    {
        foreach ($this->tabs as $index => $tab)
        {
            $this->tabs[$index] = [
                'view'  => $tab['view'] ?? $tab[0] ?? '<div>Empty Tab</div>',
                'name'  => $tab['name'] ?? $tab[1] ?? $index
            ];
        }
        $this->select($this->selected ?? array_key_first($this->tabs));
    }

    public function render(): View
    {
        return view('livewire.components.tabs');
    }

    public function select($key): void
    {
        $this->selected = $key;
    }

    public function getView($key): ?string
    {
        if (is_null($key)) return null;

        $view = $this->tabs[$key]['view'];

        if (Str::startsWith($view, 'livewire')) {
            return Livewire::mount(Str::after($view, 'livewire:'))->html();
        }

        return view($view)->render();
    }

    public function getTabCss($key): string
    {
        return 'w-full text-center py-4 px-4 border-b-8 font-normal ' . ($this->selected === $key
            ? 'cursor-default text-steel border-steel' // active
            : 'cursor-pointer text-gray-400 border-gray-300 hover:bg-gray-100');
    }
}
