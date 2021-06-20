<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    public function render(): View
    {
        return view('livewire.auth.modal');
    }

    public function close(): void
    {
        $this->closeModal();
    }
}
