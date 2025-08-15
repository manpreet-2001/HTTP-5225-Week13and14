<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Exception;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $courses = Course::with(['professor', 'students'])->get();
            return view('courses.index', compact('courses'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to load courses: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $professors = Professor::available()->get();
            return view('courses.create', compact('professors'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to load professors: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            $course = Course::create($request->validated());
            return redirect()->route('courses.index')->with('success', 'Course created successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to create course: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        try {
            $course->load(['professor', 'students']);
            return view('courses.show', compact('course'));
        } catch (Exception $e) {
            return redirect()->route('courses.index')->with('error', 'Failed to load course: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        try {
            // Get available professors plus the current one
            $professors = Professor::where(function($query) use ($course) {
                $query->whereDoesntHave('course')
                      ->orWhere('id', $course->professor_id);
            })->get();
            
            return view('courses.edit', compact('course', 'professors'));
        } catch (Exception $e) {
            return redirect()->route('courses.index')->with('error', 'Failed to load course for editing: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        try {
            $course->update($request->validated());
            return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update course: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        try {
            // Detach students before deleting course
            $course->students()->detach();
            $course->delete();
            return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete course: ' . $e->getMessage());
        }
    }
} 