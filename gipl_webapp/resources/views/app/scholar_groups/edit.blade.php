@extends('adminlte::page')

@section('title', 'Code Rai')

@section('content_header')
    <h1>Editando el grupo {{$scholarGroup->name}}</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($scholarGroup, ['route' => ['app.scholar_groups.update', $scholarGroup], 'method' => 'put']) !!}

            @include('app.scholar_groups.partials.form')

            {!! Form::submit('Editar Grupo', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
