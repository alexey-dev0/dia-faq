@php
    $classes = (request()->routeIs($item->prefix) ?? false)
                ? 'block pl-3 pr-4 py-2 border-l-4 border-steel text-base font-medium text-steel-600 bg-steel-50 focus:outline-none focus:text-steel-800 focus:bg-steel-100 focus:border-steel-700 transition duration-150 ease-in-out'
                : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a href="{{ $item->url }}" class="{{ $classes }}" @isset($item->onclick) onclick="{!! $item->onclick !!}" @endisset>
    @isset($item->icon) <i class="w-6 text-center fa fa-{{ $item->icon }}"></i> @endisset
    {{ $item->name }}
</a>
