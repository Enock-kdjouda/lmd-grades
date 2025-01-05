@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des Étudiants</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Ajouter un étudiant</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Niveau</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->numero_etudiant }}</td>
                <td>{{ $student->nom }}</td>
                <td>{{ $student->prenom }}</td>
                <td>{{ $student->niveau }}</td>
                <td>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <a href="{{ route('grades.create',$student)}}" class="btn btn-sm btn-success">Ajouter une note</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
</div>
@endsection