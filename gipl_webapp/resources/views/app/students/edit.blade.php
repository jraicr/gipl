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
        <div class="alert alert-warning alert-dismissible fade show" id="alert" role="alert">
            <strong>Advertencia:</strong> Este estudiante está asignado a un ordenador <strong>({{$student->computer->num}})</strong> sin aula asignada
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
