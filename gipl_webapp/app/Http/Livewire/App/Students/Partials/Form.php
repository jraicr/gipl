<?php

namespace App\Http\Livewire\App\Students\Partials;

use App\Models\ScholarGroup;
use App\Models\Classroom;
use App\Models\Computer;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Form extends Component
{
    public $scholarGroups;
    public $classrooms;

    public $student;

    public $selectedScholarGroupID;
    public $selectedClassroomID;

    public function render()
    {
        $scholarGroupID = ScholarGroup::select('id')->where('name', $this->selectedScholarGroupID)->get();
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

        $scholarGroups = $this->scholarGroups;
        $classrooms = $this->classrooms;
        $student = $this->student;

        return view('livewire.app.students.partials.form', compact('student', 'scholarGroups', 'classrooms', 'computers', 'selectedComputer'));
    }

    public function mount()
    {
        if (old('classroom_id') || old('computer_id') || old('scholar_group_id')) {
            $this->selectedScholarGroupID = old('scholar_group_id');
            $this->selectedClassroomID = old('classroom_id');
            $this->selectedComputerID = old('computer_id');
        } else if ($this->student) {
            if ($this->student->scholar_group_id != null) {

                $this->selectedScholarGroupID = $this->student->scholarGroup->id;
            }

            if ($this->student->computer != null) {

                $this->selectedClassroomID = $this->student->computer->classroom_id;
            }

            if ($this->student->computer_id != null) {

                $this->selectedComputerID = $this->student->computer->id;
            }
        }
    }
}
