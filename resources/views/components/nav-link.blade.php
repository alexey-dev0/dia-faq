@php
$active = request()->routeIs($item->prefix);

$classes = 'inline-flex items-center px-2 h-10 rounded-lg text-sm my-4 font-medium leading-5 border tracking-wide ';

$classes .= (request()->routeIs($item->prefix) ?? false)
            ? 'border-orchid-300 bg-orchid-100 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'border-transparent text-gray-600 hover:text-gray-800 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a href="{{ $item->url }}" class="{{ $classes }}" @isset($item->onclick) onclick="{!! $item->onclick !!}" @endisset>
    @isset($item->icon) <i class="mr-2 text-steel fa fa-{{ $item->icon }} fa-fw"></i> @endisset
    {{ $item->name }}
</a>
