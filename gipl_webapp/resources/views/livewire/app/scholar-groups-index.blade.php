<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Introduzca el nombre de un grupo">
            @can('app.scholar_groups.create')
                <a class="btn btn-secondary float-right mt-3" href="{{ route('app.scholar_groups.create') }}">Crear grupo escolar</a>
            @endcan
        </div>

        @if ($scholarGroups->count())
            <div class="card-body">
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha de creación</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scholarGroups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->created_at }}</td>

                                <td width="10px">
                                    @can('app.scholar_groups.show')
                                        <a class="btn btn-info" href="{{ route('app.scholar_groups.show', $group) }}">Ver</a>
                                    @endcan

                                </td>
                                <td width="10px">
                                    @can('app.scholar_groups.edit')
                                        <a
                                            class="btn btn-primary "href="{{ route('app.scholar_groups.edit', $group) }}">Editar</a>
                                    @endcan
                                </td>

                                <td width="10px">
                                    @can('app.scholar_groups.destroy')
                                        {!! Form::model('scholargroup', ['route' => ['app.scholar_groups.destroy', $group], 'method' => 'DELETE']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger remove-group']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $scholarGroups->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No existen grupos escolares con este nombre</strong>
            </div>
        @endif

    </div>
</div>
