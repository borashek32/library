<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Управление постами
            </h2>
        </div>
    </header>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('includes.messages')
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="flex justify-between">
                    <div class="text-left">
                        <a href="{{ route('posts.create') }}">
                            <button class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Новый пост
                            </button>
                        </a>
                    </div>
                </div>
                @if(\App\Models\Post::all()->count() > 0)
                    <table class="table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider text-center">#</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider text-center">Категория</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider text-center">Дата</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider text-center">Фото</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider text-center">Название</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider text-center">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="trix-content">
                            <th class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $loop->iteration }}</th>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $post->category->name }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ Date::parse($post->created_at)->format('j F Y') }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                <img src="{{ $post->img }}" class="w-20" alt="{{ $post->title }}" />
                            </td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $post->title }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                <button class="mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <a href="{{ route('posts.edit', $post->id) }}">
                                        Редактировать
                                    </a>
                                </button>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                        text-white font-bold py-2 px-4 rounded">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <p>Пока нет постов.</p>
                @endif
                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
