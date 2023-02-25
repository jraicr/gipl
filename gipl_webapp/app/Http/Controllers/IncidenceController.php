<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncidenceRequest;
use App\Models\Classroom;
use App\Models\Incidence;
use App\Models\State;
use Illuminate\Http\Request;

class IncidenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:app.incidences.index')->only('index');
        $this->middleware('can:app.incidences.show')->only('show');
        $this->middleware('can:app.incidences.create')->only('create', 'store');
        $this->middleware('can:app.incidences.edit')->only('edit', 'update');
        $this->middleware('can:app.incidences.destroy')->only('destroy');
    }

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

        return redirect()->route('app.incidences.show', $incidence)->with('info', 'La incidencia se creó con éxito');;
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
        $this->authorize('author', $incidence);
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
        $this->authorize('author', $incidence);
        $incidence->update($request->all());

        return redirect()->route('app.incidences.show', $incidence)->with('info', 'La incidencia se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Incidence  $incidence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidence $incidence)
    {
        $this->authorize('author', $incidence);
        $incidence->delete();

        return redirect()->route('app.incidences.index')->with('info', 'La incidencia se eliminó correctamente.');
    }
}
