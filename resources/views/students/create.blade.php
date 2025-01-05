@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Ajouter un étudiant</h1>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="numero_etudiant" class="form-label">Numéro d'étudiant</label>
                    <input type="text" class="form-control" id="numero_etudiant" name="numero_etudiant" value="{{ old('numero_etudiant') }}" required>
                    @error('numero_etudiant')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                    @error('nom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                    @error('prenom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="niveau" class="form-label">Niveau</label>
                    <select class="form-control" id="niveau" name="niveau" required>
                        <option value="">Sélectionnez le niveau</option>
                        <option value="L1" {{ old('niveau') == 'L 1' ? 'selected' : '' }}>L1</option>
                        <option value="L2" {{ old('niveau') == 'L 2' ? 'selected' : '' }}>L2</option>
                        <option value="L3" {{ old('niveau') == 'L 3' ? 'selected' : '' }}>L3</option>
                    </select>
                    @error('niveau')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-secondary me-2">Réinitialiser</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
