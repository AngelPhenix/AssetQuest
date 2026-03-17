<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\PriceChartingService;

class GameController extends Controller
{
    public function index() 
    {
        $games = auth()->user()->games;

        $totalValue = $games->sum('price');

        return view('games.index', [
            'games' => $games,
            'totalValue' => $totalValue
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'igdb_id' => 'required',
            'name' => 'required',
            'platform_name' => 'required',
            'condition' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        Game::create([
            'user_id' => auth()->id(),
            'igdb_id' => $request->igdb_id,
            'name' => $request->name,
            'cover_url' => $request->cover_url,
            'console_name' => $request->platform_name,
            'condition' => $request->condition, // On récupère la valeur du form
            'price' => $request->price,         // On récupère la valeur du form
        ]);

        return redirect()->route('games.index')->with('success', 'Jeu ajouté avec succès !');
    }

    public function edit(Game $game)
    {
        // Ensure the authenticated user owns the game
        if ($game->user_id !== auth()->id()) {
            abort(403, 'Action non autorisée.');
        }

        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        // Ensure the authenticated user owns the game
        if ($game->user_id !== auth()->id()) {
            abort(403, 'Action non autorisée.');
        }

        $request->validate([
            'condition' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $game->update([
            'condition' => $request->condition,
            'price' => $request->price,
        ]);

        return redirect()->route('games.index')->with('success', 'Jeu mis à jour avec succès !');
    }

    public function destroy(Game $game)
    {
        // Ensure the authenticated user owns the game
        if ($game->user_id !== auth()->id()) {
            abort(403, 'Action non autorisée.');
        }

        $game->delete();

        return redirect()->route('games.index')->with('success', 'Jeu supprimé de votre patrimoine !');
    }
}
