@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Creación de una incidencia</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('app.incidences.create') }}">Crear incidencia</a>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'app.incidences.store']) !!}
            <div class="form-group">
                {!! Form::label('description', 'Descripción') !!}
                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Describe la incidencia']) !!}
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Estado</p>
                <div class="form-check form-check-inline">


                    @foreach ($states as $state)
                        {!! Form::radio('state', $state->name, null, ['class' => 'form-check-input']) !!}
                        {!! Form::label('state', $state->name, ['class' => 'form-check-label mr-2']) !!}
                    @endforeach


                </div>
            </div>
            <div class="form-group">
                {!! Form::label('classroom', 'Aula:') !!}
                <input list="classrooms" id="classroom" name="classroom" />
                <datalist id="classrooms">

                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->num }}">
                    @endforeach

                </datalist>
            </div>

            <div class="form-group">
                {!! Form::label('computer', 'Equipo:') !!}
                <input list="computers" id="computer" name="computer" />


                {{-- @foreach ($computers->where('classroom_id', $selectedClassroom) as $computersAux)
                    @foreach ($computersAux as $computer)
                        <p>{{$computer}}</p>
                    @endforeach
                @endforeach --}}


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
