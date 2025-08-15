<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Exception;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $professors = Professor::all();
            return view('professors.index', compact('professors'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to load professors: ' . $e->getMessage());
        }
    }
} 