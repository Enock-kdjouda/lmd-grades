@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Liste des UEs</h1>
    <a href="{{ route('unites_enseignement.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter UE</a>
    <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Code</th>
                <th class="border border-gray-300 px-4 py-2">Nom</th>
                <th class="border border-gray-300 px-4 py-2">Crédits</th>
                <th class="border border-gray-300 px-4 py-2">Semestre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ues as $ue)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $ue->code }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ue->nom }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ue->credits_ects }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ue->semestre }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('unites_enseignement.edit', $ue->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>
                        <form action="{{ route('unites_enseignement.destroy', $ue->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette UE ?');">Supprimer</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
