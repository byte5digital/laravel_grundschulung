<!doctype html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>ToDos:</h2>
                    @foreach ($tasks as $task)
                        <form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST" class="form-inline">
                            @csrf
                            @method('put')

                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                <input type="checkbox" class="form-check-input" name="done">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">{{ $task->subject }}</span>
                            </label>

                            <button type="submit" class="btn btn-link">Update</button>

                        </form>
                    @endforeach
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
                            <li>{{ $task->subject }} - {{ $task->done_at->format('d.m.Y H:m:s') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>
</html>