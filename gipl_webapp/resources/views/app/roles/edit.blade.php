@extends('adminlte::page')

@section('title', 'Code Rai')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['app.roles.update', $role], 'method' => 'put']) !!}

            @include('app.roles.partials.form')

            {!! Form::submit('Editar Rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
