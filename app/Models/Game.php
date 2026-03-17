<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Game extends Model
{
    protected $fillable = [
        'user_id',
        'pc_id',
        'igdb_id',
        'cover_url',
        'name',
        'console_name',
        'condition',
        'price'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'pc_id' => 'integer',
        'igdb_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeMint($query)
    {
        return $query->where('condition', 'mint');
    }

    public function scopeOnConsole($query, $consoleName)
    {
        return $query->where('console_name', $consoleName);
    }

    private function getPriceChartingPlatformName(): string
    {
        $mapping = [
            'Game Boy Color' => 'gameboy-color',
            'Sega Mega Drive/Genesis' => 'sega-genesis',
            'Game Boy Advance' => 'gameboy-advance',
            'Super Nintendo Entertainment System' => 'snes',
            'Nintendo GameCube' => 'gamecube',
            'Nintendo Entertainment System' => 'nes',
            'Sega Master System/Mark III' => 'sega-master-system',
        ];

        return $mapping[$this->console_name] ?? Str::slug($this->console_name);
    }

    public function getPriceChartingUrlAttribute(): string
    {
        $platform = $this->getPriceChartingPlatformName();

        $gameSlug = Str::slug($this->name, '-');

        if (str_contains($this->name, "'")) {
            $gameSlug = str_replace("'", '%27', strtolower(str_replace(' ', '-', $this->name)));
            $gameSlug = preg_replace('/[^a-z0-9\-]/', '', $gameSlug);
        }

        return "https://www.pricecharting.com/game/{$platform}/{$gameSlug}";
    }
}
