@extends('layouts.default')
@section('content')
    <img src="{{ asset('/img/mina.jpg') }}" class="img-fluid">
    @if($daily_tasks)
        <h2 class="mt-3">Ежедневные задачи</h2>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                @foreach($daily_tasks as $task)
                    @if($stat = $task->getStat())
                        <button class="btn btn-success" type="submit" disabled>{{ $task->title }}</button>
                    @else
                        <form method="post" class="" action="{{ route('daily_task_stats.store') }}">
                            @csrf
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                            <button class="btn btn-outline-primary" type="submit">{{ $task->title }}</button>
                        </form>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
    @if($tasks)
        <h2 class="mt-3">Задачи</h2>
        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item">
                    <a href="{{ route('tasks.show', $task->id) }}">
                        {{ $task->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
