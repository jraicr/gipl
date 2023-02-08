@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Creación de una incidencia</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('app.incidences.create')}}">Crear incidencia</a>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'app.incidences.store']) !!}
            <div class="form-group">
                {!! Form::label('description', 'Descripción') !!}
                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Describe la incidencia']) !!}
            </div>
            <div class="form-group">

                {!! Form::label('description', 'Descripción') !!}
            </div>
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
