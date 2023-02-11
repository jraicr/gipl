@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Creación de una incidencia</h1>
@stop

@section('content')

    <div class="card">

        {{-- <div class="card-header">

        </div> --}}

        <div class="card-body">

            {!! Form::open(['route' => 'app.incidences.store', 'autocomplete' => 'off']) !!}

                @livewire('incidence-create')

        </div>

        <div class="card-footer">
            {!! Form::submit('Crear Incidencia', ['class' => 'btn btn-primary']) !!}
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
