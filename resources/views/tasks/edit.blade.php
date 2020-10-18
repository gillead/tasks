@extends('layouts.default')
@section('content')
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Назад</a>
    <h1>Редактирование задачи: {{ $task->title }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
    <form method="post" action="{{ route('tasks.update', $task->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title">Название задачи</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Название"
                   value="{{ $task->title }}" required>
        </div>
        <div class="form-group">
            <label for="start">Дата начала</label>
            <input type="date" class="form-control" id="start" name="start" placeholder="Дата начала"
                   value="{{ date('Y-m-d', strtotime($task->start)) }}" required>
        </div>
        <div class="form-group">
            <label for="end">Дата окончания</label>
            <input type="date" class="form-control" id="end" name="end"
                   @if($task->end))
                   value="{{ date('Y-m-d', strtotime($task->end)) }}"
                   @endif
                   placeholder="Дата окончания">
        </div>
        <div class="form-group">
            <label for="description">Описание задачи</label>
            <textarea class="form-control" id="description" name="description"
                      placeholder="Описание">@if($task->description){{ $task->description }}@endif</textarea>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий к задаче</label>
            <textarea class="form-control" id="comment" name="comment"
                      placeholder="Комментарий">@if($task->comment){{ $task->comment }}@endif</textarea>
        </div>
        <div class="form-group">
            <label for="priority">Приоритет</label>
            <select class="form-control" id="priority" name="priority">
                @foreach([1,2,3,4,5] as $item)
                    <option @if($task->priority == $item)selected @endif>{{$item}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="status" name="status" @if($task->value)checked @endif>
            <label class="form-check-label" for="status">Статус</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Добавить</button>
    </form>
@endsection
