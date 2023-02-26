@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Listado de alumnos</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
            <strong>{{ session('info') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            @can('app.students.create')
                <a class="btn btn-primary" href="{{ route('app.students.create') }}">Añadir alumno</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Ordenador asociado</th>
                    <th>Grupo escolar</th>
                    <th>Nº de lista</th>
                    <th>Fecha Incorporación</th>
                    <th colspan="2"></th>
                </thead>

                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }} </td>
                            <td>{{ $student->name }} </td>
                            <td>{{ $student->surname }} </td>

                            @if ($student->computer_id != null)
                                <td>{{ $student->computer->num }} </td>
                            @else
                                <td>Sin ordenador asociado</td>
                            @endif

                            @if ($student->scholar_group_id != null)
                                <td>{{ $student->scholarGroup->name }} </td>
                            @else
                                <td>Sin grupo escolar asignado</td>
                            @endif

                            <td>{{ $student->group_num }} </td>
                            <td>{{ $student->created_at }}</td>

                            <td><a class="btn btn-info" href="{{ route('app.students.show', $student) }}">Ver</td>
                            <td>
                                @can('app.students.edit')
                                    <a class="btn btn-primary" href="{{ route('app.students.edit', $student) }}">Editar</a>
                                @endcan
                            </td>
                            <td>
                                @can('app.students.destroy')
                                    {!! Form::model('peripheral', ['route' => ['app.students.destroy', $student], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger remove-student']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $students->links('pagination::bootstrap-5') }}
        </div>
    </div>



@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

{{-- @section('js')
    <script>
        const listenForRemove = () => {
            let removeButtons;
            let removeConfirmationDialog;
            let currentIncidenceToRemove;

            let contentContainer;

            init();


            function init() {
                cacheElements();
                setupEventHandlers();
            }

            function cacheElements() {
                removeButtons = document.querySelectorAll('.remove-incidence');
                contentContainer = document.querySelector(".container-fluid");
            }

            function setupEventHandlers() {

                // Evento al hacer click en el botón eliminar incidencia
                removeButtons.forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        showConfirmationModal(e);
                        e.target.parentNode.parentNode.parentNode.style.backgroundColor = "#ff7b3473";
                    });
                });
            }

            function showConfirmationModal(e) {

                e.preventDefault();  // Evitamos que el botón de eliminar ejecute el submit.

                // Cacheamos el elemento del botón que se ha pulsado originalmente,
                //  para rescatar la fila de la incidencia en la tabla posteriormente.
                currentIncidenceToRemove = e.target;

                removeConfirmationDialog = createDialog('¿Desea borrar esta incidencia?', contentContainer);
                removeConfirmationDialog.showModal();
            }

            // Gestiona la decisión del usuario en el dialogo de confirmación de eliminación de incidencia
            function handlerUserInput(e, returnValue) {
                if (returnValue == 'remove') {
                    console.log(e.target);
                    currentIncidenceToRemove.form.submit();
                    currentIncidenceToRemove.parentNode.parentNode.parentNode.style.backgroundColor = "#ff7b7b";

                } else {
                    currentIncidenceToRemove.parentNode.parentNode.parentNode.style.backgroundColor = null;
                }

                currentIncidenceToRemove.parentNode.parentNode.parentNode.style.transition = "all 300ms linear";
                currentIncidenceToRemove = undefined;
            }

            // Crea un modal con el elemento html Dialog.
            // Más info sobre <dialog>: https://developer.mozilla.org/es/docs/Web/HTML/Element/dialog
            function createDialog(text, container) {
                let dialogElement = document.createElement('dialog');
                let sectionElement = document.createElement('section');
                let textParagraphElement = document.createElement('p');
                let dialogForm = document.createElement('form');
                let buttonConfirm = document.createElement('button');
                let buttonCancel = document.createElement('button');

                dialogElement.id = 'remove-confirmation';
                textParagraphElement.innerText = text;
                dialogForm.method = "dialog";

                buttonConfirm.type = "submit";
                buttonConfirm.classList.add("btn", "btn-danger");
                buttonConfirm.value = "remove";
                buttonConfirm.id = 'remove-confirm-btn';
                buttonConfirm.innerText = 'Confirmar';

                buttonCancel.type = "submit";
                buttonCancel.classList.add("btn", "btn-secondary", "float-right");
                buttonCancel.value = "cancel";
                buttonCancel.id = 'remove-cancel-btn';
                buttonCancel.innerText = 'Cancelar';


                dialogForm.appendChild(buttonConfirm);
                dialogForm.appendChild(buttonCancel);
                sectionElement.appendChild(textParagraphElement);
                dialogElement.appendChild(sectionElement);
                dialogElement.appendChild(dialogForm);

                // Evento al hacer click en cualquier botón del elemento html Dialog
                dialogElement.addEventListener('close', (e) => {
                    handlerUserInput(e, dialogElement.returnValue);
                });

                container.appendChild(dialogElement);

                return dialogElement;
            }
        }

        listenForRemove();
    </script>
@stop --}}
