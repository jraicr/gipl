<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\ScholarGroup;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:app.students.index')->only('index');
        $this->middleware('can:app.students.show')->only('show');
        $this->middleware('can:app.students.create')->only('create', 'store');
        $this->middleware('can:app.students.edit')->only('edit', 'update');
        $this->middleware('can:app.students.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest('id')->paginate(20);

        return view('app.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scholarGroups = ScholarGroup::pluck('name', 'id');
        $classrooms = Classroom::pluck('num', 'id');

        return view('app.students.create', compact('scholarGroups', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create($request->all());

        return redirect()->route('app.students.show', $student)->with('info', 'El alumno se ha insertado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('app.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $scholarGroups = ScholarGroup::pluck('name', 'id');
        $classrooms = Classroom::pluck('num', 'id');

        return view('app.students.edit', compact('student','scholarGroups', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StudentRequest  $request
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('app.students.show', $student)->with('info', 'Los datos del alumno se actualizaron con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('app.students.index')->with('info', 'El alumno se eliminó con éxito.');
    }

    public function removeScholarGroup(ScholarGroup $scholar_group, Student $student) {
        $student->update(['scholar_group_id' => NULL]);

        return redirect()->route('app.scholar_groups.show', $scholar_group)->with('info', 'Estudiante eliminado del grupo con éxito');
    }
}
