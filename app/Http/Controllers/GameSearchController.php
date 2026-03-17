<?php

namespace App\Http\Controllers;

use App\Services\IgdbService;
use Illuminate\Http\Request;

class GameSearchController extends Controller
{
    public function index(Request $request, IgdbService $igdb)
    {
        // On récupère la recherche (ex: ?query=Zelda)
        $query = $request->input('query');

        // Si le champ est vide, on redirige vers l'inventaire avec un message
        if (!$query) {
            return redirect()->route('inventaire')->with('error', 'Veuillez saisir un nom de jeu.');
        }

        // On appelle ton Service qu'on a testé tout à l'heure
        $searchResults = $igdb->searchGame($query);

        return view('games.results', [
            'searchResults' => $searchResults,
            'searchTerm' => $query
        ]);
    }
}