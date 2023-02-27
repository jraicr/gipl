<div>
    @if (!$classrooms->Count())
        <div class="alert alert-warning alert-dismissible fade show" id="alert" role="alert">
            No existen aulas para poder incluir el ordenador. Puedes crear el ordenador, aunque no tendrá ningún aula asignada. 
            Contacte con el <strong>administrador del sistema</strong> para agregar aulas al sistema.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif

    <div class="form-group">
        {!! Form::label('num', 'Número de ordenador:') !!}

        {!! Form::text('num', null, [
            'class' => 'form-control',
            'placeholder' => 'Escribe el número del ordenador... Ej: INFORMATICA-999',
            'wire:ignore',
        ]) !!}

        @error('num')
            <small class="text-danger">{{ $message }} </small>
        @enderror
    </div>    

    <div class="form-group" >

        {!! Form::label('classroom_id', 'Aula:') !!}
        {!! Form::select('classroom_id', $classrooms, null, [
            'class' => 'form-control form-select',
            'placeholder' => 'Seleccione un aula',
            'wire:model' => 'selectedClassroomID',
        ]) !!}

        @error('classroom_id')
            <small class="text-danger">{{ $message }} </small>
        @enderror

    </div>
</div>
