<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="flex items-center border-b-2 border-steel-400 py-2 mx-4 w-1/2 focus-within:border-steel-500">
                <i class="fa fa-fw fa-search text-steel-400"></i>
                <input wire:model="searchTerm" class="appearance-none bg-transparent border-none w-full text-gray-700 py-1 px-2 leading-tight focus:outline-none focus:ring-0" type="text" placeholder="Искать" aria-label="Поиск">
            </div>
        </div>

        <div class="flex flex-wrap items-center justify-center w-full my-4">
            @foreach($tags as $name => $id)
                @php
                    $active = in_array($name, $selectedTags);
                    $classes = 'px-4 py-2 mr-2 mb-2 rounded-full cursor-pointer ';
                    $classes .= $active
                            ? 'bg-steel text-white  shadow hover:bg-steel-600 hover:shadow-inner'
                            : 'bg-white text-gray-800 shadow-md hover:bg-gray-200 hover:shadow-inner';
                @endphp
                <div
                    class="{{ $classes }}"
                    wire:click="selectTag('{{ $name }}')"
                >
                    {{ $name }}
                </div>
            @endforeach
        </div>

        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full my-4">
            @forelse($questions as $question)
                <div class="shadow-lg sm:rounded-lg h-80 flex flex-col px-6 pt-4 pb-4 min-h-full {{ $question->rating < 0 ? 'bg-gray-50 opacity-70' : 'bg-white' }} hover:opacity-100">
                    <div class="flex-grow">
                        <h1 class="text-lg sm:text-xl font-semibold text-gray-600 mb-1">
                            {{ $question->title }}
                        </h1>
                        <hr>
                        <div class="flex items-center justify-between text-sm">
                            <div class="text-gray-400">
                                {{ $question->created_at->format('H:i d.m.Y') }}
                            </div>
                            <div class="flex items-baseline">
                                <i class="fa fa-fw fa-eye mr-1"></i>{{ $question->views }}
                                <i class="fa fa-fw fa-comments ml-2 mr-1"></i>{{ $question->comments_count }}
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm sm:text-base text-normal line-clamp-3 mt-4">
                            {{ $question->content }}
                        </p>
                    </div>
                    <div class="flex items-end">
                        <div class="flex-grow flex flex-wrap">
                            @foreach($question->tags as $tag)
                                @php
                                    $active = in_array($tag->name, $selectedTags);
                                    $classes = 'text-sm font-normal px-4 py-1 mr-1 my-1 rounded-full shadow-sm ';
                                    $classes .= $active
                                            ? 'bg-steel text-white'
                                            : 'bg-gray-200 text-gray-800';
                                @endphp
                                <div class="{{ $classes }}">
                                    {{ $tag->name }}
                                </div>
                            @endforeach
                        </div>
                        @php
                        if ($question->rating < 0) {
                            $color = 'text-maroon-500';
                        } else if ($question->rating > 0) {
                            $color = 'text-seagreen-400';
                        } else {
                            $color = 'text-gray-500';
                        }
                        @endphp
                        <div class="my-1 flex items-baseline {{ $color }}">
                            <i class="far fa-fw fa-thumbs-up mr-1"></i>
                            <div class="text-xl font-semibold">{{ $question->rating }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-10 col-span-3 font-semibold text-center">
                    <div class="w-full text-lg text-gray-500">Ни одного вопроса не найдено...</div>
                    <div class="w-full text-xl text-steel">Задайте свой!</div>
                    <i class="far fa-3x fa-fw fa-smile-wink text-steel"></i>
                </div>
            @endforelse
        </div>

    </div>
</div>
