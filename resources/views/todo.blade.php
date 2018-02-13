@extends('layouts.app')

@section('content')
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>ToDos:</h2>
                    <tasks :data="{{ $tasks }}"></tasks>
                </div>
                <div class="col-md-6" style="border-left: 1px solid #ddd">
                    <h2>Erstelle eine neue Aufgabe</h2>
                    <task-create></task-create>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>Erledigte Aufgaben:</h2>
                    <tasks-done :data="{{ $finishedTasks }}"></tasks-done>
                </div>
            </div>
        </div>
    </section>
@stop