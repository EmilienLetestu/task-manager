@extends('layouts.app')

    @section('content')

        <h1>Modifier la tâche</h1>

        {!! Form::open(['method' => 'put', 'url' => route('tasks.update', $task->id)]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Nommer la tâche') !!}
            {!! Form::text('title',$task->title,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description  de la tâche') !!}
            {!! Form::textarea('description',$task->description,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('dead_line', 'A finir pour le') !!}
            {!! Form::date('dead_line',$task->dead_line,['class' => 'form-control']) !!}
        </div>
        <button class="btn btn-primary">Valider</button>
        {!! Form::close() !!}


    @endsection