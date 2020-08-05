@extends('layouts.main')
@section('active', '1')
@section('article-main')
<div class="home">
  @if(Auth::check())
  
  @endif
  <div class="home-wrapper">
    <div class="home-tl">
      @if(! Auth::check())
        <div class="alert-card">
            <div class="form">
              <div class="mainform">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-item">
                      <label for="email">メールアドレス</label>
                      <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                          @error('email')
                              <div class="invalid-feedback form-alert">
                                  <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                  </div>
                  <div class="form-item">
                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                          @error('password')
                              <div class="invalid-feedback alert">
                                  <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                  </div>
                  <div class="form-item uk-align-right">    
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                  {{ __('Remember Me') }}
                              </label>
                          <button type="submit" class="form-button">
                              {{ __('Login') }}
                          </button>
                  </div>
                </form>
              </div> 
              <div class="description">
                  <h1>ログイン</h1>
                  <h2>ログインして、機能を最大限使おう</h2>
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('パスワードをお忘れですか？') }}
                  </a>
                  <a class="btn btn-link" href="{{ route('register') }}">
                          {{ __('新規登録') }}
                  </a>
              </div>
            </div>
        </div>
      @endif
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