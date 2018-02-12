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
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <div class="form-group {{ $errors->has('subject') ? 'has-danger' : '' }}">
                            <label for="subject">Aufgaben Text</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" style="{{ $errors->has('subject') ? 'border-color:red;' : '' }}" />
                            @if ($errors->has('subject'))
                                <div class="form-control-feedback" style="color: red;">
                                    {{  $errors->first('subject') }}
                                </div>
                            @endif
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">Absenden</button>
                        </div>
                    </form>
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
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop