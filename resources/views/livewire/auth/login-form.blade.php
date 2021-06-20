<form wire:submit.prevent="login" action="#" method="POST" class="text-sm">
    @csrf

    <div class="mb-4">
        <label class="block text-gray-500 text-sm font-light lowercase tracking-wider mb-2" for="email">{{ __('Email') }}</label>
        <input wire:model.lazy="email"
               class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 bg-white text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
               name="email"
               type="text"
               placeholder="example@gmail.com"
               value="{{ old('email') }}">
        @error('email') <p class="bg-red-100 text-red-600 text-xs p-2 rounded-b mx-1">{{ ucfirst($message) }}</p> @enderror
    </div>

    <div class="mb-6">
        <label class="block text-gray-500 text-sm font-light lowercase tracking-wider mb-2" for="password">{{ __('Password') }}</label>
        <input wire:model.lazy="password"
               class="shadow appearance-none border border-gray-200 rounded w-full py-2 px-3 bg-white text-gray-500 leading-tight focus:outline-none focus:shadow-outline"
               name="password"
               type="password"
               placeholder="******"
               value="">
        @error('password') <p class="bg-red-100 text-red-600 text-xs p-2 rounded-b mx-1">{{ ucfirst($message) }}</p> @enderror
    </div>

    <div class="flex items-center">
        <div class="w-full mr-4">
            <div wire:loading>
                <div class="flex items-center justify-center">
                    <svg class="animate-spin mr-3 h-5 w-5 text-steel" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <div>
                        {{ __('Loading') }}...
                    </div>
                </div>
            </div>

            <div wire:loading.remove>
                @if (session('status'))
                    @if (session('status') === 'success')
                        <div class="bg-green-100 text-green-600 text-sm p-2 rounded">
                            {{ __('Login successful') }}
                        </div>
                        <script>setTimeout(() => location.reload(), 500)</script>
                    @else
                        <div class="bg-red-100 text-red-600 text-sm p-2 rounded">
                            {{ __('Login failed') }}
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <button class="bg-steel hover:bg-steel-600 text-white font-normal uppercase py-2 px-4 rounded shadow-lg focus:outline-none focus:shadow-outline" type="submit">
            {{ __('Log in') }}
        </button>
    </div>
</form>
