<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                <h3 class="text-lg font-bold mb-4">Bienvenue dans ton gestionnaire de collection !</h3>
                <p class="mb-6">Tu as actuellement des jeux à estimer ou à ajouter ?</p>
                
                <a href="{{ route('games.index') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
                    Accéder à mon Inventaire
                </a>
            </div>
        </div>
    </div>
</x-app-layout>