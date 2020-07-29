@extends('layouts.main')
@section('active', '1')
@section('article-main')
<div class="home">
    <div class="home-list" id="highlight">
        <p class="title">Recommended for you</p>
    </div>
    <div class="home-list" id="favorite">
        <p class="title">Your favorites</p>
    </div>
    <div class="home-list" id="favorite">
        <p class="title">Latest</p>
    </div>
    
    <script>
        const app = new Vue({
            el: '#app',

            data: {
                testVal: 'Hello World!' //testValを定義
            }
        });
    </script>
</div>
@endsection