<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\Computer;
use App\Models\Peripheral;
use App\Models\State;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IncidenceCreate extends Component
{
    public $selectedClassroomID;
    public $selectedComputerID;
    public $selectedPeripheralID;

    // public function updatingSearch()  { }

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
            $selectedComputer = $this->selectedComputerID;
            $computers = Computer::where('classroom_id', $this->selectedClassroomID)->get()->pluck('num', 'id');

        }
          else {
             // Deseleccionamos todo lo que sucede al aula
             $this->selectedComputerID = "";
             $this->selectedPeripheralID = "";
         }

        // SOLO SÍ hemos seleccionado un ordenador buscamos los periféricos y estudiantes asociados y los guardamos
        if ($this->selectedComputerID != null) {
            $peripherals = Peripheral::where('computer_id', $this->selectedComputerID)->get()->pluck('name', 'id');
            $students = Student::where('computer_id', $this->selectedComputerID)->get()->pluck('name', 'id');
        }

        if ($this->selectedPeripheralID != null) {
            $selectedPeripheral = $this->selectedPeripheralID;
        }

        $states = State::all();
        $classrooms = Classroom::pluck('num', 'id');

        return view('livewire.incidence-create', compact('states', 'classrooms', 'computers', 'peripherals', 'students', 'selectedPeripheral', 'selectedComputer'));
    }
}
