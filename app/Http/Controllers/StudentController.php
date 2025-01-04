<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Student $student)
    {
        $students = Student::orderBy('nom')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_etudiant' => 'required|unique:students',
            'nom' => 'required',
            'prenom' => 'required',
            'niveau' => 'required|in:L1,L2,L3'
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Étudiant ajouté avec succès');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'numero_etudiant' => 'required|unique:students,numero_etudiant,'.$student->id,
            'nom' => 'required',
            'prenom' => 'required',
            'niveau' => 'required|in:L1,L2,L3'
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Étudiant modifié avec succès');
    }

    public function destroy(Student $student)
    {
        // Supprimer l'étudiant
        $student->delete();

        // Redirection avec un message de succès
        return redirect()->route('students.index')->with('success', 'Étudiant supprimé avec succès.');
    }
}