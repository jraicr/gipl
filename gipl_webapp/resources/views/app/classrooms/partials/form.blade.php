<div class="form-group">
    {!! Form::label('num', 'Nº identificador de aula') !!}
    {!! Form::text('num', null, ['class' => 'form-control', 'placeholder' => 'Introduzca un número de aula']) !!}

    @error('num')
        <small class="text-danger"> {{ $message }} </small>
    @enderror
</div>


