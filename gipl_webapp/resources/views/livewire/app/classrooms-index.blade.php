<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Introduzca un nº de aula">
            @can('app.classrooms.create')
                <a class="btn btn-secondary float-right mt-3" href="{{ route('app.classrooms.create') }}">Crear aula</a>
            @endcan
        </div>

        @if ($classrooms->count())
            <div class="card-body">
                <table class="table table-stripe">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número de aula</th>
                            <th>Fecha de creación</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classrooms as $classroom)
                            <tr>
                                <td>{{ $classroom->id }}</td>
                                <td>{{ $classroom->num }}</td>
                                <td>{{ $classroom->created_at }}</td>
                                <td width="10px">
                                    @can('app.classrooms.edit')
                                        <a
                                            class="btn btn-primary "href="{{ route('app.classrooms.edit', $classroom) }}">Editar</a>
                                    @endcan
                                </td>

                                <td width="10px">
                                    @can('app.classrooms.destroy')
                                        {!! Form::model('classroom', ['route' => ['app.classrooms.destroy', $classroom], 'method' => 'DELETE']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger remove-classroom']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $classrooms->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No existen usuarios con estos datos</strong>
            </div>
        @endif

    </div>
</div>
