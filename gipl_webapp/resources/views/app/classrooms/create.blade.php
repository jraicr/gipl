@extends('adminlte::page')

@section('title', 'Code Rai')

@section('content_header')
    <h1>Crear nuevo aula</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'app.classrooms.store']) !!}

            @include('app.classrooms.partials.form')

            {!! Form::submit('Crear Aula', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
