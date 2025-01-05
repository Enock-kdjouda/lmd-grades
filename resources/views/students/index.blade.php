@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Liste des Étudiants</h1>
        <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter un étudiant</a>
    </div>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Numéro</th>
                <th class="border border-gray-300 px-4 py-2">Nom</th>
                <th class="border border-gray-300 px-4 py-2">Prénom</th>
                <th class="border border-gray-300 px-4 py-2">Niveau</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $student->numero_etudiant }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student->nom }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student->prenom }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $student->niveau }}</td>
                <td class="px-4 py-2 border">
                    <a href="{{ route('students.edit', $student) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>
                    <a href="{{ route('grades.create', $student) }}" class="bg-green-500 text-white px-4 py-2 rounded">Ajouter une note</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>
@endsection
