@extends('layouts.main')
@section('article-main')
<div class="home">
  <div class="home-wrapper">
    <div class="home-tl">
    @include('layouts.loginnav')
    @include('layouts.loginnav')
    </div>
    <div class="home-nav">
      <section id="user_info">
        @include('layouts.loginnav')
        <app-userinfo>
          <img src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( $userinfo->email ) ) ) }}?s=120">
          <h2>{{ $userinfo->displayname }}</h2>
          <h6>{{ __('@') }}{{ $userinfo->name }}</h6>
          <app-follow>
            <form>
              <button type="ewe" class="followbutton" style="padding: 15px;">Follow</button>
              <button class="followbutton active" style="padding: 15px;">Follow</button>
            </form>
            <p>{{$followers}}&nbsp;Followers</p>
          </app-follow>
          @if($userfollowed)
            <p class="uk-label">Follows you</p>
          @endif
          @if(Auth::check())
            @if(Auth::user()->id == $userinfo->id)
            <a class="uk-label uk-label-warning">編集</a>
            @endif
          @endif
          <p>{!! nl2br(e($userinfo->description)) !!}</p>
        </app-userinfo>
      </section>
    </div>
  </div>
</div>
@endsection