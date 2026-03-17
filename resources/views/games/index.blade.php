<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mon Patrimoine Jeux Vidéo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <h3 class="text-lg font-medium mb-4">Ajouter un jeu</h3>
                <form action="{{ route('games.search') }}" method="GET" class="flex gap-4">
                    <input type="text" 
                           name="query" 
                           placeholder="Rechercher un jeu dans le catalogue..." 
                           class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500"
                           required>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md">
                        Rechercher
                    </button>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 text-left">Jeu</th>
                            <th class="py-2 text-left">Console</th>
                            <th class="py-2 text-left">État</th>
                            <th class="py-2 text-left">Prix</th>
                            <th class="py-2 text-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($games as $game)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2">
                                <div class="flex items-center">
                                    @if($game->cover_url)
                                        <img src="https:{{ str_replace('t_thumb', 't_cover_small', $game->cover_url) }}" class="w-10 h-14 object-cover rounded mr-3 shadow-sm">
                                    @else
                                        <div class="w-10 h-14 bg-gray-100 rounded mr-3 flex items-center justify-center text-[10px] text-gray-400">N/A</div>
                                    @endif
                                    <span class="font-medium text-gray-900">{{ $game->name }}</span>
                                </div>
                            </td>
                                <td class="py-2 text-left">{{ $game->console_name }}</td>
                                <td class="py-2 text-left">{{ strtoupper($game->condition) }}</td>
                                <td class="py-2 font-bold text-left">{{ $game->price }} €</td>
                                <td class="py-2 text-right">
                                    <div class="flex justify-end gap-2">
                                        {{-- Bouton Modifier --}}
                                        <a href="{{ route('games.edit', $game) }}" class="inline-flex items-center px-3 py-1.5 rounded-md bg-amber-500 text-white text-sm font-medium hover:bg-amber-600">
                                            Modifier
                                        </a>

                                        <form action="{{ route('games.destroy', $game) }}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir retirer ce jeu ?');">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="inline-flex items-center px-3 py-1.5 rounded-md bg-red-600 text-white text-sm font-medium hover:bg-red-700">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-500">
                                    Ton inventaire est vide. Utilise la barre de recherche ci-dessus !
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-6 text-right">
                    <h2 class="text-2xl font-bold">Valeur Totale : <span class="text-indigo-600">{{ $totalValue }} €</span></h2>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>