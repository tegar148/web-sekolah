<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Berita extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'image_path',
        'image_url',
        'external_url',
        'published_at',
    ];

    /**
     * Resolve the final image URL.
     * Priority: image_url (external link) > image_path (local upload).
     */
    public function getImageSrcAttribute(): ?string
    {
        if ($this->image_url) {
            return $this->image_url;
        }

        if ($this->image_path) {
            return Storage::url($this->image_path);
        }

        return null;
    }

    /**
     * Check if this berita is an external link (no internal content).
     */
    public function getIsExternalAttribute(): bool
    {
        return !empty($this->external_url);
    }

    /**
     * Get the URL to navigate to when clicking this berita.
     */
    public function getBeritaUrlAttribute(): string
    {
        if ($this->external_url) {
            return $this->external_url;
        }

        return route('berita.show', $this->slug);
    }
}

