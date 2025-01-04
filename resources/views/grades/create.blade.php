@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une note pour {{ $student->prenom }} {{ $student->nom }}</h1>

    <form action="{{ route('grades.store', $student) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="elements_constitutifs_id" class="form-label">EC</label>
            <select name="elements_constitutifs_id" id="elements_constitutifs_id" class="form-control" required>
                <!-- À remplir avec vos ECs -->
                <option value="">Sélectionnez un EC</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <input type="number" step="0.01" min="0" max="20" name="note" id="note" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="session" class="form-label">Session</label>
            <select name="session" id="session" class="form-control" required>
                <option value="normale">Normale</option>
                <option value="rattrapage">Rattrapage</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="date_evaluation" class="form-label">Date d'évaluation</label>
            <input type="date" name="date_evaluation" id="date_evaluation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
