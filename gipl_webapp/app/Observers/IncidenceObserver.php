<?php

namespace App\Observers;

use App\Models\Incidence;
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
        //
    }

    /**
     * Handle the Incidence "updated" event.
     *
     * @param  \App\Models\Incidence  $incidence
     * @return void
     */
    public function updated(Incidence $incidence)
    {
        //
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
