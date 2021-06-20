<div>
    <div class="absolute w-8 h-8 -top-3 -right-3 bg-steel hover:bg-steel-600 text-color-white rounded-full flex justify-center items-center cursor-pointer border-2 border-white"
         wire:click="$emit('closeModal')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </div>
    @livewire('components.tabs', [
        'tabs' => [
            'login' => [
                'name' => 'Вход',
                'view' => 'livewire:auth.login-form'
            ],
            'signup' => [
                'name' => 'Регистрация',
                'view' => 'livewire:auth.register-form'
            ],
        ],
        'selected' => 'login'
    ])
</div>
