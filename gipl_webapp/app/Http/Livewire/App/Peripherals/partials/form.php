<?php

namespace App\Http\Livewire\App\Peripherals\Partials;

use App\Models\Classroom;
use App\Models\Computer;

use Illuminate\Database\Eloquent\Collection;

use Livewire\Component;

class Form extends Component
{
    public $classrooms;

    public $peripheral;

    public $selectedClassroomID;
    public $selectedComputerID;

    public function render()
    {
        $classroomID = Classroom::select('id')->where('num', $this->selectedClassroomID)->get();

        $computers = new Collection();

        $selectedComputer = null;

        if ($this->selectedClassroomID != null) {
            $computers = Computer::where('classroom_id', $this->selectedClassroomID)->get()->pluck('num', 'id');

        } else {
            $this->selectedComputerID = "";
        }

        if ($this->selectedComputerID != null) {

            $selectedComputer = $this->selectedComputerID;
        }

        $classrooms = $this->classrooms;
        $peripheral = $this->peripheral;

        return view('livewire.app.peripherals.partials.form', compact('peripheral', 'classrooms', 'computers', 'selectedComputer'));
    }

    public function mount()
    {
        if (old('classroom_id') || old('computer_id')) {
            $this->selectedClassroomID = old('classroom_id');
            $this->selectedComputerID = old('computer_id');
        } else if ($this->peripheral) {
            $this->selectedClassroomID = $this->peripheral->computer->classroom_id;
            $this->selectedComputerID = $this->peripheral->computer->id;
        }
    }
}
