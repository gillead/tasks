@extends('layouts.default')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('tasks.index') }}" class="btn btn-primary">К списку задач</a>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success">Редактировать</a>
        </div>
        <div class="panel-body">
            <h1>{{ $task->title }}</h1>
            <h5>Статус</h5>
            <p>{{ $task->status ? 'Выполнена' : 'Не выполнена'}}</p>
            <h5>Приоритет</h5>
            <p>{{ $task->priority }}</p>
            <h5>Дата начала</h5>
            <p>{{ $task->start }}</p>
            @if($task->end)
                <h5>Дата окончания</h5>
                <p>{{ $task->end  }}</p>
            @endif
            @if($task->description)
                <h5>Описание</h5>
                <p>{{ $task->description }}</p>
            @endif
            @if($task->comment)
                <h5>Комментарий</h5>
                <p>{{ $task->description }}</p>
            @endif
        </div>
@endsection
