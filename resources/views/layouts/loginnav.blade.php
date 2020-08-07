@if(! Auth::check())
        <div class="alert-card">
            <div class="form">
              <div class="mainform">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-item">
                      <label for="email">メールアドレス</label>
                      <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
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