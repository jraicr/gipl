@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Editando incidencia X</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success" alert-dismissible fade show" id="alert" role="alert">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif


@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop --}}
