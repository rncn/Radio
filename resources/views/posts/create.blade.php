@extends('layouts.form')
@section('article-main')
<div class="form">
  <div class="mainform">
    <form method="post" action="{{ route('posts.create') }}" enctype="multipart/form-data">
    @csrf
          
              <div class="form-title">
                <label for="title">タイトル</label> 
                <input type="text" name="title" value="{{ old('title') }}">
              </div>
              @error('title')
                  <div class="invalid-feedback form-alert">
                      <strong>{{ $message }}</strong>
                  </div>
              @enderror
              <div class="form-content">
                <label for="content" class="form-content">内容</label> 
                <textarea class="form-button" name="content" cols="50" rows="10">{{ old('content') }}</textarea>        
              </div>
              @error('content')
                  <div class="invalid-feedback form-alert">
                      <strong>{{ $message }}</strong>
                  </div>
              @enderror
              <input type="file" id="file" name="radio" class="form-control" accept="audio/*">
              <div class="uk-align-right">
                <button class="form-button" type="submit">投稿する</button>
              </div>

    </form>
  </div>
  <div class="description">
    <h1>投稿</h1>
  </div>
</div>
@endsection