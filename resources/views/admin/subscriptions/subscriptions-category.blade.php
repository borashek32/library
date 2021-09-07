<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Все подписки рубрики
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('includes.messages')
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if(\App\Models\Subscription::all()->count() > 0)
                    <p class="text-xl text-bold mb-4">
                        Количество подписок в рубрике {{ $subscriptions->count() }}
                    </p>
                    <table class="min-w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">No.</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Имя пользователя</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscriptions as $subscription)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $subscription->user->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <p>Подписок пока нет</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
