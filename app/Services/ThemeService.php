<?php

namespace App\Services;

use App\Models\TenantTheme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ThemeService
{
    /**
     * How long (in seconds) a theme is cached per tenant.
     * Adjust freely – 1 hour is a safe default.
     */
    private const CACHE_TTL = 3600;

    /**
     * Cache key prefix.
     */
    private const CACHE_PREFIX = 'tenant_theme_';

    // ── Public API ────────────────────────────────────────────────────────

    /**
     * Load and return the TenantTheme for the given tenant ID.
     * Creates a default record if none exists yet.
     *
     * @param  int  $tenantId
     * @return TenantTheme
     */
    public function getTheme(int $tenantId): TenantTheme
    {
        return Cache::remember(
            self::CACHE_PREFIX . $tenantId,
            self::CACHE_TTL,
            function () use ($tenantId) {
                return TenantTheme::firstOrCreate(
                    ['tenant_id' => $tenantId],
                    $this->defaultAttributes($tenantId)
                );
            }
        );
    }

    /**
     * Persist theme settings and flush the cache so the next request
     * picks up the new values immediately.
     *
     * @param  int    $tenantId
     * @param  array  $attributes  Validated key→value pairs from the settings form.
     * @return TenantTheme
     */
    public function updateTheme(int $tenantId, array $attributes): TenantTheme
    {
        $theme = TenantTheme::updateOrCreate(
            ['tenant_id' => $tenantId],
            $attributes
        );

        $this->flush($tenantId);

        Log::info("TenantTheme updated for tenant #{$tenantId}");

        return $theme;
    }

    /**
     * Clear the cached theme for one tenant.
     *
     * @param  int  $tenantId
     * @return void
     */
    public function flush(int $tenantId): void
    {
        Cache::forget(self::CACHE_PREFIX . $tenantId);
    }

    /**
     * Build the CSS variable map from a TenantTheme instance.
     * This is what the Blade layout feeds into its <style> block.
     *
     * @param  TenantTheme  $theme
     * @return array<string, string>  e.g. ['--primary-color' => '#ff6b81', ...]
     */
    public function toCssVariables(TenantTheme $theme): array
    {
        return [
            // ── Typography ────────────────────────────────────────
            '--font-family'                    => $theme->font_family,

            // ── Brand / Frontend colors ───────────────────────────
            '--primary-color'                  => $theme->primary_color,
            '--heading-text-color'             => $theme->heading_text_color,
            '--text-color'                     => $theme->text_color,

            // ── Menu ──────────────────────────────────────────────
            '--menu-bg-color'                  => $theme->menu_bg_color,
            '--menu-text-color'                => $theme->menu_text_color,

            // ── Footer ────────────────────────────────────────────
            '--footer-bg-color'                => $theme->footer_bg_color,
            '--footer-text-color'              => $theme->footer_text_color,
            '--footer-bg2-color'               => $theme->footer_bg2_color,
            '--footer-copyright-text-color'    => $theme->footer_copyright_text_color,

            // ── Admin Sidebar ─────────────────────────────────────
            '--sidebar-bg-color'               => $theme->sidebar_bg_color,
            '--sidebar-text-color'             => $theme->sidebar_text_color,
            '--sidebar-active-bg'              => $theme->sidebar_active_bg,
            '--sidebar-active-text'            => $theme->sidebar_active_text,
            '--sidebar-hover-bg'               => $theme->sidebar_hover_bg,

            // ── Topbar ────────────────────────────────────────────
            '--topbar-bg-color'                => $theme->topbar_bg_color,
            '--topbar-text-color'              => $theme->topbar_text_color,
            '--topbar-border-color'            => $theme->topbar_border_color,

            // ── Buttons / Accents ─────────────────────────────────
            '--btn-primary-bg'                 => $theme->btn_primary_bg,
            '--btn-primary-text'               => $theme->btn_primary_text,
            '--btn-primary-hover-bg'           => $theme->btn_primary_hover_bg,
        ];
    }

    /**
     * Render CSS variable declarations ready for embedding in a <style> tag.
     *
     * @param  TenantTheme  $theme
     * @return string
     */
    public function renderCssBlock(TenantTheme $theme): string
    {
        $lines = [':root {'];

        foreach ($this->toCssVariables($theme) as $var => $value) {
            $lines[] = "    {$var}: " . e($value) . ';';
        }

        $lines[] = '}';

        if ($theme->custom_css) {
            $lines[] = "\n/* ── Tenant Custom CSS ── */";
            $lines[] = $theme->custom_css;
        }

        return implode("\n", $lines);
    }

    // ── Private helpers ───────────────────────────────────────────────────

    private function defaultAttributes(int $tenantId): array
    {
        return [
            'tenant_id'                    => $tenantId,
            'font_family'                  => 'Nunito, sans-serif',
            'primary_color'                => '#ff6b81',
            'heading_text_color'           => '#001828',
            'text_color'                   => '#888888',
            'menu_bg_color'                => 'transparent',
            'menu_text_color'              => '#ffffff',
            'footer_bg_color'              => '#001828',
            'footer_text_color'            => '#d2d6dc',
            'footer_bg2_color'             => '#020e0c',
            'footer_copyright_text_color'  => '#888888',
            'sidebar_bg_color'             => '#001828',
            'sidebar_text_color'           => '#cdd4e0',
            'sidebar_active_bg'            => '#ff6b81',
            'sidebar_active_text'          => '#ffffff',
            'sidebar_hover_bg'             => 'rgba(255,107,129,0.12)',
            'topbar_bg_color'              => '#ffffff',
            'topbar_text_color'            => '#001828',
            'topbar_border_color'          => '#e8ecf0',
            'btn_primary_bg'               => '#ff6b81',
            'btn_primary_text'             => '#ffffff',
            'btn_primary_hover_bg'         => '#e85c70',
        ];
    }
}