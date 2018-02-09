<!doctype html>
<html>
<body>
    <div class="container">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="subject">Aufgaben Text</label>
                <input type="text" name="subject" />
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Absenden</button>
            </div>
        </form>
    </div>
</body>
</html>