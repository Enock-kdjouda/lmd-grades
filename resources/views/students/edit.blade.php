@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Modifier un étudiant</h1>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.update', $student) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="numero_etudiant" class="form-label">Numéro d'étudiant</label>
                    <input type="text" class="form-control" id="numero_etudiant" name="numero_etudiant" value="{{ old('numero_etudiant', $student->numero_etudiant) }}" required>
                    @error('numero_etudiant')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $student->nom) }}" required>
                    @error('nom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $student->prenom) }}" required>
                    @error('prenom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="niveau" class="form-label">Niveau</label>
                    <select class="form-control" id="niveau" name="niveau" required>
                        <option value="">Sélectionnez le niveau</option>
                        <option value="L1" {{ old('niveau', $student->niveau) == 'Licence 1' ? 'selected' : '' }}>L1</option>
                        <option value="L2" {{ old('niveau', $student->niveau) == 'Licence 2' ? 'selected' : '' }}>L2</option>
                        <option value="L3" {{ old('niveau', $student->niveau) == 'Licence 3' ? 'selected' : '' }}>L3</option>
                    </select>
                    @error('niveau')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer cet étudiant</button>
        </form>
    </div>
</div>
@endsection
