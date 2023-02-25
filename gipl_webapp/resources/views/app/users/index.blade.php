@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    @livewire('app.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
