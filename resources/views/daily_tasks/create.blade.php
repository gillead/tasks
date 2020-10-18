@extends('layouts.default')
@section('content')
    <a href="{{ route('daily_tasks.index') }}" class="btn btn-primary">Назад</a>
    <h1>Создание ежедневной задачи</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{ route('daily_tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Название задачи</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Название" required>
        </div>
        <div class="form-group">
            <label for="description">Описание задачи</label>
            <textarea class="form-control" id="description" name="description" placeholder="Описание"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Добавить</button>
    </form>
@endsection
