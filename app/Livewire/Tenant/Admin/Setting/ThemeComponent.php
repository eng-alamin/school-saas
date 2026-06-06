<?php

namespace App\Livewire\Tenant\Admin\Setting;

use App\Models\TenantTheme;
use App\Services\ThemeService;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ThemeComponent extends Component
{
    use WithFileUploads;

    // ── Injected service ──────────────────────────────────────────────────
    protected ThemeService $themeService;

    // ── File uploads (Livewire temporary files) ───────────────────────────
    public $logo   = null;   // new upload
    public $favicon = null;  // new upload

    // ── Branding ──────────────────────────────────────────────────────────
    public string $app_name   = '';
    public string $font_family = 'Nunito, sans-serif';

    // Existing file paths (from DB) shown as previews
    public ?string $existingLogo    = null;
    public ?string $existingFavicon = null;

    // ── Frontend colors ───────────────────────────────────────────────────
    public string $primary_color              = '#ff6b81';
    public string $heading_text_color         = '#001828';
    public string $text_color                 = '#888888';
    public string $menu_bg_color              = 'transparent';
    public string $menu_text_color            = '#ffffff';
    public string $footer_bg_color            = '#001828';
    public string $footer_text_color          = '#d2d6dc';
    public string $footer_bg2_color           = '#020e0c';
    public string $footer_copyright_text_color = '#888888';

    // ── Admin sidebar colors ──────────────────────────────────────────────
    public string $sidebar_bg_color    = '#001828';
    public string $sidebar_text_color  = '#cdd4e0';
    public string $sidebar_active_bg   = '#ff6b81';
    public string $sidebar_active_text = '#ffffff';
    public string $sidebar_hover_bg    = 'rgba(255,107,129,0.12)';

    // ── Topbar ────────────────────────────────────────────────────────────
    public string $topbar_bg_color     = '#ffffff';
    public string $topbar_text_color   = '#001828';
    public string $topbar_border_color = '#e8ecf0';

    // ── Buttons ───────────────────────────────────────────────────────────
    public string $btn_primary_bg      = '#ff6b81';
    public string $btn_primary_text    = '#ffffff';
    public string $btn_primary_hover_bg = '#e85c70';

    // ── Social links ──────────────────────────────────────────────────────
    public string $facebook_url    = '';
    public string $twitter_url     = '';
    public string $linkedin_url    = '';
    public string $instagram_url   = '';
    public string $youtube_url     = '';
    public string $google_plus_url = '';

    // ── PWA ───────────────────────────────────────────────────────────────
    public bool $pwa_enabled = false;

    // ── Custom code ───────────────────────────────────────────────────────
    public string $custom_css = '';
    public string $custom_js  = '';

    // ── Validation rules ──────────────────────────────────────────────────
    protected function rules(): array
    {
        return [
            // Branding
            'app_name'                     => 'nullable|string|max:100',
            'font_family'                  => 'nullable|string|max:100',
            'logo'                         => 'nullable|image|max:2048',
            'favicon'                      => 'nullable|mimes:ico,png,jpg|max:512',

            // Frontend colors
            'primary_color'                => 'nullable|string|max:50',
            'heading_text_color'           => 'nullable|string|max:50',
            'text_color'                   => 'nullable|string|max:50',
            'menu_bg_color'                => 'nullable|string|max:50',
            'menu_text_color'              => 'nullable|string|max:50',
            'footer_bg_color'              => 'nullable|string|max:50',
            'footer_text_color'            => 'nullable|string|max:50',
            'footer_bg2_color'             => 'nullable|string|max:50',
            'footer_copyright_text_color'  => 'nullable|string|max:50',

            // Sidebar
            'sidebar_bg_color'             => 'nullable|string|max:50',
            'sidebar_text_color'           => 'nullable|string|max:50',
            'sidebar_active_bg'            => 'nullable|string|max:50',
            'sidebar_active_text'          => 'nullable|string|max:50',
            'sidebar_hover_bg'             => 'nullable|string|max:80',

            // Topbar
            'topbar_bg_color'              => 'nullable|string|max:50',
            'topbar_text_color'            => 'nullable|string|max:50',
            'topbar_border_color'          => 'nullable|string|max:50',

            // Buttons
            'btn_primary_bg'               => 'nullable|string|max:50',
            'btn_primary_text'             => 'nullable|string|max:50',
            'btn_primary_hover_bg'         => 'nullable|string|max:50',

            // Social links
            'facebook_url'                 => 'nullable|url|max:255',
            'twitter_url'                  => 'nullable|url|max:255',
            'linkedin_url'                 => 'nullable|url|max:255',
            'instagram_url'                => 'nullable|url|max:255',
            'youtube_url'                  => 'nullable|url|max:255',
            'google_plus_url'              => 'nullable|url|max:255',

            // PWA
            'pwa_enabled'                  => 'boolean',

            // Custom code
            'custom_css'                   => 'nullable|string|max:10000',
            'custom_js'                    => 'nullable|string|max:10000',
        ];
    }

    // ── Boot / mount ──────────────────────────────────────────────────────

    public function boot(ThemeService $themeService): void
    {
        $this->themeService = $themeService;
    }

    public function mount(): void
    {
        $theme = $this->themeService->getTheme($this->tenantId());
        $this->fillFromModel($theme);
    }

    // ── Livewire lifecycle: real-time preview as user types ───────────────

    /**
     * Whenever a color property changes, dispatch a browser event so Alpine/JS
     * can update a live preview swatch without saving.
     */
    public function updated(string $property): void
    {
        // Dispatch only for color-like fields
        if (str_contains($property, '_color') || str_contains($property, '_bg') || str_contains($property, '_text')) {
            $this->dispatch('theme-color-updated', property: $property, value: $this->$property);
        }
    }

    // ── Actions ───────────────────────────────────────────────────────────

    public function save(): void
    {
        $this->validate();

        $attributes = $this->collectAttributes();

        // ── Handle logo upload ────────────────────────────────────────────
        if ($this->logo) {
            $attributes['logo'] = $this->logo->store(
                "tenants/{$this->tenantId()}/branding", 'public'
            );
            $this->logo = null; // reset after upload
        }

        // ── Handle favicon upload ─────────────────────────────────────────
        if ($this->favicon) {
            $attributes['favicon'] = $this->favicon->store(
                "tenants/{$this->tenantId()}/branding", 'public'
            );
            $this->favicon = null;
        }

        $theme = $this->themeService->updateTheme($this->tenantId(), $attributes);

        // Refresh existing file paths shown in the preview
        $this->existingLogo    = $theme->logo;
        $this->existingFavicon = $theme->favicon;

        session()->flash('theme_saved', true);

        $this->dispatch('theme-saved');
    }

    // ── Private helpers ───────────────────────────────────────────────────

    private function fillFromModel(TenantTheme $theme): void
    {
        $fields = [
            'app_name', 'font_family',
            'primary_color', 'heading_text_color', 'text_color',
            'menu_bg_color', 'menu_text_color',
            'footer_bg_color', 'footer_text_color', 'footer_bg2_color', 'footer_copyright_text_color',
            'sidebar_bg_color', 'sidebar_text_color', 'sidebar_active_bg', 'sidebar_active_text', 'sidebar_hover_bg',
            'topbar_bg_color', 'topbar_text_color', 'topbar_border_color',
            'btn_primary_bg', 'btn_primary_text', 'btn_primary_hover_bg',
            'facebook_url', 'twitter_url', 'linkedin_url', 'instagram_url', 'youtube_url', 'google_plus_url',
            'pwa_enabled', 'custom_css', 'custom_js',
        ];

        foreach ($fields as $field) {
            if ($theme->$field !== null) {
                $this->$field = $theme->$field;
            }
        }

        $this->existingLogo    = $theme->logo;
        $this->existingFavicon = $theme->favicon;
    }

    private function collectAttributes(): array
    {
        return [
            'app_name'                     => $this->app_name,
            'font_family'                  => $this->font_family,
            'primary_color'                => $this->primary_color,
            'heading_text_color'           => $this->heading_text_color,
            'text_color'                   => $this->text_color,
            'menu_bg_color'                => $this->menu_bg_color,
            'menu_text_color'              => $this->menu_text_color,
            'footer_bg_color'              => $this->footer_bg_color,
            'footer_text_color'            => $this->footer_text_color,
            'footer_bg2_color'             => $this->footer_bg2_color,
            'footer_copyright_text_color'  => $this->footer_copyright_text_color,
            'sidebar_bg_color'             => $this->sidebar_bg_color,
            'sidebar_text_color'           => $this->sidebar_text_color,
            'sidebar_active_bg'            => $this->sidebar_active_bg,
            'sidebar_active_text'          => $this->sidebar_active_text,
            'sidebar_hover_bg'             => $this->sidebar_hover_bg,
            'topbar_bg_color'              => $this->topbar_bg_color,
            'topbar_text_color'            => $this->topbar_text_color,
            'topbar_border_color'          => $this->topbar_border_color,
            'btn_primary_bg'               => $this->btn_primary_bg,
            'btn_primary_text'             => $this->btn_primary_text,
            'btn_primary_hover_bg'         => $this->btn_primary_hover_bg,
            'facebook_url'                 => $this->facebook_url,
            'twitter_url'                  => $this->twitter_url,
            'linkedin_url'                 => $this->linkedin_url,
            'instagram_url'                => $this->instagram_url,
            'youtube_url'                  => $this->youtube_url,
            'google_plus_url'              => $this->google_plus_url,
            'pwa_enabled'                  => $this->pwa_enabled,
            'custom_css'                   => $this->custom_css,
            'custom_js'                    => $this->custom_js,
        ];
    }

    private function tenantId(): int
    {
        // Adjust to your tenant resolution strategy.
        return (int) auth()->user()->tenant_id;
    }

    // ── Render ────────────────────────────────────────────────────────────

    public function render()
    {
        return view('livewire.tenant.admin.setting.theme-component')
            ->layout('layouts.tenant.app', ['title' => 'Theme Settings']);
    }
}