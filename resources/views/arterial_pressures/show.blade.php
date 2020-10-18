@extends('layouts.default')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('arterial_pressures.index') }}" class="btn btn-primary">К календарю</a>
            <a href="{{ route('arterial_pressures.edit', $arterial_pressure->id) }}" class="btn btn-success">Редактировать</a>
        </div>
        <div class="panel-body">
            <h5>Дата/время</h5>
            <p>{{ $arterial_pressure->date }}/{{ $arterial_pressure->time }}</p>
            <h5>Значение</h5>
            <p>{{ $arterial_pressure->value1 }}/{{ $arterial_pressure->value2 }}</p>
            <h5>Пульс</h5>
            <p>{{ $arterial_pressure->pulse }}</p>
            @if($arterial_pressure->comment)
                <h5>Комментарий</h5>
                <p>{{ $arterial_pressure->comment }}</p>
            @endif
        </div>
@endsection
