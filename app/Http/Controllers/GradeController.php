<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\ElementConstitutif;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function create(Student $student)
{
    $ecs = ElementConstitutif::all();
    return view('grades.create', compact('student', 'ecs'));
    dd($ecs);
}


    public function store(Request $request, Student $student)
    {
        $validated = $request->validate([
            'ec_id' => 'required|exists:elements_constitutifs,id',
            'note' => 'required|numeric|min:0|max:20',
            'session' => 'required|in:normale,rattrapage',
            'date_evaluation' => 'required|date'
        ]);

        $student->grades()->create($validated);
        return redirect()->route('students.show', $student)->with('success', 'Note ajoutée avec succès');
    }

    public function calculateAverage(Student $student)
    {
        $average = $student->calculateAverage();
        return view('students.average', compact('student', 'average'));
    }
}