@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }}タスクの詳細ページ</h1>
    
    <div class="row">
        <div class="col-6">
            <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>ステータス</th>
            <td>{{ $task->status }}</td>
        </tr>
    </table>
    
    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('tasks.edit', 'このメッセージを編集', ['task' => $task->id], ['class' => 'btn btn-light']) !!}
    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('tasks.index', 'タスク一覧に戻る', null, ['class' => 'btn btn-success']) !!}
    {{-- メッセージ削除フォーム --}}
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

        </div>
    </div>
@endsection