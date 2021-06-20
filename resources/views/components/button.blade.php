<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-steel-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-steel-600 active:bg-steel-900 focus:outline-none focus:border-steel-900 focus:ring ring-steel-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
