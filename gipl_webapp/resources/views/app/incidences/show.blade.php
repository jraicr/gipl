@extends('adminlte::page')

@section('title', 'GIPL - Detalle de incidencia')

@php
    $displayState = isset($incidence->state->name) ? $incidence->state->name : 'Sin estado asignado';
@endphp

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
            <h1>Incidencia Nº {{ $incidence->id }} <span
                    class="text-md badge badge-primary badge-pill text-justify ml-2">{{ $displayState }}</span></h1>
        </div>

        @if (
            $incidence->user_id == auth()->user()->id ||
                auth()->user()->hasRole('Admin') ||
                auth()->user()->hasRole('Gestor de incidencias'))
            <div class="card-footer">
                <div class="d-flex flex-row">
                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('app.incidences.edit', $incidence) }}">Editar</a>


                    <form action="{{ route('app.incidences.destroy', $incidence) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>

                </div>
                {{-- <span>{!! Form::model('incidence', ['route' => ['app.incidences.destroy', $incidence], 'method' => 'DELETE']) !!}
                {!! Form::submit('Elim  inar', ['class' => 'btn btn-danger btn-sm remove-incidence']) !!}
                {!! Form::close() !!}
            </span> --}}
            </div>
        @endif
    </div>
@stop

@section('content')

    <div class="card">

        <div class="card-header">
            @php
                $day = \Carbon\Carbon::parse($incidence->created_at)->format('d');
                $month = \Carbon\Carbon::parse($incidence->created_at)->format('F');
                $year = \Carbon\Carbon::parse($incidence->created_at)->format('Y');
                $hour = \Carbon\Carbon::parse($incidence->created_at)->format('g:i A');
            @endphp

            @php
                $displayUser = isset($incidence->user->name) ? $incidence->user->name : 'usuario eliminado';
            @endphp

            Creado por <strong>{{ $displayUser }}</strong> el {{ $day }} de {{ $month }} a las
            {{ $hour }}
        </div>

        <div class="card-body">

            @if ($incidence->computer->classroom)
                <h2>Aula {{ $incidence->computer->classroom->num }}</h2>
            @else
                @if (!$incidence->computer->classroom)
                    <div class="alert alert-warning fade show" id="alert" role="alert">
                        Esta incidencia pertenece al periferico <strong> {{ $incidence->peripheral->name }} </strong> del
                        ordenador <strong>{{ $incidence->computer->num }}</strong> y no cuenta con un aula
                        asociada</strong>
                    </div>
                @endif
            @endif


            <hr>


            <h4 class="bg-primary p-2">Sistema afectado</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item justify-content-between align-items-center">
                    <strong>Ordenador</strong> {{ $incidence->computer->num }}
                </li>
                <li class="list-group-item"><strong>Dispositivo o hardware: </strong> {{ $incidence->peripheral->name }}
                </li>
            </ul>


            <h4 class="bg-primary p-2">Estudiante responsable durante el turno</h4>
            <ul class="list-group mb-4">
                @if ($incidence->student)
                    <li class="list-group-item"> <strong>Alumno: </strong> {{ $incidence->student->name }}</li>
                    <li class="list-group-item"> <strong>Grupo Escolar: </strong> {{ $incidence->student->group_num }}</li>
                @else
                    <li class="list-group-item"> Sin estudiante asignado</li>
                @endif
            </ul>

            <h4 class="bg-primary p-2">Descripción y observaciones de la incidencia</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item justify-content-between align-items-center">
                    {{ $incidence->description }}
                </li>
            </ul>

        </div>

        @if ($incidence->revisionHistory->Count())


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
    @endif
    </div>

@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop --}}
