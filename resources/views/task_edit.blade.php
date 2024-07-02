@extends('layouts.pagebase')
@section('content')
    <form action="{{ route('task.update', ['id' => $task->id]) }}" method="post" enctype="multipart/form-data">
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
                        <select class="form-select" name="status_id">
                            @foreach($statuses as $id => $name)
                                <option value="{{ $id }}" {{ $task->status_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="list-group-item">Дедлайн: <input type="date" class="form-control" name="deadline" value="{{ $task->deadline ?? '' }}"></li>
                    <li class="list-group-item text-muted">Последнее изменение: {{ $task->updated_at }}</li>
                    <li class="list-group-item text-muted">Дата создания: {{ $task->created_at }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>

    <div class="container mt-3">
        <div class="row">
            @foreach($attachments as $attachment)
                <form action="{{ route("attachment.delete", ['id' => $attachment->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="col-md-6">
                        <p>Файл: <strong>{{ $attachment->name }}</strong></p>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger" id="deleteBtn">Удалить файл</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>


    <form action="{{ route('attachment.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card mt-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="attachment">Прикрепить файл</label>
                    <input type="file" class="form-control" id="attachment" name="file">
                    <input type="hidden" class="form-control" name="task_id" value="{{ $task->id }}">
                </li>
            </ul>
        </div>
        <div class="card-footer mt-3">
            <button type="submit" class="btn btn-primary">Прикрепить файл</button>
        </div>
    </form>

@endsection
