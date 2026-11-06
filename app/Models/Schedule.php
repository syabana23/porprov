<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport_id',
        'venue_id',
        'category',
        'match_title',
        'contingent_id',
        'opponent_contingent_id',
        'match_date',
        'start_time',
        'end_time',
        'status',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'match_date' => 'date',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function contingent()
    {
        return $this->belongsTo(Contingent::class, 'contingent_id');
    }

    public function opponentContingent()
    {
        return $this->belongsTo(Contingent::class, 'opponent_contingent_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
