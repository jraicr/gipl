@extends('adminlte::page')

@section('title', 'GIPL - Detalles del ordenador')

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
            <h1>Ordenador Nº {{ $computer->id }}</h1>
        </div>

        <div class="card-footer">
            <div class="d-flex flex-row">
                @can('app.computers.edit')
                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('app.computers.edit', $computer) }}">Editar</a>
                @endcan
                @can('app.computers.destroy')
                    <form action="{{ route('app.computers.destroy', $computer) }}" method="POST">
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
                $day = \Carbon\Carbon::parse($computer->created_at)->format('d');
                $month = \Carbon\Carbon::parse($computer->created_at)->format('F');
                $year = \Carbon\Carbon::parse($computer->created_at)->format('Y');
                $hour = \Carbon\Carbon::parse($computer->created_at)->format('g:i A');
            @endphp
        </div>

        <div class="card-body">

            <hr>

            <h4 class="bg-secondary p-2">Datos del ordenador</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item justify-content-between align-items-center">
                    <strong>Número</strong> {{ $computer->num }}
                </li>
                @if ($computer->classroom_id != null)
                    <li class="list-group-item justify-content-between align-items-center">
                        <strong>Aula</strong> {{ $computer->classroom->num }}
                    </li>
                @else
                    <li class="list-group-item justify-content-between align-items-center">
                        <strong>Sin aula asignada</strong>
                    </li>
                @endif
            </ul>


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
