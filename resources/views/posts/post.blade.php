@extends('layouts.site')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <p class="text-3xl text-bold text-white text-center">Рубрика: {{ $post->category->name }}</p>
        </div>

        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <a href="{{ route('categories') }}">
                <p class="underline text-white">На главную</p>
            </a>
        </div>

        <div class="mb-6">
            <p class="text-xl mt-6 text-white">
                {{ $post->title }}
            </p>
            <p class="text-white text-xs">
                {{ Date::parse($post->created_at)->format('j F Y') }}
            </p>
            <img src="{{ $post->img }}" alt="{{ $post->title }}">
            <p class="text-white">
                {{ $post->text }}
            </p>
        </div>
    </div>
@endsection('content')

