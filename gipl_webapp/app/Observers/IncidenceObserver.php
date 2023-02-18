<?php

namespace App\Observers;

use App\Models\Incidence;
use App\Models\IncidenceHistories;
use Illuminate\Support\Facades\App;

class IncidenceObserver
{

    /**
     * Handle the Incidence BEFORE "created" event.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return void
     */
    public function creating(Incidence $incidence)
    {
        if (! App::runningInConsole()) {
            $incidence->user_id = auth()->user()->id;
        }
    }


    /**
     * Handle the Incidence "created" event.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return void
     */
    public function created(Incidence $incidence)
    {
        // Introducimos una nueva entrada en el histórico de incidencia
        $incidenceHistoryEntry = new IncidenceHistories();
        $incidenceHistoryEntry->incidence_id = $incidence->id;
        $incidenceHistoryEntry->state_id = $incidence->state_id;
        $incidenceHistoryEntry->student_id = $incidence->student_id;
        $incidenceHistoryEntry->peripheral_id = $incidence->peripheral_id;
        $incidenceHistoryEntry->user_id = $incidence->user_id;
        $incidenceHistoryEntry->description = $incidence->description;

        $incidenceHistoryEntry->save();
    }

    /**
     * Handle the Incidence "updated" event.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return void
     */
    public function updated(Incidence $incidence)
    {
        // Obtener datos del último histórico de esta incidencia

        // Comparar atributos de cada campo IF
         // Campo X de incidencia Y es igual al campo X del historico Y ->
                    // Apuntamos NULL en campo X de historico Y

          // else
                    // Apuntamos nuevo valor en campo X de historico Y
        $newHistoric = new IncidenceHistories();
        $newHistoric->incidence_id = $incidence->id;

        $lastHistoricData = $incidence->incidenceHistories()->get()->last();

        if ($lastHistoricData->state_id == $incidence->state_id) {
            $newHistoric->state_id = null;

        } else {
            $newHistoric->state_id = $incidence->state_id;
        }

        if ($lastHistoricData->student_id == $incidence->student_id) {
            $newHistoric->student_id = null;

        } else {
            $newHistoric->student_id = $incidence->student_id;
        }

        if ($lastHistoricData->peripheral_id == $incidence->peripheral_id) {
            $newHistoric->peripheral_id = null;

        } else {
            $newHistoric->peripheral_id = $incidence->peripheral_id;
        }

        if ($lastHistoricData->user_id == $incidence->user_id) {
            $newHistoric->user_id = null;

        }  else {
            $newHistoric->user_id = $incidence->user_id;
        }

        if ($lastHistoricData->description == $incidence->description) {
            $newHistoric->description = null;

        } else {
            $newHistoric->description = $incidence->description;
        }

        if ($newHistoric->state_id != null || $newHistoric->student_id != null || $newHistoric->peripheral_id != null ||
            $newHistoric->user_id != null || $newHistoric->description != null) {
                $newHistoric->save();
            }

    }

    /**
     * Handle the Incidence "deleted" event.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return void
     */
    public function deleted(Incidence $incidence)
    {
        //
    }

    /**
     * Handle the Incidence "restored" event.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return void
     */
    public function restored(Incidence $incidence)
    {
        //
    }

    /**
     * Handle the Incidence "force deleted" event.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return void
     */
    public function forceDeleted(Incidence $incidence)
    {
        //
    }
}
