<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contingent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'type',
        'province',
        'regency',
        'athlete_count',
        'official_count',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function homeSchedules()
    {
        return $this->hasMany(Schedule::class, 'contingent_id');
    }

    public function awaySchedules()
    {
        return $this->hasMany(Schedule::class, 'opponent_contingent_id');
    }

    public function standing()
    {
        return $this->hasOne(Standing::class);
    }

    public function getLogoUrlAttribute(): string
    {
        if (empty($this->logo)) {
            return asset('images/logo.png');
        }
        if (str_starts_with($this->logo, 'http://') || str_starts_with($this->logo, 'https://')) {
            return $this->logo;
        }
        if (str_starts_with($this->logo, 'images/')) {
            return asset($this->logo);
        }
        if (file_exists(public_path('images/' . $this->logo))) {
            return asset('images/' . $this->logo);
        }
        return asset('storage/' . ltrim($this->logo, '/'));
    }
}
