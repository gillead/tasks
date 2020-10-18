@extends('layouts.default')
@section('content')
    <a href="{{ route('daily_tasks.index') }}" class="btn btn-primary">К списку задач</a>
    <h1>{{ $task->title }}</h1>
    @if($task->description)
        <h5>Описание</h5>
        <p>{{ $task->description }}</p>
    @endif
    @if($task->comment)
        <h5>Комментарий</h5>
        <p>{{ $task->description }}</p>
    @endif
@endsection
