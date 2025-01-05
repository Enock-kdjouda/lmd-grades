@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Modifier un Élément Constitutif (EC)</h2>
    <form action="{{ route('elements_constitutifs.update', $ec->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="code" class="block font-medium">Code</label>
            <input type="text" name="code" id="code" value="{{ $ec->code }}" class="w-full border border-gray-300 rounded p-2">
        </div>

        <div>
            <label for="nom" class="block font-medium">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ $ec->nom }}" class="w-full border border-gray-300 rounded p-2">
        </div>

        <div>
            <label for="coefficient" class="block font-medium">Coefficient</label>
            <input type="number" name="coefficient" id="coefficient" value="{{ $ec->coefficient }}" class="w-full border border-gray-300 rounded p-2">
        </div>

        <div>
            <label for="ue_id" class="block font-medium">UE</label>
            <select name="ue_id" id="ue_id" class="w-full border border-gray-300 rounded p-2">
                @foreach($ues as $ue)
                    <option value="{{ $ue->id }}" @if($ec->ue_id == $ue->id) selected @endif>{{ $ue->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection
