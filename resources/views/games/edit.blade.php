<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier : {{ $game->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <div class="flex flex-col md:flex-row gap-8">
                    {{-- Colonne de gauche : Rappel du jeu --}}
                    <div class="w-full md:w-1/3 flex flex-col items-center">
                        @if($game->cover_url)
                            <img src="https:{{ str_replace('t_thumb', 't_cover_big', $game->cover_url) }}" 
                                 class="rounded-lg shadow-lg mb-4 w-48">
                        @endif
                        
                        <a href="{{ $game->price_charting_url }}" 
                           target="_blank" 
                           class="text-sm text-indigo-600 hover:underline flex items-center gap-1 font-medium">
                            <span>Ouvrir PriceCharting</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <p class="text-xs text-gray-400 mt-2 text-center italic">
                            Vérifie le prix actuel avant de valider.
                        </p>
                    </div>

                    {{-- Colonne de droite : Le formulaire --}}
                    <div class="flex-1">
                        <form action="{{ route('games.update', $game) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 gap-6 p-5">
                                {{-- Nom (Lecture seule pour éviter les erreurs) --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nom du jeu</label>
                                    <input type="text" value="{{ $game->name }}" disabled 
                                           class="mt-1 block w-full bg-gray-50 border-gray-300 rounded-md shadow-sm italic text-gray-500">
                                </div>

                                {{-- Console --}}
                                 <div>
                                    <label class="block text-sm font-medium text-gray-700">Console</label>
                                    <input type="text" value="{{ $game->console_name }}" disabled 
                                           class="mt-1 block w-full bg-gray-50 border-gray-300 rounded-md shadow-sm italic text-gray-500">
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    {{-- État --}}
                                    <div>
                                        <label for="condition" class="block text-sm font-medium text-gray-700">État</label>
                                        <select name="condition" id="condition" 
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                            <option value="mint" {{ $game->condition == 'mint' ? 'selected' : '' }}>Parfait (Mint)</option>
                                            <option value="good" {{ $game->condition == 'good' ? 'selected' : '' }}>Bon état</option>
                                            <option value="fair" {{ $game->condition == 'fair' ? 'selected' : '' }}>Correct</option>
                                            <option value="poor" {{ $game->condition == 'poor' ? 'selected' : '' }}>Abîmé</option>
                                        </select>
                                    </div>

                                    {{-- Prix --}}
                                    <div>
                                        <label for="price" class="block text-sm font-medium text-gray-700">Prix (€)</label>
                                        <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $game->price) }}"
                                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="flex items-center justify-end gap-4 mt-4">
                                    <a href="{{ route('games.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Annuler</a>
                                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md shadow transition">
                                        Enregistrer les modifications
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>