<?php

namespace App\Http\Livewire\App\Incidences\Partials;

use App\Http\Requests\IncidenceRequest;
use App\Models\Classroom;
use App\Models\Computer;
use App\Models\Peripheral;
use App\Models\State;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Symfony\Component\Console\Input\Input;

class Form extends Component
{
    // Parámetros recibidos a través IncidenceController create()
    public $states;
    public $classrooms;

    // Parámetros recibidos atráves de IncidenceController edit
    public $incidence;

    // Parámetros actualizados en tiempo real según se rellenan los datos del formulario de la vista
    // También se actualizan en mount() cuando se recarga la página parar mostrar validaciones de error.
    public $selectedClassroomID;
    public $selectedComputerID;
    public $selectedPeripheralID;

    public function updatingSearch() { }

    public function render()
    {
        // Obtenemos el ID del aula buscando por su número
        $classroomID = Classroom::select('id')->where('num', $this->selectedClassroomID)->get();

        // Colecciones vacías inicialmente para
        //  guardar los datos relacionados con el aula (Ordenador y perifericos asociados)
        $computers = new Collection();
        $peripherals = new Collection();
        $students = new Collection();

        $selectedPeripheral = null;
        $selectedComputer = null;

        // SOLO SÍ hemos señalado un aula buscamos los ordenadores asociados y los guardamos
        if ($this->selectedClassroomID != null) {
            $computers = Computer::where('classroom_id', $this->selectedClassroomID)->get()->pluck('num', 'id');

        } else {
            // Deseleccionamos todo lo que sucede al aula
            $this->selectedComputerID = "";
            $this->selectedPeripheralID = "";
        }

        // SOLO SÍ hemos seleccionado un ordenador buscamos los periféricos y estudiantes asociados y los guardamos
        if ($this->selectedComputerID != null) {
            $peripherals = Peripheral::where('computer_id', $this->selectedComputerID)->get()->pluck('name', 'id');
            $students = Student::where('computer_id', $this->selectedComputerID)->get()->pluck('name', 'id');

            $selectedComputer = $this->selectedComputerID;
        }

        if ($this->selectedPeripheralID != null) {
            $selectedPeripheral = $this->selectedPeripheralID;
        }

        $states = $this->states;
        $classrooms = $this->classrooms;
        $incidence = $this->incidence;

        return view('livewire.app.incidences.partials.form', compact('incidence', 'states',  'classrooms', 'computers', 'peripherals', 'students', 'selectedPeripheral', 'selectedComputer'));
    }

    public function mount()
    {
        if (old('classroom_id') || old('computer_id') || old('peripheral_id')) {
            $this->selectedClassroomID = old('classroom_id');
            $this->selectedComputerID = old('computer_id');
            $this->selectedPeripheralID = old('peripheral_id');

        } else if ($this->incidence) {
            $this->selectedClassroomID = $this->incidence->computer->classroom_id;
            $this->selectedComputerID = $this->incidence->computer->id;
            $this->selectedPeripheralID = $this->incidence->peripheral_id;
        }
    }
}
