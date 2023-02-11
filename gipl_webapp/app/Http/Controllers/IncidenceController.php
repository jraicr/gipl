<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Computer;
use App\Models\Incidence;
use App\Models\Peripheral;
use App\Models\State;
use App\Models\Student;
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
        // $states = State::all();
        // $classrooms = Classroom::all();

        return view('app.incidences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $incidence = Incidence::create($request->all());

        return redirect()->route('app.incidences.edit', $incidence);
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
        return view('app.incidences.edit', compact('incidence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
