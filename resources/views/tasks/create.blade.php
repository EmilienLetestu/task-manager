@extends('layouts.app')

    @section('content')

        @include('error')

        <h1>Nouvelle tâche</h1>

        {!! Form::open(['url' => route('tasks.store')]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Nommer la tâche') !!}
                {!! Form::text('title',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description  de la tâche') !!}
                {!! Form::textarea('description',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('dead_line', 'A finir pour le') !!}
                {!! Form::date('dead_line',null,['class' => 'form-control']) !!}
            </div>
            <button class="btn btn-primary">Valider</button>
        {!! Form::close() !!}

    @endsection