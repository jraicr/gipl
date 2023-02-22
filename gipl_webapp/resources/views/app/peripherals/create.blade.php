@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Creación de un periférico</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">

            {!! Form::open(['route' => 'app.peripherals.store', 'autocomplete' => 'off']) !!}

                @livewire('app.peripherals.partials.form', ['classrooms' => $classrooms])

        </div>

        <div class="card-footer">
            {!! Form::submit('Crear Periférico', ['class' => 'btn btn-primary']) !!}
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
