@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Editando periférico nº {{$peripheral->id}}</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif


    <div class="card">

         {{-- <div class="card-header">

        </div> --}}

        <div class="card-body">


            {!! Form::model($peripheral, ['route' => ['app.peripherals.update', $peripheral], 'autocomplete' => 'off', 'method' => 'put']) !!}

                @livewire('app.peripherals.partials.form', ['peripheral' => $peripheral, 'classrooms' => $classrooms])

        </div>

        <div class="card-footer">
            {!! Form::submit('Editar Periférico', ['class' => 'btn btn-primary']) !!}
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
