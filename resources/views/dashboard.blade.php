<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Личный кабинет') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4" style="display: flex; flex-direction: column">
                <p class="text-2xl" style="text-decoration: none">Меню</p>

                <a href="{{ route('profile.show') }}">Профайл</a>
                @if(Auth::user()->hasRole('user'))
                    <a href="{{ route('subscriptions.index') }}">Подписки</a>
                @endif
                @if(Auth::user()->hasRole('super-admin'))
                    <a href="{{ route('cats') }}">Категории</a>
                    <a href="{{ route('posts.index') }}">Посты</a>
                    <a href="{{ route('mailings.index') }}">Подписки</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Выйти
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
