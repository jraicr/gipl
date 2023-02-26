@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Incorporación de un alumno</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            {!! Form::open(['route' => 'app.students.store', 'autocomplete' => 'off']) !!}

                @livewire('app.students.partials.form', ['scholarGroups' => $scholarGroups, 'classrooms' => $classrooms])

        </div>

        <div class="card-footer">
            {!! Form::submit('Añadir Alumno', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop