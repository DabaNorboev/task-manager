@extends('layouts.pagebase')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        Создать новое задание
                    </div>
                    <div class="card-body">
                        <form action="{{route('task.create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="taskTitle">Заголовок<span class="text-danger">*</span></label>
                                <input type="text" class="form-control required" id="taskTitle" placeholder="Введите заголовок задания" name="title">
                            </div>
                            <div class="form-group">
                                <label for="taskDescription">Описание</label>
                                <textarea class="form-control" id="taskDescription" rows="3" placeholder="Введите описание задания" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="taskDeadline">Дедлайн</label>
                                <input type="date" class="form-control" id="taskDeadline" name="deadline">
                            </div>
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
            @foreach($tasks as $task)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$task->task->title}}</h5>
                        <p class="card-text">{{$task->task->description ?? ''}}</p>
                        <p class="card-text">Дедлайн: {{$task->task->deadline ?? ''}}</p>
                        <p class="card-text text-muted">Дата создания: {{$task->task->created_at}}</p>
                        <p class="card-text text-muted">Последнее изменение: {{$task->task->updated_at}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection










{{--<p class="card-text">Файл: <a href="#">Ссылка на файл</a></p>--}}
{{--<div class="form-group">--}}
{{--    <label for="taskDescription">Файл(можно добавить один в формате URL)</label>--}}
{{--    <input type="text" class="form-control" id="taskTitle" placeholder="Введите заголовок задания">--}}
{{--</div>--}}
