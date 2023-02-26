<div>
    <div class="row mb-4 mt-2">
        <div class="col-12 col-md-3 mb-3">
            {!! Form::label('name', 'Nombre:') !!}

            {!! Form::text('name', null, [
                'class' => 'form-control',
                'placeholder' => 'Escribe el nombre del alumno...',
                'wire:ignore',
            ]) !!}

            @error('name')
                <small class="text-danger">{{ $message }} </small>
            @enderror
        </div>

        <div class="col-12 col-md-5 mb-3">
            {!! Form::label('surname', 'Apellidos:') !!}

            {!! Form::text('surname', null, [
                'class' => 'form-control',
                'placeholder' => 'Escribe los apellidos del alumno...',
                'wire:ignore',
            ]) !!}

            @error('surname')
                <small class="text-danger">{{ $message }} </small>
            @enderror
        </div>

        <div class="col-12 col-md-4 mb-3">
            {!! Form::label('group_num', 'Nº de lista:') !!}

            {!! Form::text('group_num', null, [
                'class' => 'form-control',
                'placeholder' => 'Escribe el número de lista del alumno...',
                'wire:ignore',
            ]) !!}

            @error('group_num')
                <small class="text-danger">{{ $message }} </small>
            @enderror
        </div>
    </div>

    <div class="form-group" >

        {!! Form::label('scholar_group_id', 'Grupo escolar:') !!}
        {!! Form::select('scholar_group_id', $scholarGroups, null, [
            'class' => 'form-control form-select',
            'placeholder' => 'Seleccione un grupo escolar',
            'wire:model' => 'selectedScholarGroupID',
        ]) !!}

        @error('scholar_group_id')
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
</div>
