@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-gray-100 shadow-md rounded-md mt-8">
    <h1 class="text-2xl font-bold mb-6 text-blue-600 text-center">Ajouter une note pour {{ $student->prenom }} {{ $student->nom }}</h1>

    <form action="{{ route('grades.store', $student) }}" method="POST" class="space-y-6">
        @csrf

        <!-- Champ EC -->
        <div>
            <label for="ec_id" class="block text-sm font-medium text-gray-700">Élément Constitutif (EC)</label>
            <select name="ec_id" id="ec_id" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" disabled selected>-- Sélectionnez un EC --</option>
                <!-- Dynamique : Ajouter les options -->
                @foreach ($ecs as $ec)
                    <option value="{{ $ec->id }}">{{ $ec->nom }}</option>
                @endforeach
            </select>
        </div>

        <!-- Champ Note -->
        <div>
            <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
            <input type="number" step="0.01" min="0" max="20" name="note" id="note" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Champ Session -->
        <div>
            <label for="session" class="block text-sm font-medium text-gray-700">Session</label>
            <select name="session" id="session" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="normale">Normale</option>
                <option value="rattrapage">Rattrapage</option>
            </select>
        </div>

        <!-- Champ Date d'évaluation -->
        <div>
            <label for="date_evaluation" class="block text-sm font-medium text-gray-700">Date d'évaluation</label>
            <input type="date" name="date_evaluation" id="date_evaluation" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Bouton Enregistrer -->
        <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
