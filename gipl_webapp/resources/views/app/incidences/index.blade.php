@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Listado de incidencias</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('app.incidences.create')}}">Crear incidencia</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Estudiante</th>
                    <th>Periferico</th>
                    <th>Profesor</th>
                    <th>Fecha Creación</th>
                </thead>

                <tbody>
                    @foreach ($incidences as $incidence)
                        <tr>
                            <td>{{ $incidence->id }} </td>
                            <td>{{ $incidence->description }} </td>
                            <td>{{ $incidence->state->name }} </td>
                            <td>{{ $incidence->student->name }} </td>
                            <td>{{ $incidence->peripheral->name }} </td>
                            <td>{{ $incidence->user->name }} </td>
                            <td>{{ $incidence->created_at }}</td>
                        <tr>
                    @endforeach
                </tbody>
            </table>
            {{$incidences->links('pagination::bootstrap-5')}}
        </div>
    </div>



@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop --}}
