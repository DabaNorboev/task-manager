@extends('layouts.pagebase')
@section('content')

{{--    Создать задачу--}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        Создать новое задание
                    </div>
                    <div class="card-body">
                        <form action="{{ route('task.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="taskTitle">Заголовок<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="taskTitle" placeholder="Введите заголовок задания" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="taskDescription">Описание</label>
                                <textarea class="form-control" id="taskDescription" rows="3" placeholder="Введите описание задания" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="taskDeadline">Дедлайн</label>
                                <input type="date" class="form-control" id="taskDeadline" name="deadline">
                            </div>
                            <div class="form-group">
                                <label for="attachment">Прикрепить файл</label>
                                <input type="file" class="form-control" id="attachment" name="attachment">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    Фильтрация задач по статусу--}}

<form action="{{ route('main') }}" method="get">
    <div class="mb-3">
        <label for="status" class="form-label">Выберите статус задачи</label>
        <select class="form-select" id="status" name="status">
            @foreach($statuses as $id => $name)
                <option value="{{ $id }}" {{ $selectedStatus == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Показать</button>
</form>

{{--    Отображение всех задач, задачи отображаются в блоках по статусу--}}

@foreach($tasks->groupBy('status_id') as $statusId => $statusTasks)
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $statuses[$statusId] }}</h5>
                    <div class="row g-4">
                        @foreach($statusTasks as $task)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $task->title }}</h5>
                                        <p class="card-text">{{ $task->description ?? '' }}</p>
                                        <p class="card-text">Дедлайн: {{ $task->deadline ?? '' }}</p>
                                        <a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ route('task', ['id' => $task->id]) }}">К задаче</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
