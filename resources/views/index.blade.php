@extends('layouts.main')
@section('active', '1')
@section('article-main')
<div class="home">
  <div class="home-wrapper">
    <div class="home-tl">
      @if(! Auth::check())
      <a href="/~about/" target="_blank" rel="nofollow">
        <div class="alert-card">
          <h1 class="alert-header"><em>音</em>でつながろう</h1>
          <div class="alert-descr">卍音の力、ヤバ過ぎ卍</div>
        </div>
      </a>
      @endif
      @include('layouts.loginnav')
      <div class="showcase" style="background-image: url(https://cdn.pixabay.com/photo/2020/07/03/06/12/people-5365324_1280.jpg);">
        <div class="content">
          <p>Recommended</p>
          <h2>testtesttestTestTestTestTestTestTestTest</h2>
        </div>
      </div>
      <div class="post">
        <h2 class="post-title">ポストのタイトル~~~~</h2>
        <p class="post-wrapper">ないようだなも<br/>「だなも」って本当は名古屋弁だよ！なのにどっかのたぬきが「だなも」「だなも」言うからどっかのたぬきのつかうことばみたいになってるよね。もうどうにかしてほしいだなも。でも、最近では名古屋でも「だなも」はつかわなくなったんだなも。<br/>＞ちな、名古屋圏では学校の授業の間の休み時間のことを「放課」って言ったりするね！わかるんだったら挙手だnaもだなも<br/>まじ🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺🥺だがね</p>
      </div>
      @include('layouts.loginnav')
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
          <div class="uk-modal-dialog uk-modal-body post-modal">
            @if(Auth::check())
              @if(Auth::user()->id == session('playnow')->user_id)
              <div uk-alert>
                <p>あなたがこの投稿のオーナーです</p>
                <div>
                  <a href="delete">投稿を削除</a>
                </div>
              </div>
              @endif
            @endif
              <a href="{{ route('index') }}" class="uk-modal-close">Return</a>
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