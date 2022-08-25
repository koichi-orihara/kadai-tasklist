@extends('layouts.app')

@section('content')
    @if (\Auth::check())
        {{-- タスク一覧 --}}
        @include('users.users')
    @else
        xbckjabsdjkcb
        @include('welcome')
    @endif
    
 @endsection