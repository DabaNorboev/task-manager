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
                            @foreach($statusTranslations as $statusKey => $statusTranslation)
                                <option value="{{ $statusKey }}" {{ $task->status == $statusKey ? 'selected' : '' }}>{{ $statusTranslation }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="list-group-item">Дедлайн: <input type="date" class="form-control" name="deadline" value="{{ $task->deadline ?? '' }}"></li>
                    <!-- Убраны поля для последнего изменения и даты создания, так как они обычно не редактируются -->
                </ul>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
@endsection
