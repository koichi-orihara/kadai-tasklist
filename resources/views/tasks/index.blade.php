@extends('layouts.app')

@section('content')
    @if (\Auth::check())
        {{-- タスク一覧 --}}
        @include('users.users')
    @else
        @include('welcome')
    @endif
    
 @endsection