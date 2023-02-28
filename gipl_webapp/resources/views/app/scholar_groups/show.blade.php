@extends('adminlte::page')

@section('title', 'GIPL - Detalle de incidencia')

@section('content_header')
    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h1>Grupo Escolar {{ $scholarGroup->name }}</h1>
        </div>

        @can('app.scholar_groups.edit')
            <div class="card-footer">
                <div class="d-flex flex-row">
                    <a class="btn btn-primary btn-sm mr-2"
                        href="{{ route('app.scholar_groups.edit', $scholarGroup) }}">Editar</a>


                    <form action="{{ route('app.scholar_groups.destroy', $scholarGroup) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>

                </div>
            </div>
        @endcan
    </div>
@stop

@section('content')

    <div class="card">

        <div class="card-header">
            @php
                $day = \Carbon\Carbon::parse($scholarGroup->created_at)->format('d');
                $month = \Carbon\Carbon::parse($scholarGroup->created_at)->format('F');
                $year = \Carbon\Carbon::parse($scholarGroup->created_at)->format('Y');
                $hour = \Carbon\Carbon::parse($scholarGroup->created_at)->format('g:i A');
            @endphp
        </div>

        <div class="card-body">
            <h4 class="bg-primary p-2">Datos del grupo escolar</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item justify-content-between align-items-center">
                    <strong>Nombre</strong> {{ $scholarGroup->name }}
                </li>

                <li class="list-group-item justify-content-between align-items-center">
                    <strong>Nº de estudiantes</strong> {{ $scholarGroup->students->Count() }}
                </li>
            </ul>

            <h4 class="bg-primary p-2">Listado de estudiantes</h4>

            <ul class="list-group mb-4">
                @if ($scholarGroup->students->Count())
                    @foreach ($scholarGroup->students->toQuery()->orderBy('group_num')->get() as $student)
                        <li class="list-group-item justify-content-between align-items-center">

                            <strong>#{{ $student->group_num }}</strong> {{ $student->name }} {{ $student->surname }}

                            @can('app.students.edit')
                                <a href="{{ route('app.student_remove_scholar_group.update', ['scholar_group' => $scholarGroup, 'student' => $student]) }}"
                                class="btn btn-sm btn-danger float-right">Eliminar del grupo</a>
                            @endcan

                            @can('app.students.show')
                                <a href="{{ route('app.students.show', $student) }}"
                                class="btn btn-sm btn-secondary float-right mr-3">Ver alumno</a>
                            @endcan
                        </li>
                    @endforeach

                    @else
                    <li class="list-group-item justify-content-between align-items-center">
                        <strong>Este grupo no cuenta con estudiantes</strong>
                    </li>

                @endif

            </ul>
        </div>



    </div>

@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop --}}
