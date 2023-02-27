<?php

namespace App\Http\Livewire\App\Computers\Partials;

use App\Models\Classroom;
use Livewire\Component;

class Form extends Component
{
    public $classrooms;

    public $computer;

    public $selectedClassroomID;

    public function render()
    {
        $classroomID = Classroom::select('id')->where('num', $this->selectedClassroomID)->get();

        $classrooms = $this->classrooms;
        $computer = $this->computer;

        $selectedComputer = null;

        return view('livewire.app.computers.partials.form', compact('computer', 'classrooms', 'selectedComputer'));
    }

    public function mount()
    {
        if (old('classroom_id') || old('num')) {
            $this->selectedClassroomID = old('classroom_id');
            $this->selectedComputer = old('num');
        } else if ($this->computer) {
            if ($this->computer->classroom_id != null) {

                $this->selectedClassroomID = $this->computer->classroom_id;
            }

            $this->selectedComputer = $this->computer->num;
        }
    }
}
