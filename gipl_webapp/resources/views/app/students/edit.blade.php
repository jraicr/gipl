@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    @if ($student->scholar_group_id != null)
        <h1>Editando alumno Nº {{ $student->group_num }} del grupo {{ $student->scholarGroup->name }}</h1>
    @else
        <h1>Editando alumno Nº {{ $student->id }}</h1>
    @endif
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif

    @if ($student->computer != null && $student->computer->classroom == null)
        <div class="alert alert-warning fade show" id="alert" role="alert">
            @can('app.computers.edit')
                <strong>Advertencia:</strong> Este estudiante está asignado a un ordenador ({{$student->computer->num}}) sin aula. Por favor, <a class="alert-link" href="{{-- {{ route('app.computers.edit', $student->computer) }} --}}">seleccione un nuevo aula<a/> para este ordenador o asigne un nuevo ordenador a este alumno.
            @else
                <strong>Advertencia:</strong> Este estudiante está asignado a un ordenador ({{$student->computer->num}}) sin aula. Contacte con un administrador para que seleccione un nuevo aula para este ordenador o asigne un nuevo ordenador a este alumno.
            @endcan

        </div>
    @endif


    <div class="card">

        <div class="card-body">


            {!! Form::model($student, ['route' => ['app.students.update', $student], 'autocomplete' => 'off', 'method' => 'put']) !!}

                @livewire('app.students.partials.form', ['student' => $student, 'scholarGroups' => $scholarGroups, 'classrooms' => $classrooms])

        </div>

        <div class="card-footer">
            {!! Form::submit('Editar Alumno', ['class' => 'btn btn-primary']) !!}
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
