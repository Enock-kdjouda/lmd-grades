@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Liste des ECs</h1>
    <a href="{{ route('elements_constitutifs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter EC</a>
    <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Code</th>
                <th class="border border-gray-300 px-4 py-2">Nom</th>
                <th class="border border-gray-300 px-4 py-2">Coefficient</th>
                <th class="border border-gray-300 px-4 py-2">UE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ecs as $ec)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $ec->code }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ec->nom }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ec->coefficient }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $ec->uniteEnseignement->nom }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('elements_constitutifs.edit', $ec->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>

                        <form action="{{ route('elements_constitutifs.destroy', $ec->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('Voulez-vous vraiment supprimer cet EC ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
