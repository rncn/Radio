@extends('layouts.form')
@section('article-main')
<div class="form">
  <div class="mainform">
    <form method="post" action="{{ route('posts.create') }}" enctype="multipart/form-data">
    @csrf
          
              <div class="form-title">
                <label for="title">タイトル</label> 
                <input class="uk-input" name="title" value="{{ old('title') }}">
              </div>
              @error('title')
                  <div class="invalid-feedback uk-alert-danger" uk-alert>
                      <strong>{{ $message }}</strong>
                  </div>
              @enderror
              <div class="form-content">
                <label for="content" class="form-content">内容</label> 
                <textarea class="uk-input" name="content" cols="50" rows="10">{{ old('content') }}</textarea>        
              </div>
              @error('content')
                  <div class="invalid-feedback uk-alert-danger" uk-alert>
                      <strong>{{ $message }}</strong>
                  </div>
              @enderror
              <input class="uk-input" type="file" id="file" name="radio" class="form-control" accept="audio/*">
              <div class="uk-align-right">
                <button class="uk-button uk-button-primary" type="submit">投稿する</button>
              </div>

    </form>
  </div>
  <div class="description">
    <h1>投稿</h1>
  </div>
</div>
@endsection