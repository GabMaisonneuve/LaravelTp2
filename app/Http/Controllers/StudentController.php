<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::select('id', 'nom', 'email', 'telephone')->orderby('nom')->paginate(5);
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city = City::all();
        return view('student.create', ['cities' => $city]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'nom' => 'required|string|max:80',
            'email' => 'required|email|unique:students,email'.'|max:100',
            'telephone' => 'required|string|max:15',
            'adresse' => 'required|string|max:100',
            'date_naissance' => [
                'required',
                'date',
                'before_or_equal:' . now()->subYears(16)->toDateString(),
                'after_or_equal:' . now()->subYears(100)->toDateString(),
            ],
            'city_id' => 'required|exists:cities,id',
        ]);

       $student = Student::create([
        'nom' => $request->nom,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'adresse' => $request->adresse,
        'date_naissance' => $request->date_naissance,
        'city_id' => $request->city_id,
        'id' => 1
       ]);

       return redirect()->route('student.show', $student->id)->with('success','Student Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $city = City::all();
        return view('student.edit', ['student' => $student, 'cities' => $city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
{
    $request->validate([
        'nom' => 'required|string|max:80',
        'email' => [
            'required',
            'email',
            'max:100',
            Rule::unique('students')->ignore($student->id),
        ],
        'telephone' => 'required|string|max:15',
        'adresse' => 'required|string|max:100',
        'date_naissance' => [
            'required',
            'date',
            'before_or_equal:' . now()->subYears(16)->toDateString(),
            'after_or_equal:' . now()->subYears(100)->toDateString(),
        ],
        'city_id' => 'required|exists:cities,id',
    ]);

    $student->update($request->only(['nom', 'email', 'telephone', 'adresse', 'date_naissance', 'city_id']));

    return redirect()->route('student.show', $student->id)
                     ->with('success', "Student's information updated successfully");
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }
}
