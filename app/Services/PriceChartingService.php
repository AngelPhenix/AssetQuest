<?php

namespace App\Services;

use Illuminate\Support\Str;

class PriceChartingService
{
    /**
     * On simule la recherche sans API.
     * On retourne une Collection pour utiliser les outils de tri de Laravel.
     */
    public function search(string $query)
    {
        // 1. Notre "Fausse" base de données (Le Mock)
        $mockData = [
            ['id' => 101, 'name' => 'Zelda: Ocarina of Time', 'console' => 'N64', 'condition' => 'Excellent', 'price' => 85.50],
            ['id' => 102, 'name' => 'Zelda: A Link to the Past', 'console' => 'SNES', 'condition' => 'Bon', 'price' => 120.00],
            ['id' => 103, 'name' => 'Super Mario 64', 'console' => 'N64', 'condition' => 'Très Bon', 'price' => 45.00],
            ['id' => 104, 'name' => 'Final Fantasy VII', 'console' => 'PS1', 'condition' => 'Excellent', 'price' => 60.00],
            ['id' => 105, 'name' => 'Metroid Prime', 'console' => 'GameCube', 'condition' => 'Bon', 'price' => 35.00],
        ];

        // 2. On transforme ça en Collection Laravel
        // C'est ici qu'on simule le filtrage SQL/API
        return collect($mockData)->filter(function ($item) use ($query) {
            if (empty($query)) return true;
            
            // On vérifie si le nom du jeu contient la recherche (insensible à la casse)
            return Str::contains(strtolower($item['name']), strtolower($query));
        })->values(); // Reset les clés du tableau
    }
}