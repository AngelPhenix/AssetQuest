<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;

class IgdbService
{
    protected string $baseUrl = 'https://api.igdb.com/v4';

    public function searchGame(string $query)
    {
        // 1. On récupère le Token (on simplifie pour le test)
        $tokenResponse = Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => config('services.igdb.id'),
            'client_secret' => config('services.igdb.secret'),
            'grant_type' => 'client_credentials',
        ]);

        $token = $tokenResponse->json()['access_token'];

        // 2. On fait la recherche
        // IGDB utilise son propre langage (Apicalypse) dans le corps de la requête
        $response = Http::withHeaders([
            'Client-ID' => config('services.igdb.id'),
            'Authorization' => 'Bearer ' . $token,
        ])
        ->withBody("search \"$query\"; fields name, cover.url, first_release_date, platforms.name; limit 30;", 'text/plain')
        ->post($this->baseUrl . '/games');

        return $response->json();
    }
}