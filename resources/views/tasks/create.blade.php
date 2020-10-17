@extends('layouts.default')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Название задачи</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Название" required>
        </div>
        <div class="form-group">
            <label for="start">Дата начала</label>
            <input type="date" class="form-control" id="start" name="start" placeholder="Дата начала" required>
        </div>
        <div class="form-group">
            <label for="end">Дата окончания</label>
            <input type="date" class="form-control" id="end" name="end" placeholder="Дата окончания">
        </div>
        <div class="form-group">
            <label for="description">Описание задачи</label>
            <textarea class="form-control" id="description" name="description" placeholder="Дата начала"></textarea>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий к задаче</label>
            <textarea class="form-control" id="comment" name="comment" placeholder="Комментарий"></textarea>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="status" name="status">
            <label class="form-check-label" for="status">Статус</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Добавить</button>
    </form>
@endsection
