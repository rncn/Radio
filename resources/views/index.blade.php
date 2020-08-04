@extends('layouts.main')
@section('active', '1')
@section('article-main')
<div class="home">
  @if(Auth::check())
  
  @endif
  <div class="home-wrapper">
    <div class="home-tl">
      <div class="showcase" style="background-image: url(https://cdn.pixabay.com/photo/2020/07/03/06/12/people-5365324_1280.jpg);">
        <div class="content">
          <p>Recommended</p>
          <h2>testtesttestTestTestTestTestTestTestTest</h2>
        </div>
      </div>
    </div>
    <div class="home-nav">
      <section id="trend">
        <h3>トレンド</h3>
        <ul>
          <li><a href="trending">Trending1 nantokakantokanantoka</a></li>
          <li><a href="trending">TrendingT nantokakantokanantoka</a></li>
        </ul>
      </section>
    </div>
  </div>
</div>
@if($value = session('playnow'))
  {{-- アドレスが /post/$idだったら詳細を表示 data-barba="container" で更新 --}}
  @if(Request::is('post/'.session('playnow')->id ))
  <div data-barba="container" class="uk-modal-page">
      <div uk-modal uk-modal="" class="uk-modal uk-open" style="display: block;">
          <div class="uk-modal-dialog uk-modal-body">
              <a class="uk-modal-close" href="{{ route('index') }}">Return</a>
              <h2>{{ session('playnow')->title }}</h2>
              <p>{!! nl2br(e(session('playnow')->content)) !!}</p>
              <div class="uk-text-primary">
              投稿:{{ session('playnow')->created_at }}
              </div>
          </div>
      </div>
  </div>
  @endif
@endif
@endsection