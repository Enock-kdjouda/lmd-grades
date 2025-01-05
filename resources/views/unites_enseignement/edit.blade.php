@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-5">Modifier l'Unité d'Enseignement</h1>

    <form action="{{ route('unites_enseignement.update', $ue->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="code" class="block text-gray-700 font-bold mb-2">Code</label>
            <input type="text" id="code" name="code" value="{{ $ue->code }}" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-bold mb-2">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ $ue->nom }}" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="credits_ects" class="block text-gray-700 font-bold mb-2">Crédits ECTS</label>
            <input type="number" id="credits_ects" name="credits_ects" value="{{ $ue->credits_ects }}" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="semestre" class="block text-gray-700 font-bold mb-2">Semestre</label>
            <input type="number" id="semestre" name="semestre" value="{{ $ue->semestre }}" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
        <a href="{{ route('unites_enseignement.index') }}" class="text-gray-600 ml-4">Annuler</a>
    </form>
</div>
@endsection
