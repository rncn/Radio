@extends('layouts.frame')
@section('body')
<button type="button" onclick="location.href='/'";>戻る</button>
<p>{{$error_data['message']}}</p>
@endsection