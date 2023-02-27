<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Computer;
use App\Http\Requests\ComputerRequest;

use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:app.computers.index')->only('index');
        $this->middleware('can:app.computers.show')->only('show');
        $this->middleware('can:app.computers.create')->only('create', 'store');
        $this->middleware('can:app.computers.edit')->only('edit', 'update');
        $this->middleware('can:app.computers.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::latest('id')->paginate(20);
        return view('app.computers.index', compact('computers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::pluck('num', 'id');

        return view('app.computers.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ComputerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerRequest $request)
    {
        $computer = Computer::create($request->all());

        return redirect()->route('app.computers.show', $computer)->with('info', 'El ordenador se creó con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function show(Computer $computer)
    {
        return view('app.computers.show', compact('computer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function edit(Computer $computer)
    {
        $classrooms = Classroom::pluck('num', 'id');

        return view('app.computers.edit', compact('computer', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ComputerRequest  $request
     * @param  Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function update(ComputerRequest $request, Computer $computer)
    {
        $computer->update($request->all());

        return redirect()->route('app.computers.show', $computer)->with('info', 'Los datos del ordenador se actualizaron correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()->route('app.computers.index')->with('info', 'El ordenador se eliminó con éxito.');
    }
}
