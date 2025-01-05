@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Modifier un étudiant</h1>
        <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Retour à la liste</a>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('students.update', $student) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="numero_etudiant" class="block font-medium">Numéro d'étudiant</label>
                <input 
                    type="text" 
                    name="numero_etudiant" 
                    id="numero_etudiant" 
                    value="{{ old('numero_etudiant', $student->numero_etudiant) }}" 
                    class="w-full border border-gray-300 rounded p-2">
                @error('numero_etudiant')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="nom" class="block font-medium">Nom</label>
                <input 
                    type="text" 
                    name="nom" 
                    id="nom" 
                    value="{{ old('nom', $student->nom) }}" 
                    class="w-full border border-gray-300 rounded p-2">
                @error('nom')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="prenom" class="block font-medium">Prénom</label>
                <input 
                    type="text" 
                    name="prenom" 
                    id="prenom" 
                    value="{{ old('prenom', $student->prenom) }}" 
                    class="w-full border border-gray-300 rounded p-2">
                @error('prenom')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="niveau" class="block font-medium">Niveau</label>
                <select 
                    name="niveau" 
                    id="niveau" 
                    class="w-full border border-gray-300 rounded p-2">
                    <option value="">Sélectionnez le niveau</option>
                    <option value="L1" {{ old('niveau', $student->niveau) == 'Licence 1' ? 'selected' : '' }}>L1</option>
                    <option value="L2" {{ old('niveau', $student->niveau) == 'Licence 2' ? 'selected' : '' }}>L2</option>
                    <option value="L3" {{ old('niveau', $student->niveau) == 'Licence 3' ? 'selected' : '' }}>L3</option>
                </select>
                @error('niveau')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>

    <div class="mt-6">
        <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
            @csrf
            @method('DELETE')
            <button 
                type="submit" 
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Supprimer cet étudiant
            </button>
        </form>
    </div>
</div>
@endsection
