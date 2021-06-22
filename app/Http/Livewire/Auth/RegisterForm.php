<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected array $rules = [
        'name' => 'sometimes|string|min:2|max:255',
        'email' => 'required|string|email|min:3|max:255|unique:users',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password'
    ];

    public function mount(): void
    {
        $this->name = old('name') ?? '';
        $this->email = old('email') ?? '';
        $this->password = '';
        $this->password_confirmation = '';
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
        return view('livewire.auth.register-form');
    }

    public function register(): RedirectResponse
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return back()->with('status', 'success');
    }
}
