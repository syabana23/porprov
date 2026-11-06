<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'type_label',
        'address',
        'latitude',
        'longitude',
        'gmaps_url',
        'phone',
        'website',
        'services',
        'image',
        'venue_relation',
        'distance',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'is_active' => 'boolean',
    ];

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
}
