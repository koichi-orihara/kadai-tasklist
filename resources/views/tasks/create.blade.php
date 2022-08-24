@extends('layouts.app')

@section('content')

    <h1>タスクの追加ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            
            {{-- タスク一覧ページへのリンク --}}
            {!! link_to_route('tasks.index', 'タスク一覧に戻る', null, ['class' => 'btn btn-light']) !!}

        </div>
    </div>
@endsection