<div>
    {{-- ESTADO / STATUS --}}
    <div class="form-group">
        <p class="font-weight-bold">Estado</p>
        <div class="form-check form-check-inline">
            @foreach ($states as $state)
                {!! Form::radio('state_id', $state->id, null, ['class' => 'form-check-input', 'id' => $state->id]) !!}
                {!! Form::label($state->id, $state->name, ['class' => 'form-check-label mr-2']) !!}
            @endforeach
        </div>
    </div>

    {{-- AULA / CLASSROOM --}}
    <div class="form-group">
        {!! Form::label('classroom_id', 'Aula:') !!}
        {!! Form::select('classroom_id', $classrooms, null, ['class' => 'form-control form-select', 'placeholder' => 'Seleccione un aula','wire:model' => 'selectedClassroomID']) !!}
    </div>

    {{-- EQUIPO / COMPUTER --}}
    <div class="form-group">
        @if ($computers->Count())
            {!! Form::label('computer_id', 'Ordenador afectado:') !!}
            {!! Form::select('computer_id', $computers, null, ['class' => 'form-control form-select', 'wire:model' => 'selectedComputerID']) !!}
        @endif
    </div>

    {{-- PERIFÉRICO / PERIPHERAL  --}}
    <div class="form-group">
        @if ($peripherals->Count())
            {!! Form::label('peripheral_id', 'Periférico / Hardware:') !!}
            {!! Form::select('peripheral_id', $peripherals, null, ['class' => 'form-control form-select', 'wire:model' => 'selectedPeripheralID']) !!}
        @endif
    </div>

      {{-- ALUMNO / STUDENT --}}
      <div class="form-group">
        @if ($students->Count())
            {!! Form::label('student_id', 'Estudiante responsable del ordenador durante el turno') !!}
            {!! Form::select('student_id', $students, null, ['class' => 'form-control form-select']) !!}
        @endif
    </div>

    {{-- DESCRIPCIÓN / DESCRIPTION --}}
    <div class="form-group">
        @if ($selectedPeripheral != null)
            {!! Form::label('description', 'Descripción') !!}

            {!! Form::textarea('description', null, [
                'class' => 'form-control',
                'placeholder' => 'Describe la incidencia que está afectando a' /* . $peripheral->name*/,
            ]) !!}
        @endif
    </div>
</div>
