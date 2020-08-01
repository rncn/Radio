@extends('layouts.frame')
@section('body')
        <header class="header" data-barba="wrapper">
            <p class="brand"><a href="{{ route('index') }}">{{ config('app.name') }}</a></p>
            <nav class="navbar">
                <ul>
                    @if(Request::is('/'))
                    <li><a href="{{ route('index') }}" class="active">
                    @else
                    <li><a href="{{ route('index') }}">
                    @endif
                        Home</a></li>
                    <li><a>Podcasts</a></li>
                    <li><a href="{{ route('index') }}">Trending</a></li>
                    <li><a href="{{ route('index') }}">Library</a></li>
                    <li><a href="{{ route('index') }}">Search</a></li>
                </ul>
            </nav>
            <button class="nextgb" type="button">★ｹｰﾀｲ用ｻｲﾄ★</button>
                <div class="dropdown" uk-dropdown="mode: click">
                    <ul>
                        <a href="{{ route('posts.create') }}"><li>投稿</li></a>
                        <a><li>ライブラリ</li></a>
                        <a><li>スタジオ</li></a>
                        <a><li>ライブラリ</li></a>
                        <a><li>ライブラリ</li></a>
                        <a><li>ライブラリ</li></a>
                        <a><li>ダッシュボード</li></a>
                        <a><li>ログアウト</li></a>
                    </ul>
                </div>
                @if(Auth::check())
                    <div class="header-post-button">
                        <a href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </div>
                    <div class="dropdown" uk-dropdown="mode: click">
                        <ul>
                            <a href="{{ route('posts.create') }}"><li>投稿</li></a>
                            <a><li>ライブラリ</li></a>
                            <a><li>スタジオ</li></a>
                            <a><li>ライブラリ</li></a>
                            <a><li>ライブラリ</li></a>
                            <a><li>ライブラリ</li></a>
                            <a><li>ダッシュボード</li></a>
                            <a><li>ログアウト</li></a>
                        </ul>
                    </div>
                @else
                    <div class="header-post-button">
                        <a href="{{ route('login') }}">
                            Login
                        </a>
                    </div>
                @endif
        </header>
        <article class="article" >
            @yield('article-main')
        </article>
        
@endsection