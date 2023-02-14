<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncidenceRequest;
use App\Models\Classroom;
use App\Models\Incidence;
use App\Models\IncidenceHistories;
use App\Models\State;
use Illuminate\Http\Request;

class IncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidences = Incidence::latest('id')->paginate(20);
        return view('app.incidences.index', compact('incidences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $classrooms = Classroom::pluck('num', 'id');

        return view('app.incidences.create', compact('states', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\IncidenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidenceRequest $request)
    {
        $incidence = Incidence::create($request->all());

        // Introducimos una nueva entrada en el histórico de incidencia
        $incidenceHistoryEntry = new IncidenceHistories;
        $incidenceHistoryEntry->incidence_id = $incidence->id;
        $incidenceHistoryEntry->state_id = $incidence->state_id;
        $incidenceHistoryEntry->save();

        return redirect()->route('app.incidences.edit', $incidence)->with('info', 'La incidencia se creó con éxito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function show(Incidence $incidence)
    {
        return view('app.incidences.show', compact('incidence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidence $incidence)
    {

        $states = State::all();
        $classrooms = Classroom::pluck('num', 'id');

        return view('app.incidences.edit', compact('incidence', 'states', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\IncidenceRequest  $request
     * @param  Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function update(IncidenceRequest $request, Incidence $incidence)
    {
        $incidence->update($request->all());

        return redirect()->route('app.incidences.edit', $incidence)->with('info', 'La incidencia se actualizó con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
