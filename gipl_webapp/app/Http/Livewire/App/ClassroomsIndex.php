<?php

namespace App\Http\Livewire\App;

use App\Models\Classroom;
use Livewire\Component;
use Livewire\WithPagination;

class ClassroomsIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $classrooms = Classroom::where('num', 'LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.app.classrooms-index', compact('classrooms'));
    }
}
