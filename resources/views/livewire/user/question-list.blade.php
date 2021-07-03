<div>
    <div class="flex items-center rounded-lg border-steel-400 px-2 focus-within:border-orchid-500 mb-2">
        <label class="font-normal text-sm mr-2" for="sortSelect">Сортировать по:</label>
        <select class="bg-transparent cursor-pointer rounded-lg border-none focus:ring-0 text-steel" wire:model="sort" id="sortSelect">
            <option value="created_at.desc">дате (по убыванию)</option>
            <option class="bg-gray-100" value="created_at.asc">дате (по возрастанию)</option>
            <option value="rating.desc">рейтингу (по убыванию)</option>
            <option class="bg-gray-100" value="rating.asc">рейтингу (по возрастанию)</option>
            <option value="views.desc">просмотрам (по убыванию)</option>
            <option class="bg-gray-100" value="views.asc">просмотрам (по возрастанию)</option>
            <option value="comments_count.desc">комментариям (по убыванию)</option>
            <option class="bg-gray-100" value="comments_count.asc">комментариям (по возрастанию)</option>
        </select>
    </div>

    <div class="flex">
        <div class="flex flex-1 items-center bg-white rounded-lg shadow-md border-none border-steel-400 p-3 mr-4 focus-within:border-orchid-500">
            <i class="fa fa-fw fa-search text-steel-400 mx-2"></i>
            <input wire:model="search"
                   class="appearance-none bg-transparent border-none w-full text-gray-700 py-1 px-2 leading-tight focus:outline-none focus:ring-0"
                   type="text"
                   placeholder="Искать"
                   aria-label="Поиск"
            >
        </div>

        <a href="#" class="p-3 rounded-lg shadow-md bg-steel hover:bg-orchid-500 text-white">Задать вопрос</a>
    </div>

    <div class="flex flex-wrap items-center justify-center w-full my-4">
        @foreach($tags as $name => $id)
            @php
                $active = in_array($name, $selectedTags);
                $classes = 'px-3 py-1 mr-2 mb-2 rounded-full font-normal text-sm cursor-pointer ';
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
                        <a href="{{ route('question.show', $question) }}">
                            {{ $question->title }}
                        </a>
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
        @empty
            <div class="p-10 col-span-3 font-semibold text-center">
                <div class="w-full text-lg text-gray-500">Ни одного вопроса не найдено...</div>
                <div class="w-full text-xl text-steel">Задайте свой!</div>
                <i class="far fa-3x fa-fw fa-smile-wink text-steel"></i>
            </div>
        @endforelse
    </div>
    <div class="font-normal mt-6">{{ $questions->links() }}</div>
</div>
