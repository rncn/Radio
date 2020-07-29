@extends('layouts.main')
@section('article-main')
<p>{{ $title }}</p>
<p>詳細内容：{!! nl2br(e($content)) !!}</p>
<p>ユーザID：{{ $user_id }}</p>
@endsection