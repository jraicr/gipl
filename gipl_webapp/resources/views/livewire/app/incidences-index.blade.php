<div>
    <div class="card">
        <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Introduzca datos de una incidencia">
            @can('app.incidences.create')
                <a class="btn btn-primary mt-3 float-right" href="{{ route('app.incidences.create') }}">Crear incidencia</a>
            @endcan
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
                            @if ($incidence->peripheral->computer->classroom)
                                <td>{{ $incidence->peripheral->computer->classroom->num }} </td>
                            @else
                                <td>Sin aula asociada</td>
                            @endif
                            <td>{{ $incidence->peripheral->computer->num }} </td>
                            <td>{{ $incidence->peripheral->name }} </td>

                            @if ($incidence->student != null)
                                <td>{{ $incidence->student->name }} </td>
                            @else
                                <td>Sin estudiante asignado</td>
                            @endif

                            @if (isset($incidence->user))
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

                            <td>
                                @can('app.incidences.show')
                                    <a class="btn btn-info" href="{{ route('app.incidences.show', $incidence) }}">Ver</a>
                                @endcan

                            </td>

                            <td>
                                @if (
                                    ($incidence->user_id == auth()->user()->id &&
                                        auth()->user()->can('app.incidences.edit')) ||
                                        auth()->user()->hasRole('Admin') ||
                                        auth()->user()->hasRole('Gestor de incidencias'))
                                    <a class="btn btn-primary"
                                        href="{{ route('app.incidences.edit', $incidence) }}">Editar</a>
                                @endif
                            </td>

                            <td>
                                @if (
                                    ($incidence->user_id == auth()->user()->id &&
                                        auth()->user()->can('app.incidences.destroy')) ||
                                        auth()->user()->hasRole('Admin') ||
                                        auth()->user()->hasRole('Gestor de incidencias'))
                                    {!! Form::model('incidence', ['route' => ['app.incidences.destroy', $incidence], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger remove-incidence']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $incidences->links() }}
        </div>
    </div>
</div>
