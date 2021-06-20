<?php

namespace App\Http\Livewire\Auth;

use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class LoginForm extends Component
{
    public string $email;
    public string $password;
    public bool $remember = false;

    protected array $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6',
    ];

    public function mount(): void
    {
        $this->email = old('email') ?? '';
    }

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function render(): View
    {
        return view('livewire.auth.login-form');
    }

    public function login(): RedirectResponse
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials)) {
            return back()->with('status', 'success');
        }

        return back()->with('status', 'error');
    }
}
