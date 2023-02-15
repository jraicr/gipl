@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Listado de incidencias</h1>
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
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('app.incidences.create') }}">Crear incidencia</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Aula</th>
                    <th>Ordenador</th>
                    <th>Periferico</th>
                    <th>Estudiante</th>
                    <th>Profesor</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th colspan="2"></th>
                </thead>

                <tbody>
                    @foreach ($incidences as $incidence)
                        <tr>
                            <td>{{ $incidence->id }} </td>
                            <td>{{ $incidence->peripheral->computer->classroom->num }} </td>
                            <td>{{ $incidence->peripheral->computer->num }} </td>
                            <td>{{ $incidence->peripheral->name }} </td>

                            @if ($incidence->student != null)
                                <td>{{ $incidence->student->name }} </td>
                            @else
                                <td>Sin estudiante asignado</td>
                            @endif

                            @if ($incidence->user != null)
                                <td>{{ $incidence->user->name }} </td>
                            @else
                                <td>Sin profesor asignado</td>
                            @endif

                            <td>{{ $incidence->description }} </td>

                            @if ($incidence->state != null)
                                <td>{{ $incidence->state->name }} </td>
                            @else
                                <td>Sin estado asignado</td>
                            @endif
                            <td>{{ $incidence->created_at }}</td>

                            <td><a class="btn btn-primary" href="{{ route('app.incidences.edit', $incidence) }}">Editar</td>
                            <td>
                                {!! Form::model('incidence', ['route' => ['app.incidences.destroy', $incidence], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $incidences->links('pagination::bootstrap-5') }}
        </div>
    </div>



@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop --}}
