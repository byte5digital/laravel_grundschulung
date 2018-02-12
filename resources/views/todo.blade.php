@extends('layouts.app')

@section('content')
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>ToDos:</h2>
                    <tasks :tasks="{{ $tasks }}"></tasks>
                </div>
                <div class="col-md-6" style="border-left: 1px solid #ddd">
                    <h2>Erstelle eine neue Aufgabe</h2>
                    <task-create></task-create>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>Erledigte Aufgaben:</h2>
                    <ul>
                        @foreach ($finishedTasks as $task)
                            <li>
                                <p>
                                    {{ $task->subject }} - {{ $task->done_at->format('d.m.Y H:m:s') }} |
                                    Erledigt von <b>{{ $task->worker->name }}</b>
                                </p></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop