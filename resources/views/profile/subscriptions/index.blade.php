<x-app-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Управление подпиской на новости
            </h2>
        </div>
    </header>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('includes.messages')

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="mb-10">
                    <div class="flex flex-wrap md:flex-row w-full">
                        <div class="mb-4">
                            <p>Вы можете оформить подписку на наши новости на несколько электронных адресов</p>
                        </div>
                        <div class="w-full md:w-3/10 text-left">
                            <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center text-center">
                                    <div class="">
                                        <form action="{{ route('subscriptions.store') }}" method="POST">
                                            @csrf
                                            <div class="mb-4">

{{--Вывод категорий для подписки на них--}}
                                                <label for="img" class="block text-gray-700 text-xl font-bold" style="margin-bottom: -6px">
                                                    Выберите рубрику/и:
                                                </label>
                                                <div class="mt-4">
                                                    @foreach($categories as $category)
                                                        <label class="flex justify-start items-start mb-2">
                                                            <div class="bg-white border-2 rounded border-gray-400 w-6 h-6 flex flex-shrink-0
                                                                justify-center items-center mr-2 focus-within:border-blue-500">
                                                                <input type="checkbox" class="opacity-0 absolute" name="category_id" value="{{ $category->id }}">
                                                                <svg class="fill-current hidden w-4 h-4 text-green-500 pointer-events-none" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                                            </div>
                                                            <div class="select-none">{{ $category->name }}</div>
                                                        </label>
                                                    @endforeach
                                                </div>

                                                @error('category_id')
                                                    <div class="mt-2 text-red-500 mb-2 text-small">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

{{--Оформление подписки--}}
                                            <label for="email">
                                                Электронная почта
                                            </label>
                                            <div class="w-full">
                                                <input type="email" readonly name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                                                    leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500
                                                    @enderror" id="exampleInputEmail1"
                                                       aria-describedby="emailHelp" placeholder="myemail@gmail.com"
                                                       value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">

                                                <x-jet-button type="submit" class="" style="margin-top: 10px">
                                                    Подписаться
                                                </x-jet-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($subscriptions->count() > 0)
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">#</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Электронная почта</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Рубрика</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действие</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($subscriptions as $subscription)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                                        {{ $subscription->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                                        {{ $subscription->category->name }}
                                    </td>

                                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                        <div class="">
                                            <form action="{{ route('subscriptions.destroy', $subscription['id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Отменить" class="bg-red-500 hover:bg-red-700
                                                    text-white font-bold py-2 px-4 rounded">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @endif
                <div class="mt-4">
                    {{ $subscriptions->links() }}
                </div>
            </div>
        </div>
    </div>
    <style>
        input:checked + svg {
            display: block;
        }
    </style>
</x-app-layout>
