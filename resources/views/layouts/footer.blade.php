<div class="flex flex-col items-center p-6 text-sm font-normal space-y-2">
    <div class="flex justify-center sm:space-x-8 flex-col sm:flex-row sm:h-12 mb-4">
        {!! Menu::user() !!}
    </div>
    <a class="cursor-pointer text-steel hover:text-steel-600" href="{{ route('author') }}">
        О проекте | Связаться с автором
    </a>
    <div class="">
        © А. Ю. Мошкин, {{ now()->year }}.
    </div>
</div>
