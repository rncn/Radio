@extends('layouts.form')

@section('article-main')
<div class="form">
                <div class="mainform">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-item">
                            <label for="name">{{ __('ID') }}</label>

                            <input id="name" type="text" class="uk-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <div class="invalid-feedback uk-alert-danger" uk-alert>
                                        <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-item">
                            <label for="displayname">{{ __('Display name') }}</label>

                            <input id="displayname" type="text" name="displayname" value="{{ old('displayname') }}" required>

                            @error('displayname')
                                <div class="invalid-feedback uk-alert-danger" class="form-alert">
                                        <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-item">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="uk-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <div class="invalid-feedback uk-alert-danger" uk-alert>
                                        <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-item">
                            <label for="description">{{ __('Account bio') }}</label>

                            <textarea id="description" class="form-textarea" name="description" value="{!! old('description') !!}" required></textarea>

                            @error('description')
                                <div class="invalid-feedback uk-alert-danger" class="form-alert">
                                        <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-item">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="uk-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <div class="invalid-feedback uk-alert-danger" uk-alert>
                                        <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-item">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-item uk-align-right">
                            <button type="submit" class="uk-button uk-button-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="description">
                    <h1>新規登録</h1>
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('アカウントを持っていますか？') }}
                    </a>
                </div>
</div>
@endsection
