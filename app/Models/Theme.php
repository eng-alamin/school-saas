<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $guarded = [];

    protected $casts = [
        'pwa_enabled' => 'boolean',
    ];
 
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
 
    // ── Helpers ──────────────────────────────────────────────────────────
 
    /**
     * Returns the full URL for the logo, or a default placeholder.
     */
    public function logoUrl(): string
    {
        if ($this->logo && file_exists(public_path($this->logo))) {
            return asset($this->logo);
        }
 
        return asset('assets/images/default-logo.png');
    }
 
    /**
     * Returns the full URL for the favicon, or a default.
     */
    public function faviconUrl(): string
    {
        if ($this->favicon && file_exists(public_path($this->favicon))) {
            return asset($this->favicon);
        }
 
        return asset('assets/images/favicon.ico');
    }
 
    /**
     * Extract Google Font name for embedding.
     * e.g. "Poppins, sans-serif" → "Poppins"
     */
    public function googleFontName(): ?string
    {
        $font = explode(',', $this->font_family)[0];
        $font = trim($font, " \"'");
 
        // Skip system / web-safe fonts
        $systemFonts = ['Arial', 'Helvetica', 'Georgia', 'serif', 'sans-serif', 'monospace'];
        if (in_array($font, $systemFonts, true)) {
            return null;
        }
 
        return $font;
    }
}
