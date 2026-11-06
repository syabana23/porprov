<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'category',
        'description',
        'venue_id',
        'address',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
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
        if (file_exists(public_path('images/cabor/' . $this->logo))) {
            return asset('images/cabor/' . $this->logo);
        }
        return asset('storage/' . ltrim($this->logo, '/'));
    }
}
