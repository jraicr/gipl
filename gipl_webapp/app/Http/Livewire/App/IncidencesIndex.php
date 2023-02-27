<?php

namespace App\Http\Livewire\App;

use App\Models\Incidence;
use Livewire\Component;
use Livewire\WithPagination;

class IncidencesIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $incidences = Incidence::where('description', 'LIKE', '%' . $this->search . '%')->paginate(20);

        if ($this->search) {
            // Busqueda de perifericos
            $incidences = Incidence::leftJoin('peripherals', 'incidences.peripheral_id', '=', 'peripherals.id')
                ->select('incidences.*')
                ->where('peripherals.name', 'LIKE', '%' . $this->search . '%')->paginate(20);


            //Busqueda de ordenadores
            if (!$incidences->Count()) {
                $incidences = Incidence::leftJoin('peripherals', 'incidences.peripheral_id', '=', 'peripherals.id')
                    ->leftJoin('computers', 'peripherals.computer_id', '=', 'computers.id')
                    ->select('incidences.*')
                    ->where('computers.num', 'LIKE', '%' . $this->search . '%')->paginate(20);
            }

            // Busqueda de descripcion
            if (!$incidences->Count()) {
                $incidences = Incidence::where('description', 'LIKE', '%' . $this->search . '%')
                    ->paginate(20);
            }
        }

        return view('livewire.app.incidences-index', compact('incidences'));
    }
}
