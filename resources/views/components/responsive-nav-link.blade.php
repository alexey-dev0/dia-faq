@php
    $classes = 'block pl-3 pr-4 py-2 text-base font-medium ';

    $classes .= (request()->routeIs($item->prefix) ?? false)
                ? 'text-steel-600 bg-orchid-100 focus:outline-none focus:text-steel-800 focus:bg-steel-100 focus:border-steel-700 transition duration-150 ease-in-out'
                : 'text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a href="{{ $item->url }}" class="{{ $classes }}" @isset($item->onclick) onclick="{!! $item->onclick !!}" @endisset>
    @isset($item->icon) <i class="w-6 text-center fa fa-{{ $item->icon }}"></i> @endisset
    {{ $item->name }}
</a>
