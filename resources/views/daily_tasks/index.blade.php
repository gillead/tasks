@extends('layouts.default')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            @if(is_array($message))
                @foreach ($message as $m)
                    {{ $m }}
                @endforeach
            @else
                {{ $message }}
            @endif
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('daily_tasks.create') }}" class="btn btn-success">Добавить
                ежедневную задачу</a>
            <a href="{{ route('daily_task_stats.index') }}" class="btn btn-primary">Статистика</a>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($daily_tasks as $task)
                    <tr @if($stat = $task->getStat())class="table-success" @endif>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td align="right">
                            @if($stat)
                                <a href="#" class="btn btn-primary disabled">Выполнить</a>
                            @else
                                <form method="post" class="d-inline" action="{{ route('daily_task_stats.store') }}">
                                    @csrf
                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                    <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                                    <button class="btn btn-primary" type="submit">Выполнить</button>
                                </form>
                            @endif
                            <a href="{{ route('daily_tasks.show', $task->id) }}" class="btn btn-info">Детально</a>
                            <a href="{{ route('daily_tasks.edit', $task->id) }}"
                               class="btn btn-success">Редактировать</a>
                            <form action="{{ route('daily_tasks.destroy', $task->id) }}" method="post" class="d-inline">
                                @csrf
                                <input type="submit" value="Удалить" class="btn btn-danger"
                                       onclick="return confirm('Вы уверены что хотите удалить?')">
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
