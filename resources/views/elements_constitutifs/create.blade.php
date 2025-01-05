@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Créer un EC</h1>
    <form action="{{ route('elements_constitutifs.store') }}" method="POST">
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
            <label for="coefficient" class="block">Coefficient</label>
            <input type="number" step="0.1" id="coefficient" name="coefficient" class="border border-gray-300 p-2 w-full">
        </div>
        <div class="mb-4">
            <label for="ue_id" class="block">Unité d'Enseignement</label>
            <select id="ue_id" name="ue_id" class="border border-gray-300 p-2 w-full">
                <option value="" disabled selected>-- Sélectionner une UE --</option>
                @foreach ($ues as $ue)
                    <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Créer</button>
    </form>
</div>
@endsection
