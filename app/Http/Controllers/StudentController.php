<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('full_name')->paginate(10);

        $summary = [
            'total_students' => Student::count(),
            'programs' => Student::query()->distinct()->count('course'),
            'year_levels' => Student::query()->distinct()->count('year_level'),
            'pages' => $students->lastPage(),
        ];

        return view('students.index', compact('students', 'summary'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Student::create($this->validateStudent($request));

        return redirect()
            ->route('students.index')
            ->with('success', 'Student record added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update($this->validateStudent($request, $student));

        return redirect()
            ->route('students.index')
            ->with('success', 'Student record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student record deleted successfully.');
    }

    protected function validateStudent(Request $request, ?Student $student = null): array
    {
        return $request->validate([
            'student_id' => [
                'required',
                'string',
                'max:255',
                Rule::unique('students', 'student_id')->ignore($student),
            ],
            'full_name' => ['required', 'string', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'year_level' => ['required', 'string', 'max:50'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($student),
            ],
        ]);
    }
}
