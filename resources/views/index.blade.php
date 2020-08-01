@extends('layouts.main')
@section('active', '1')
@section('article-main')
<div class="home">
  @if(Auth::check())
  
  @endif
  <div class="home-wrapper">
    <div class="home-nav">
      <p>トレンド</p>
      <ol style="list-style-type: hebrew;">
        <li><a href="trending">とれんどってるてぃんうぃ？？？？？？？？？？？</a></li>
        <li><a href="trending">とれんどってるてぃんうぃ？？？？？？？？？？？</a></li>
        <li><a href="trending">とれんどってるてぃんうぃ？？？？？？？？？？？</a></li>
      </ol>
    </div>
    <div class="home-tl">
      <div class="showcase" style="background-image: url(https://cdn.pixabay.com/photo/2020/07/03/06/12/people-5365324_1280.jpg);">
        <div class="content">
          <p>Recommended</p>
          <h2>EasyDocPrimary2020</h2>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection