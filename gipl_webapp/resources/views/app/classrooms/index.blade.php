@extends('adminlte::page')

@section('title', 'GIPL')

@section('content_header')
    <h1>Lista de aulas</h1>
@stop

@section('content')
    @livewire('app.classrooms-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        const listenForRemove = () => {
            let removeButtons;
            let removeConfirmationDialog;
            let currentClassroomToRemove;

            let contentContainer;

            init();


            function init() {
                cacheElements();
                setupEventHandlers();
            }

            function cacheElements() {
                removeButtons = document.querySelectorAll('.remove-classroom');
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

                e.preventDefault(); // Evitamos que el botón de eliminar ejecute el submit.

                // Cacheamos el elemento del botón que se ha pulsado originalmente,
                //  para rescatar la fila de la incidencia en la tabla posteriormente.
                currentClassroomToRemove = e.target;

                removeConfirmationDialog = createDialog('¿Está seguro de que desea borrar este aula?', contentContainer);
                removeConfirmationDialog.showModal();
            }

            // Gestiona la decisión del usuario en el dialogo de confirmación de eliminación de incidencia
            function handlerUserInput(e, returnValue) {
                if (returnValue == 'remove') {
                    console.log(e.target);
                    currentClassroomToRemove.form.submit();
                    currentClassroomToRemove.parentNode.parentNode.parentNode.style.backgroundColor = "#ff7b7b";

                } else {
                    currentClassroomToRemove.parentNode.parentNode.parentNode.style.backgroundColor = null;
                }

                currentClassroomToRemove.parentNode.parentNode.parentNode.style.transition = "all 300ms linear";
                currentClassroomToRemove = undefined;
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
@stop

