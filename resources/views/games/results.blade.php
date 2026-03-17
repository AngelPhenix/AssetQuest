<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Résultats pour "{{ $searchTerm ?? 'Recherche inconnue' }}"</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($searchResults as $game)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                    {{-- Gestion de la cover --}}
                    <div class="h-64 bg-gray-200">
                        @if(isset($game['cover']))
                            <img src="https:{{ str_replace('t_thumb', 't_cover_big', $game['cover']['url']) }}" 
                                class="w-full h-full object-cover" alt="{{ $game['name'] }}">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-500 text-sm">Pas d'image</div>
                        @endif
                    </div>

                    <div class="p-4 flex-1 flex flex-col">
                        <h3 class="font-bold text-lg mb-2">{{ $game['name'] }}</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            {{ isset($game['first_release_date']) ? date('Y', $game['first_release_date']) : 'Année inconnue' }}
                        </p>

                        {{-- FORMULAIRE D'AJOUT --}}
                        <form action="{{ route('games.store') }}" method="POST" class="mt-auto">
                            @csrf
                            <input type="hidden" name="igdb_id" value="{{ $game['id'] }}">
                            <input type="hidden" name="name" value="{{ $game['name'] }}">
                            <input type="hidden" name="cover_url" value="{{ $game['cover']['url'] ?? '' }}">
                            
                            {{-- Sélection de la console --}}
                            <div class="mb-3">
                                <label for="platform-{{ $game['id'] }}" class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">
                                    Ma version sur :
                                </label>
                                <select name="platform_name" 
                                        id="platform-{{ $game['id'] }}"
                                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                                        required>
                                    <option value="">-- Choisir la console --</option>
                                    @if(isset($game['platforms']))
                                        @foreach($game['platforms'] as $platform)
                                            <option value="{{ $platform['name'] }}">{{ $platform['name'] }}</option>
                                        @endforeach
                                    @else
                                        <option value="Autre">Plateforme inconnue</option>
                                    @endif
                                </select>
                            </div>

                            {{-- État et Prix côte à côte --}}
                            <div class="flex gap-2 mb-4">
                                <div class="flex-1">
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">État</label>
                                    <select name="condition" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                        <option value="mint">Parfait (Mint)</option>
                                        <option value="good" selected>Bon état</option>
                                        <option value="fair">Correct</option>
                                        <option value="poor">Abîmé</option>
                                    </select>
                                </div>
                                <div class="w-24">
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Prix (€)</label>
                                    <input type="number" name="price" step="0.01" value="0" min="0" 
                                           class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition">
                                Ajouter au patrimoine
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center py-10 text-gray-500">Aucun jeu trouvé pour cette recherche.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>