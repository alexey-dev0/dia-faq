@extends('layouts.app')

@section('content')
    <x-page-template>
        <div class="shadow-lg sm:rounded-lg h-80 flex flex-col px-6 pt-4 pb-4 min-h-full {{ $question->rating < 0 ? 'bg-gray-50 opacity-70' : 'bg-white' }} hover:opacity-100">
            <div class="flex-grow">
                <h1 class="text-lg sm:text-xl font-semibold text-gray-600 mb-1">
                    {{ $question->title }}
                </h1>
                <hr>
                <div class="flex items-center justify-between text-sm font-normal mt-1">
                    <div class="text-gray-400">
                        {{ $question->created_at->format('H:i d.m.Y') }}
                    </div>
                    <div class="flex items-baseline">
                        <i class="fa fa-fw fa-eye mr-1"></i>{{ $question->views }}
                        <i class="fa fa-fw fa-comments ml-2 mr-1"></i>{{ $question->comments_count }}
                    </div>
                </div>
                <p class="text-gray-600 text-sm sm:text-base text-base font-normal line-clamp-3 mt-4">
                    {{ $question->content }}
                </p>
            </div>
            <div class="flex items-end">
                <div class="flex-grow flex flex-wrap">
                    @foreach($question->tags as $tag)
                        <div class="px-3 py-1 mr-2 mb-2 rounded-full font-normal text-sm cursor-pointer bg-white text-gray-800 shadow-md hover:bg-gray-200 hover:shadow-inner">
                            {{ $tag->name }}
                        </div>
                    @endforeach
                </div>
                @php
                    if ($question->rating < 0) {
                        $color = 'maroon';
                    } else if ($question->rating > 0) {
                        $color = 'seagreen';
                    } else {
                        $color = 'gray';
                    }
                @endphp
                <div class="bg-{{ $color }}-100 px-4 rounded-full my-1 flex items-baseline text-{{ $color }}-400">
                    <i class="far fa-fw fa-thumbs-up mr-1"></i>
                    <div class="text-xl font-semibold">{{ $question->rating }}</div>
                </div>
            </div>
        </div>
    </x-page-template>
@endsection
