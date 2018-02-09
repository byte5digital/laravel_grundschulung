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
                    <h2>Aufgaben</h2>
                    <ul>
                        @foreach ($tasks as $task)
                            <li>{{ $task->subject }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6">
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
        </div>
    </section>
</body>
</html>