<div>
    @if ($selectedClassroomID != null && !$computers->Count())
        <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
            No existen ordenadores en la aula seleccionada. Este error no le permitirá seguir creando
            el periférico. Contacte con el <strong>administrador del sistema</strong> para agregar ordenadores a
            esta aula.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif

    {{-- AULA / CLASSROOM --}}
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

    <div class="form-group">
        {!! Form::label('computer_id', 'Ordenador:') !!}
        {!! Form::select('computer_id', $computers, null, [
            'class' => 'form-control form-select',
            'placeholder' => 'Seleccione un ordenador',
            'wire:model' => 'selectedComputerID',
        ]) !!}

        @error('computer_id')
            <small class="text-danger">{{ $message }} </small>
        @enderror

    </div>

    <div class="form-group">
        {!! Form::label('name', 'Nombre:') !!}

        {!! Form::text('name', null, [
            'class' => 'form-control',
            'placeholder' => 'Escribe el nombre del periférico...' /* . $peripheral->name*/,
            'wire:ignore',
        ]) !!}

        @error('name')
            <small class="text-danger">{{ $message }} </small>
        @enderror
    </div>
</div>
