@extends('layouts.app')

    @section('content')
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Tâches
                    </th>
                    <th>
                        Description
                    </th>
                    <th class="centered-table-cell">
                        Traité
                    </th>
                    <th class="centered-table-cell">
                        Date Limite
                    </th>
                    <th class="centered-table-cell">
                        Modifier
                    </th>
                    <th class="centered-table-cell">
                        Suprimer
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>
                        {{ $task->title }}
                    </td>
                    <td>
                        {{ $task->description }}
                    </td>
                    <td class="centered-table-cell">
                        <a href=""><i class="fas fa-{{ $task->done === 1 ? 'check' : 'times' }}"></i></a>
                    </td>
                    <td class="centered-table-cell">
                        {{ $task->dead_line }}
                    </td>
                    <td class="centered-table-cell">
                        <a class="btn btn-primary" href="{{ route('tasks.edit', $task) }}"><i class="fas fa-pen"></i></a>
                    </td>
                    <td class="centered-table-cell">
                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            <a id="create-task-link" class="btn btn-primary" href="{{ route('tasks.create') }}"><i class="fas fa-plus"></i></a>
        </div>
    @endsection