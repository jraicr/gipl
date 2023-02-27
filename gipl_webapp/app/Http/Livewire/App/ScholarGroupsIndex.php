<?php

namespace App\Http\Livewire\App;

use App\Models\ScholarGroup;
use Livewire\Component;
use Livewire\WithPagination;

class ScholarGroupsIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $scholarGroups = ScholarGroup::where('name', 'LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.app.scholar-groups-index', compact('scholarGroups'));
    }
}
