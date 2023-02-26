<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PeripheralRequest;

use App\Models\Peripheral;
use App\Models\Classroom;

class PeripheralController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:app.peripherals.index')->only('index');
        $this->middleware('can:app.peripherals.show')->only('show');
        $this->middleware('can:app.peripherals.create')->only('create', 'store');
        $this->middleware('can:app.peripherals.edit')->only('edit', 'update');
        $this->middleware('can:app.peripherals.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Peripheral::class);

        $peripherals = Peripheral::latest('id')->paginate(20);
        return view('app.peripherals.index', compact('peripherals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Peripheral::class);

        $classrooms = Classroom::pluck('num', 'id');

        return view('app.peripherals.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PeripheralRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeripheralRequest $request)
    {
        $this->authorize('create', Peripheral::class);

        $peripheral = Peripheral::create($request->all());

        return redirect()->route('app.peripherals.show', $peripheral)->with('info', 'El periférico se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  Peripheral  $peripheral
     * @return \Illuminate\Http\Response
     */
    public function show(Peripheral $peripheral)
    {
        $this->authorize('view', Peripheral::class);

        return view('app.peripherals.show', compact('peripheral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Peripheral  $peripheral
     * @return \Illuminate\Http\Response
     */
    public function edit(Peripheral $peripheral)
    {
        $this->authorize('update', Peripheral::class);

        $classrooms = Classroom::pluck('num', 'id');

        return view('app.peripherals.edit', compact('peripheral', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PeripheralRequest  $request
     * @param  Peripheral  $peripheral
     * @return \Illuminate\Http\Response
     */
    public function update(PeripheralRequest $request, Peripheral $peripheral)
    {
        $this->authorize('update', Peripheral::class);

        $peripheral->update($request->all());

        return redirect()->route('app.peripherals.show', $peripheral)->with('info', 'Los datos del periférico se actualizaron con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Peripheral  $peripheral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peripheral $peripheral)
    {
        $this->authorize('delete', Peripheral::class);
        
        $peripheral->delete();

        return redirect()->route('app.peripherals.index')->with('info', 'El periférico se eliminó correctamente.');
    }
}
