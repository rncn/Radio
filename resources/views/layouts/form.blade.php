@extends('layouts.frame')
@section('body')
        <header class="header">
            <p class="brand"><a href="{{ route('index') }}">{{ config('app.name') }}</a></p>
        </header>
        <article class="article">
            @yield('article-main')
        </article>
@endsection