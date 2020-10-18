@extends('layouts.default')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><a href="{{ route('tasks.index') }}" class="btn btn-primary">К списку задач</a></div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Дата начала</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->start  }}</td>
                        <td style="text-align:right;">
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Детально</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-success">Редактировать</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post" class="d-inline">
                                @csrf
                                <input type="submit" value="Удалить" class="btn btn-danger" onclick="return confirm('Вы уверены что хотите удалить?')">
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
