<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'media_type',
        'file_path',
        'url',
        'caption',
        'category',
        'sort_order',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->file_path)) {
            return null;
        }
        if (str_starts_with($this->file_path, 'http://') || str_starts_with($this->file_path, 'https://')) {
            return $this->file_path;
        }
        if (file_exists(public_path($this->file_path))) {
            return asset($this->file_path);
        }
        return asset('storage/' . ltrim($this->file_path, '/'));
    }
}
