<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:app.classrooms.index')->only('index');
        $this->middleware('can:app.classrooms.create')->only('create', 'store');
        $this->middleware('can:app.classrooms.edit')->only('edit', 'update');
        $this->middleware('can:app.classrooms.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::latest('id')->paginate(20);
        return view('app.classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request)
    {
        $classroom = Classroom::create($request->all());

        return redirect()->route('app.classrooms.index', $classroom)->with('info', 'El aula se creó con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        return view('app.classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ClassroomRequest  $request
     * @param  Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update($request->all());

        return redirect()->route('app.classrooms.index', $classroom)->with('info', 'Los datos del aula se actualizaron con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return redirect()->route('app.classrooms.index')->with('info', 'El aula se eliminó correctamente.');
    }
}
