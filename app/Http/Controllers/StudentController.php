<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $students = Student::with('courses')->get();
            return view('students.index', compact('students'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to load students: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $courses = Course::all();
            return view('students.create', compact('courses'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to load courses: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        try {
            $student = Student::create($request->validated());
            
            // Attach selected courses
            if ($request->has('course_ids')) {
                $student->courses()->attach($request->course_ids);
            }
            
            return redirect()->route('students.index')->with('success', 'Student created successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to create student: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        try {
            $student->load('courses');
            return view('students.show', compact('student'));
        } catch (Exception $e) {
            return redirect()->route('students.index')->with('error', 'Failed to load student: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        try {
            $courses = Course::all();
            $student->load('courses');
            return view('students.edit', compact('student', 'courses'));
        } catch (Exception $e) {
            return redirect()->route('students.index')->with('error', 'Failed to load student for editing: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            $student->update($request->validated());
            
            // Sync selected courses
            if ($request->has('course_ids')) {
                $student->courses()->sync($request->course_ids);
            } else {
                $student->courses()->detach();
            }
            
            return redirect()->route('students.index')->with('success', 'Student updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update student: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            // Detach courses before deleting student
            $student->courses()->detach();
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete student: ' . $e->getMessage());
        }
    }
}

