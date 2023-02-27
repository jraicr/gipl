<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScholarGroupRequest;
use App\Models\ScholarGroup;
use Illuminate\Http\Request;

class ScholarGroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:app.scholar_groups.index')->only('index');
        $this->middleware('can:app.scholar_groups.show')->only('show');
        $this->middleware('can:app.scholar_groups.create')->only('create', 'store');
        $this->middleware('can:app.scholar_groups.edit')->only('edit', 'update');
        $this->middleware('can:app.scholar_groups.destroy')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholarGroups = ScholarGroup::latest('id')->paginate(20);
        return view('app.scholar_groups.index', compact('scholarGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.scholar_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScholarGroupRequest $request)
    {
        $scholarGroup = ScholarGroup::create($request->all());

        return redirect()->route('app.scholar_groups.index', $scholarGroup)->with('info', 'El grupo escolar se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  ScholarGroup  $scholarGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ScholarGroup $scholarGroup)
    {
        return view('app.scholar_groups.show', compact('scholarGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ScholarGroup  $scholarGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ScholarGroup $scholarGroup)
    {
        return view('app.scholar_groups.edit', compact('scholarGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ScholarGroup  $scholarGroup
     * @return \Illuminate\Http\Response
     */
    public function update(ScholarGroupRequest $request, ScholarGroup $scholarGroup)
    {
        $scholarGroup->update($request->all());

        return redirect()->route('app.scholar_groups.index', $scholarGroup)->with('info', 'Los datos del grupo escolar se actualizaron con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ScholarGroup  $scholarGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScholarGroup $scholarGroup)
    {
        $scholarGroup->delete();

        return redirect()->route('app.scholar_groups.index')->with('info', 'El grupo escolar se eliminó correctamente.');
    }
}
