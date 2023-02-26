@extends('adminlte::page')

@section('title', 'GIPL - Detalles del alumno')

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
            @if ($student->scholar_group_id != null)
                <h1>Alumno Nº {{ $student->group_num }} del grupo {{ $student->scholarGroup->name }}</h1>
            @else
                <h1>Alumno Nº {{ $student->id }}</h1>
            @endif
        </div>

        <div class="card-footer">
            <div class="d-flex flex-row">
                @can('app.students.edit')
                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('app.students.edit', $student) }}">Editar</a>
                @endcan
                @can('app.students.destroy')
                    <form action="{{ route('app.students.destroy', $student) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="card">

        <div class="card-header">
            @php
                $day = \Carbon\Carbon::parse($student->created_at)->format('d');
                $month = \Carbon\Carbon::parse($student->created_at)->format('F');
                $year = \Carbon\Carbon::parse($student->created_at)->format('Y');
                $hour = \Carbon\Carbon::parse($student->created_at)->format('g:i A');
            @endphp
        </div>

        <div class="card-body">

            @if ($student->computer != null)
                <h2>Aula {{ $student->computer->classroom->num }}</h2>
            @else
                <h2>Sin aula asociada</h2>
            @endif

            <hr>


            <h4 class="bg-secondary p-2">Datos del alumno</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item justify-content-between align-items-center">
                    <strong>Nombre</strong> {{ $student->name }}
                </li>
                <li class="list-group-item justify-content-between align-items-center">
                    <strong>Apellidos</strong> {{ $student->surname }}
                </li>
                <li class="list-group-item justify-content-between align-items-center">
                    <strong>Nº de lista</strong> {{ $student->group_num }}
                </li>
            </ul>


            {{-- <h4 class="bg-primary p-2">Estudiante responsable durante el turno</h4>
            <ul class="list-group mb-4">
                @if ($incidence->student)
                    <li class="list-group-item"> <strong>Alumno: </strong> {{ $incidence->student->name }}</li>
                    <li class="list-group-item"> <strong>Grupo Escolar: </strong> {{ $incidence->student->group_num }}</li>
                @else
                    <li class="list-group-item"> Sin estudiante asignado</li>
                @endif
            </ul> --}}

            @if ($student->computer_id != null)
                <h4 class="bg-primary p-2">Ordenador asociado</h4>
                <ul class="list-group mb-4">
                    <li class="list-group-item justify-content-between align-items-center">
                        <strong>Ordenador</strong> {{ $student->computer->num }}
                    </li>
                </ul>
            @endif
        </div>

        {{-- @if ($incidence->revisionHistory->Count())


            <div class="card-footer">
                <h4 class="mt-4">Histórico</h4>

                @php
                    $lastUpdateDate = new Date();
                    $cardOpen = false;
                @endphp

                @foreach ($incidence->revisionHistory as $history)
                    @php
                        $displayUser = isset($history->userResponsible()->name) ? $history->userResponsible()->name : 'usuario eliminado';
                        $day = \Carbon\Carbon::parse($history->updated_at)->format('d');
                        $month = \Carbon\Carbon::parse($history->updated_at)->format('F');
                        $year = \Carbon\Carbon::parse($history->updated_at)->format('Y');
                        $hour = \Carbon\Carbon::parse($history->updated_at)->format('g:i A');
                    @endphp

                    @if ($lastUpdateDate != $history->updated_at && !$cardOpen)
                        <div class="card">

                            <div class="card-header bg-secondary">
                                Actualizado por <strong>{{ $displayUser }}</strong> el {{ $day }} de
                                {{ $month }} del {{ $year }} a las
                                {{ $hour }}
                            </div>
                            @php
                                $lastUpdateDate = $history->updated_at;
                                $cardOpen = true;
                            @endphp
                    @endif

                    <div class="card-body">
                        Campo
                        <strong>{{ $history->fieldName() }}</strong> actualizado de {{ $history->oldValue() }} a
                        {{ $history->newValue() }}
                    </div>

                    @if ($lastUpdateDate != $history->updated_at && $cardOpen)
            </div> <!-- fin de div card -->

            @php
                $cardOpen = false;
            @endphp
        @endif
        @endforeach
    </div>
    @endif --}}
    </div>

@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop --}}
