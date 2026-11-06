<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;

    protected $fillable = [
        'contingent_id',
        'gold',
        'silver',
        'bronze',
        'total',
        'rank',
        'updated_by',
    ];

    protected $casts = [
        'gold' => 'integer',
        'silver' => 'integer',
        'bronze' => 'integer',
        'total' => 'integer',
        'rank' => 'integer',
    ];

    public function contingent()
    {
        return $this->belongsTo(Contingent::class);
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public static function recalculateRanks(): void
    {
        $standings = self::orderByDesc('gold')
            ->orderByDesc('silver')
            ->orderByDesc('bronze')
            ->get();

        $currentRank = 1;
        $prevGold = null;
        $prevSilver = null;
        $prevBronze = null;

        foreach ($standings as $index => $standing) {
            $standing->total = (int) $standing->gold + (int) $standing->silver + (int) $standing->bronze;

            if ($prevGold === $standing->gold && $prevSilver === $standing->silver && $prevBronze === $standing->bronze) {
                $standing->rank = $currentRank;
            } else {
                $currentRank = $index + 1;
                $standing->rank = $currentRank;
                $prevGold = $standing->gold;
                $prevSilver = $standing->silver;
                $prevBronze = $standing->bronze;
            }

            $standing->saveQuietly();
        }
    }
}
