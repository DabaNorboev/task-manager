@extends('layouts.pagebase')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h5>{{ $task->title }}</h5>
        </div>
        <div class="card-body">
            <p>{{ $task->description }}</p>
            <p>Статус: {{ $statuses[$task->status_id] }}</p>
            <p>Дедлайн: {{ $task->deadline ?? 'Нет' }}</p>
            <p class="text-muted">Последнее изменение: {{ $task->updated_at }}</p>
            <p class="text-muted">Дата создания: {{ $task->created_at }}</p>

            @if(!empty($attachments))
                <p>Прикрепленные файлы:</p>
                @foreach($attachments as $attachment)
                    <a href="{{route('attachment.download', ['id' => $attachment->id])}}">{{ $attachment->name }}</a>
                @endforeach
            @else
                <p>Прикрепленных файлов нет</p>
            @endif

        </div>
        <div class="card-footer">
            <a href="{{ route('task.update.form', ['id' => $task->id]) }}" class="btn btn-primary">Изменить</a>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Комментарии к задаче
                    </div>
                    @if(count($comments)===0)
                        <div class="card-body">
                            <p class="text-muted">Комментариев нет</p>
                        </div>
                    @endif
                    @foreach($comments as $comment)
                    <div class="card-body">
                        <div class="mb-3">
                            <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->text }}</p>
                            <p class="text-muted">{{ $comment->created_at }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('comment.create') }}" method="post">
        @csrf
        <input type="hidden" name="task_id" value="{{ $task->id }}">
        <div class="mb-3">
            <label for="text" class="form-label">Новый комментарий</label>
            <textarea class="form-control" id="text" name="text" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
