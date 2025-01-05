@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Ajouter un étudiant</h1>
        <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Retour à la liste</a>
    </div>

    <div class="bg-white shadow-md rounded p-6">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="numero_etudiant" class="block text-gray-700">Numéro d'étudiant</label>
                <input type="text" id="numero_etudiant" name="numero_etudiant" value="{{ old('numero_etudiant') }}" class="border border-gray-300 p-2 w-full" required>
                @error('numero_etudiant')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="nom" class="block text-gray-700">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="border border-gray-300 p-2 w-full" required>
                @error('nom')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" class="border border-gray-300 p-2 w-full" required>
                @error('prenom')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="niveau" class="block text-gray-700">Niveau</label>
                <select id="niveau" name="niveau" class="border border-gray-300 p-2 w-full" required>
                    <option value="">Sélectionnez le niveau</option>
                    <option value="L1" {{ old('niveau') == 'L1' ? 'selected' : '' }}>L1</option>
                    <option value="L2" {{ old('niveau') == 'L2' ? 'selected' : '' }}>L2</option>
                    <option value="L3" {{ old('niveau') == 'L3' ? 'selected' : '' }}>L3</option>
                </select>
                @error('niveau')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Réinitialiser</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
