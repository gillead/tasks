@extends('layouts.default')
@section('content')
    <a href="{{ route('arterial_pressures.index') }}" class="btn btn-primary">Назад</a>
    <h1>Создание записи</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{ route('arterial_pressures.store') }}">
        @csrf
        <div class="form-group">
            <label for="date">Дата</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Дата" required>
        </div>
        <div class="form-group">
            <label for="time">Время</label>
            <input type="time" class="form-control" id="time" name="time" placeholder="Время" required>
        </div>
        <div class="form-group">
            <label for="value1">Вверхнее значение</label>
            <input type="number" class="form-control" id="value1" name="value1" placeholder="Вверхнее значение" required>
        </div>
        <div class="form-group">
            <label for="value2">Нижнее значение</label>
            <input type="number" class="form-control" id="value2" name="value2" placeholder="Нижнее значение" required>
        </div>
        <div class="form-group">
            <label for="pulse">Пульс</label>
            <input type="number" class="form-control" id="pulse" name="pulse" placeholder="Пульс" required>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment" placeholder="Комментарий"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
    </form>
@endsection
