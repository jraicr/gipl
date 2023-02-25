@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Asignación de rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre completo:</p>
            <p class="form-control">{{$user->name}} {{$user->surname}}</p>

            <h2 class="h5">Listado de roles</h2>
            {!! Form::model($user, ['route' => ['app.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>

                @endforeach

                {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hola!'); </script>
@stop
