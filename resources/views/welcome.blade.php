@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>タスクリストへようこそ！！</h1>
            <h3>~様々なタスク管理ができます。~</h3>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', '会員登録をする！', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection