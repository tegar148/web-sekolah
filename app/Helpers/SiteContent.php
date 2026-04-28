<?php

namespace App\Helpers;

use App\Models\SiteSection;

class SiteContent
{
    /**
     * Get a section for a page. Returns null if not visible.
     */
    public static function get(string $page, string $sectionKey): ?SiteSection
    {
        return SiteSection::where('page', $page)
            ->where('section_key', $sectionKey)
            ->first();
    }

    /**
     * Check if a section is visible
     */
    public static function isVisible(string $page, string $sectionKey): bool
    {
        $section = self::get($page, $sectionKey);
        return $section ? $section->is_visible : true;
    }

    /**
     * Get all sections for a page, ordered by sort_order
     */
    public static function page(string $page): \Illuminate\Database\Eloquent\Collection
    {
        return SiteSection::where('page', $page)->orderBy('sort_order')->get();
    }

    /**
     * Shortcut: get a field from a section with a fallback
     */
    public static function field(string $page, string $sectionKey, string $field, string $default = ''): string
    {
        $section = self::get($page, $sectionKey);
        return $section && $section->{$field} ? $section->{$field} : $default;
    }
}
