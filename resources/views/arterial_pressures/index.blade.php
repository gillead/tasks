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
            <a href="{{ route('arterial_pressures.create') }}" class="btn btn-success">Добавить запись</a>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Дата/Время</th>
                    <th>Значение</th>
                    <th>Пульс</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($arterial_pressures as $ad)
                    <tr>
                        <td>{{ $ad->id }}</td>
                        <td>{{ $ad->date }}/{{ $ad->time }}</td>
                        <td>{{ $ad->value1 }}/{{ $ad->value2 }}</td>
                        <td>{{ $ad->pulse }}</td>
                        <td style="text-align:right;">
                            <a href="{{ route('arterial_pressures.show', $ad->id) }}" class="btn btn-info">Детально</a>
                            <a href="{{ route('arterial_pressures.edit', $ad->id) }}" class="btn btn-success">Редактировать</a>
                            <form action="{{ route('arterial_pressures.destroy', $ad->id) }}" method="post" class="d-inline">
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
