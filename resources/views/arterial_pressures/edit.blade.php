@extends('layouts.default')
@section('content')
    <a href="{{ route('arterial_pressures.index') }}" class="btn btn-primary">Назад</a>
    <h1>Редактирование записи: {{ $arterial_pressure->time }} {{ $arterial_pressure->date }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
    <form method="post" action="{{ route('arterial_pressures.update', $arterial_pressure->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="date">Дата</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Дата"
                   value="{{ $arterial_pressure->date }}" required>
        </div>
        <div class="form-group">
            <label for="time">Время</label>
            <input type="time" class="form-control" id="time" name="time" placeholder="Время"
                   value="{{ $arterial_pressure->time }}" required>
        </div>
        <div class="form-group">
            <label for="value1">Вверхнее значение</label>
            <input type="number" class="form-control" id="value1" name="value1" placeholder="Вверхнее значение"
                   value="{{ $arterial_pressure->value1 }}" required>
        </div>
        <div class="form-group">
            <label for="value2">Нижнее значение</label>
            <input type="number" class="form-control" id="value2" name="value2" placeholder="Нижнее значение"
                   value="{{ $arterial_pressure->value2 }}" required>
        </div>
        <div class="form-group">
            <label for="pulse">Пульс</label>
            <input type="number" class="form-control" id="pulse" name="pulse" placeholder="Пульс"
                   value="{{ $arterial_pressure->pulse }}" required>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment"
                      placeholder="Комментарий">@if($arterial_pressure->comment){{ $arterial_pressure->comment }}@endif</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Добавить</button>
    </form>
@endsection
