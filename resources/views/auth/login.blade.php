@extends('layouts.form')

@section('article-main')
    <div class="form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-item">
                            <label for="email">メールアドレス</label>
                            <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback uk-alert-danger" uk-alert>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-item">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback uk-alert-danger" uk-alert>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-item">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                <button type="submit" class="uk-button uk-button-primary">
                                    {{ __('Login') }}
                                </button>
                        </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('パスワードをお忘れですか？') }}
                                    </a>
                                @endif
                                <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('新規登録') }}
                                </a>
                    </form>
    </div>
@endsection