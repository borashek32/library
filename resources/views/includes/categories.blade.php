<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="p-6">
            <div class="">
                <a href="{{ route('categories') }}">
                    <p class="mb-4 text-center text-white text-bold text-2xl">
                        Рубрики
                    </p>
                </a>
                <ul>
                    @foreach($categories as $category)
                        <a href="{{ route('category', $category->id) }}">
                            <li class="flex row">
                                <p class="text-white underline text-bold text-2xl">
                                    {{ $category->name }}
                                </p>
                                <span class="text-white">
                                ({{ $category->posts->count() }})
                            </span>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
