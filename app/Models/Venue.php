<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'address',
        'latitude',
        'longitude',
        'gmaps_url',
        'description',
        'image',
        'max_stops',
        'cabor_info',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'cabor_info' => 'array',
        'is_active' => 'boolean',
    ];

    public function sports()
    {
        return $this->hasMany(Sport::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        if (file_exists(public_path($this->image))) {
            return asset($this->image);
        }
        return asset('storage/' . ltrim($this->image, '/'));
    }

    public static function getActiveVenueMapData()
    {
        return self::with('sports')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(function ($venue) {
                $caborList = $venue->sports->pluck('name')->implode(', ');
                if (empty($caborList) && !empty($venue->cabor_info)) {
                    $caborList = is_array($venue->cabor_info) ? implode(', ', $venue->cabor_info) : $venue->cabor_info;
                }

                return [
                    'id' => $venue->id,
                    'name' => $venue->name,
                    'lat' => (float) $venue->latitude,
                    'lng' => (float) $venue->longitude,
                    'address' => $venue->address ?? '',
                    'cabor' => $caborList ?: 'Belum ada cabor terdaftar',
                    'gmaps_url' => $venue->gmaps_url ?? '',
                    'maxStops' => $venue->max_stops ?? 5,
                    'image' => $venue->image_url,
                ];
            })
            ->values()
            ->toArray();
    }
}
