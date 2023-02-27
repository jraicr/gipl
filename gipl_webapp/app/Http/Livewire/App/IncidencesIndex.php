<?php

namespace App\Http\Livewire\App;

use App\Models\Incidence;
use App\Models\Peripheral;
use Livewire\Component;
use Livewire\WithPagination;

class IncidencesIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        // Busqueda de perifericos
        $incidences = Incidence::leftJoin('peripherals', 'incidences.peripheral_id', '=', 'peripherals.id')
            ->where('peripherals.name', 'LIKE', '%' . $this->search . '%')->paginate();


        //Busqueda de ordenadores
         if (!$incidences->Count()) {
             $incidences = Incidence::leftJoin('peripherals', 'incidences.peripheral_id', '=', 'peripherals.id')
                    ->leftJoin('computers', 'peripherals.computer_id', '=', 'computers.id' )
                 ->where('computers.num', 'LIKE', '%' . $this->search . '%')->paginate();
        } 
        
        // Busqueda de descripcion
         if (!$incidences->Count()) {
            $incidences = Incidence::where('description', 'LIKE', '%' . $this->search . '%')
            ->paginate();
        }

        //$incidences = Incidence::where('description', 'LIKE', '%' . $this->search . '%')->paginate();

        return view('livewire.app.incidences-index', compact('incidences'));
    }
}
