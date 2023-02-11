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
        {!! Form::select('classroom_id', $classrooms, null, [
            'class' => 'form-control form-select',
            'placeholder' => 'Seleccione un aula',
            'wire:model' => 'selectedClassroomID',
        ]) !!}
    </div>

    {{-- EQUIPO / COMPUTER --}}
    <div class="form-group">
        {!! Form::label('computer_id', 'Ordenador afectado:') !!}
        {!! Form::select('computer_id', $computers, null, [
            'class' => 'form-control form-select',
            'placeholder' => 'Seleccione un ordenador',
            'wire:model' => 'selectedComputerID',
        ]) !!}
    </div>

    {{-- PERIFÉRICO / PERIPHERAL  --}}
    <div class="form-group">
        {!! Form::label('peripheral_id', 'Periférico / Hardware:') !!}
        {!! Form::select('peripheral_id', $peripherals, null, [
            'class' => 'form-control form-select',
            'placeholder' => 'Seleccione un periférico',
            'wire:model' => 'selectedPeripheralID',
        ]) !!}
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
        ]) !!}
    </div>

    @if ($selectedComputer != null && !$peripherals->Count())
        Este ordenador no tiene periféricos. Contacte con su administrador para agregar dispositivos a este sistema.
    @endif


</div>
