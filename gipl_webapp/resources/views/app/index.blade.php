@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>GIPL - Gestión de incidencias en Puestos de Laboratorios</h1>
@stop

@section('content')

    @if (!auth()->user()->roles()->get()->Count())
    <div class="alert alert-info" role="alert">
        Debes contactar con un administrador para que te asigne un rol de usuario.
      </div>
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
