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
                                    {{ $category->name }} - ({{ $category->posts->count() }})
                                </p>
                                <p class="text-white underline text-xs ml-4 mt-2">
                                    <a href="{{ route('subscriptions.index') }}">Подписаться</a>
                                </p>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
