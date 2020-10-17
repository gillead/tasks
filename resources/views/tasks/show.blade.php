@extends('layouts.default')
@section('content')
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">К списку задач</a>
    <h1>{{ $task->title }}</h1>
    <h5>Статус</h5>
    <p>{{ $task->status ? 'Выполнена' : 'Не выполнена'}}</p>
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
@endsection
