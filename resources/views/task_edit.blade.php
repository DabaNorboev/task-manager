@extends('layouts.pagebase')
@section('content')
    <form action="{{ route('task.update', ['id' => $task->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card mt-3">
            <div class="card-header">
                <input type="text" class="form-control" name="title" value="{{ $task->title }}">
            </div>
            <div class="card-body">
                <textarea class="form-control" rows="3" name="description">{{ $task->description ?? '' }}</textarea>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Статус:
                        <select class="form-select" name="status">
                            @foreach($statuses as $id => $name)
                                <option value="{{ $id }}" {{ $task->status_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="list-group-item">Дедлайн: <input type="date" class="form-control" name="deadline" value="{{ $task->deadline ?? '' }}"></li>
                    <li class="list-group-item text-muted">Последнее изменение: {{ $task->updated_at }}</li>
                    <li class="list-group-item text-muted">Дата создания: {{ $task->created_at }}</li>
                    <li class="list-group-item">
                        @if($task->attachment)
                            <p>Прикрепленный файл: {{ $task->attachment }}</p>
                            <label for="attachment">Заменить файл</label>
                        @else
                            <label for="attachment">Прикрепить файл</label>
                        @endif
                        <input type="file" class="form-control" id="attachment" name="attachment">
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>

@endsection
