<div class="form-group">
    {!! Form::label('name', 'Nombre del grupo escolar') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre del grupo']) !!}

    @error('name')
        <small class="text-danger"> {{ $message }} </small>
    @enderror
</div>


