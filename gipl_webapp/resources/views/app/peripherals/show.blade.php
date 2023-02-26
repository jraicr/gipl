@extends('adminlte::page')

@section('title', 'GIPL - Detalles del periférico')

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
            <h1>Periférico Nº {{ $peripheral->id }}</h1>
        </div>

        @if (auth()->user()->hasRole('Admin'))
            <div class="card-footer">
                <div class="d-flex flex-row">
                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('app.peripherals.edit', $peripheral) }}">Editar</a>

                    <form action="{{ route('app.peripherals.destroy', $peripheral) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>

                </div>
            </div>
        @endif
    </div>
@stop

@section('content')

    <div class="card">

        <div class="card-header">
            @php
                $day = \Carbon\Carbon::parse($peripheral->created_at)->format('d');
                $month = \Carbon\Carbon::parse($peripheral->created_at)->format('F');
                $year = \Carbon\Carbon::parse($peripheral->created_at)->format('Y');
                $hour = \Carbon\Carbon::parse($peripheral->created_at)->format('g:i A');
            @endphp
        </div>

        <div class="card-body">

            <h2>Aula {{ $peripheral->computer->classroom->num }}</h2>

            <hr>


            <h4 class="bg-secondary p-2">Ordenador o sistema al que pertenece</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item justify-content-between align-items-center">
                    <strong>Ordenador</strong> {{ $peripheral->computer->num }}
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

            <h4 class="bg-primary p-2">Nombre del periférico</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item justify-content-between align-items-center">
                    {{ $peripheral->name }}
                </li>
            </ul>

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
