@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Creación de una ordenador</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            {!! Form::open(['route' => 'app.computers.store', 'autocomplete' => 'off']) !!}

                @livewire('app.computers.partials.form', ['classrooms' => $classrooms])

        </div>

        <div class="card-footer">
            {!! Form::submit('Crear Ordenador', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop --}}
