@extends('adminlte::page')

@section('title', 'Code Rai')

@section('content_header')
    <h1>Crear nuevo grupo escolar</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'app.scholar_groups.store']) !!}

            @include('app.scholar_groups.partials.form')

            {!! Form::submit('Crear Grupo', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
