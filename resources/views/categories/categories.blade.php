@extends('layouts.site')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <a href="{{ route('categories') }}">
                <p class="text-3xl text-bold text-white text-center">Бибилиотека</p>
            </a>
        </div>

        @include('includes.categories')
    </div>
@endsection('content')

