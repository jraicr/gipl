<div>
    @if ($selectedComputer != null && !$peripherals->Count())
        <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
            El ordenador seleccionado no tiene periféricos asociados. Este error no le permitirá seguir creando
            la incidencia. Contacte con el <strong>administrador del sistema</strong> para agregar dispositivos a
            este ordenador.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif

    {{-- ESTADO / STATUS --}}
    <div class="form-group">
        <p class="font-weight-bold">Estado</p>
        <div class="form-check form-check-inline">
            @foreach ($states as $state)
                @if ($state->id == 1)
                    @php $selected = true @endphp
                @else
                    @php $selected = null @endphp
                @endif

                {!! Form::radio('state_id', $state->id, $selected, ['class' => 'form-check-input', 'id' => $state->id, 'wire:ignore']) !!}
                {!! Form::label($state->id, $state->name, ['class' => 'form-check-label mr-2']) !!}
            @endforeach
        </div>
    </div>

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

    {{-- EQUIPO / COMPUTER --}}
    <div class="form-group">
        {!! Form::label('computer_id', 'Ordenador afectado:') !!}
        {!! Form::select('computer_id', $computers, null, [
            'class' => 'form-control form-select',
            'placeholder' => 'Seleccione un ordenador',
            'wire:model' => 'selectedComputerID',
        ]) !!}

        @error('computer_id')
            <small class="text-danger">{{ $message }} </small>
        @enderror

    </div>

    {{-- PERIFÉRICO / PERIPHERAL  --}}
    <div class="form-group">
        {!! Form::label('peripheral_id', 'Periférico / Hardware:') !!}
        {!! Form::select('peripheral_id', $peripherals, null, [
            'class' => 'form-control form-select',
            'placeholder' => 'Seleccione un periférico',
            'wire:model' => 'selectedPeripheralID',
        ]) !!}

        @error('peripheral_id')
            <small class="text-danger">{{ $message }} </small>
        @enderror

    </div>

    {{-- ALUMNO / STUDENT --}}
    <div class="form-group">
        {!! Form::label('student_id', 'Estudiante responsable del ordenador durante el turno') !!}
        {!! Form::select('student_id', $students, null, [
            'class' => 'form-control form-select',
            'placeholder' => 'Seleccione un alumno',
        ]) !!}
    </div>

    {{-- DESCRIPCIÓN / DESCRIPTION --}}
    <div class="form-group">
        {!! Form::label('description', 'Descripción') !!}

        {!! Form::textarea('description', null, [
            'class' => 'form-control',
            'placeholder' => 'Describe la incidencia que está afectando a' /* . $peripheral->name*/,
            'wire:ignore',
        ]) !!}

        @error('description')
            <small class="text-danger">{{ $message }} </small>
        @enderror
    </div>
</div>
