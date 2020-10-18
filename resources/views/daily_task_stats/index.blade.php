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
            <a href="{{ route('daily_tasks.index') }}" class="btn btn-primary">
                Назад
            </a>
            <form action="{{ route('daily_task_stats.index') }}">
                <div class="form-group">
                    <label for="date">Дата</label>
                    <select name="sdate" class="form-control" id="date" onchange="this.form.submit()">
                        @foreach($dates as $date)
                            <option @if($date->date == $sdate)selected @endif>{{ $date->date }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Дата</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($stats as $stat)
                    <tr>
                        <td>{{ $stat->id }}</td>
                        <td>{{ $stat->dailyTask->title  }}</td>
                        <td>{{ $stat->date }}</td>
                        <td align="right">
                            <form action="{{ route('daily_task_stats.destroy', $stat->id) }}" method="post"
                                  class="d-inline">
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
            @if($failedDailyTasks)
                <h4>Невыполненные задания</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Дата</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($failedDailyTasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td align="right">
                                <a href="{{ route('daily_tasks.show', $task->id) }}" class="btn btn-info">Детально</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
