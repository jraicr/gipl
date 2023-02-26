@extends('adminlte::page')

@section('title', 'Code Rai')

@section('content_header')
    <h1>Editando el aula {{$classroom->num}}</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($classroom, ['route' => ['app.classrooms.update', $classroom], 'method' => 'put']) !!}

            @include('app.classrooms.partials.form')

            {!! Form::submit('Editar Aula', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
