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
        <div class="panel-heading"><a href="{{ route('tasks.create') }}" class="btn btn-success">Добавить задачу</a></div>
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
                            <a href="/tasks/{{ $task->id }}" class="btn btn-info">Детально</a>
                            <a href="/tasks/edit/{{ $task->id }}" class="btn btn-success">Редактировать</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
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
