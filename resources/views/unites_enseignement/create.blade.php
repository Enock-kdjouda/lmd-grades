@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Créer une UE</h1>
    <form action="{{ route('unites_enseignement.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="code" class="block">Code</label>
            <input type="text" id="code" name="code" class="border border-gray-300 p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="nom" class="block">Nom</label>
            <input type="text" id="nom" name="nom" class="border border-gray-300 p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="credits_ects" class="block">Crédits ECTS</label>
            <input type="number" id="credits_ects" name="credits_ects" class="border border-gray-300 p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="semestre" class="block">Semestre</label>
            <input type="number" id="semestre" name="semestre" class="border border-gray-300 p-2 w-full">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Créer</button>
    </form>
</div>
@endsection
