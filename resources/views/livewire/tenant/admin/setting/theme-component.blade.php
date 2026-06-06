{{-- resources/views/livewire/tenant/admin/setting/theme-component.blade.php --}}
<div>

    {{-- ── Success toast ──────────────────────────────────────────────────── --}}
    @if (session()->has('theme_saved'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center gap-2 mb-4" role="alert"
             x-data="{ show: true }" x-show="show" x-transition
             x-init="setTimeout(() => show = false, 3500)">
            <i class="fas fa-check-circle"></i>
            <span>Website settings saved successfully.</span>
            <button type="button" class="btn-close ms-auto" @click="show = false"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom d-flex align-items-center gap-2 py-3">
            <i class="fas fa-palette" style="color: var(--primary-color)"></i>
            <h5 class="mb-0 fw-semibold">Website Settings</h5>

            {{-- Saving spinner --}}
            <div wire:loading wire:target="save" class="ms-auto d-flex align-items-center gap-2 text-muted small">
                <span class="spinner-border spinner-border-sm"></span> Saving…
            </div>
        </div>

        <div class="card-body p-4">

            {{-- ══════════════════════════════════════════════════════════════
                 PWA
            ═══════════════════════════════════════════════════════════════ --}}
            <section class="mb-5">
                <x-theme-section-title>Progressive Web Apps (PWA)</x-theme-section-title>

                <div class="row align-items-center">
                    <label class="col-sm-3 col-form-label text-sm-end">Enable</label>
                    <div class="col-sm-9">
                        <select wire:model="pwa_enabled" class="form-select" style="max-width:200px;">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('pwa_enabled') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>
            </section>

            {{-- ══════════════════════════════════════════════════════════════
                 BRANDING
            ═══════════════════════════════════════════════════════════════ --}}
            <section class="mb-5">
                <x-theme-section-title>Branding</x-theme-section-title>

                {{-- App Name --}}
                <div class="row mb-3 align-items-center">
                    <label class="col-sm-3 col-form-label text-sm-end">App / School Name</label>
                    <div class="col-sm-9">
                        <input type="text"
                               wire:model="app_name"
                               class="form-control @error('app_name') is-invalid @enderror">
                        @error('app_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Logo --}}
                <div class="row mb-3 align-items-center">
                    <label class="col-sm-3 col-form-label text-sm-end">Logo</label>
                    <div class="col-sm-9">
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            {{-- Existing logo preview --}}
                            @if ($existingLogo)
                                <img src="{{ asset('storage/' . $existingLogo) }}"
                                     alt="Current logo"
                                     class="rounded border"
                                     style="height:48px; object-fit:contain; background:#f8f9fa; padding:4px;">
                            @endif
                            {{-- Temporary upload preview --}}
                            @if ($logo)
                                <img src="{{ $logo->temporaryUrl() }}"
                                     alt="New logo preview"
                                     class="rounded border border-primary"
                                     style="height:48px; object-fit:contain; padding:4px;">
                            @endif
                            <input type="file"
                                   wire:model="logo"
                                   class="form-control @error('logo') is-invalid @enderror"
                                   accept="image/*"
                                   style="max-width:320px;">
                            <div wire:loading wire:target="logo" class="spinner-border spinner-border-sm text-primary"></div>
                        </div>
                        @error('logo') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Favicon --}}
                <div class="row mb-3 align-items-center">
                    <label class="col-sm-3 col-form-label text-sm-end">Favicon</label>
                    <div class="col-sm-9">
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            @if ($existingFavicon)
                                <img src="{{ asset('storage/' . $existingFavicon) }}"
                                     alt="Favicon"
                                     class="rounded border"
                                     style="width:32px; height:32px; object-fit:contain;">
                            @endif
                            @if ($favicon)
                                <img src="{{ $favicon->temporaryUrl() }}"
                                     alt="New favicon preview"
                                     class="rounded border border-primary"
                                     style="width:32px; height:32px; object-fit:contain;">
                            @endif
                            <input type="file"
                                   wire:model="favicon"
                                   class="form-control @error('favicon') is-invalid @enderror"
                                   accept=".ico,.png,.jpg"
                                   style="max-width:320px;">
                            <div wire:loading wire:target="favicon" class="spinner-border spinner-border-sm text-primary"></div>
                        </div>
                        @error('favicon') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Font Family --}}
                <div class="row mb-3 align-items-center">
                    <label class="col-sm-3 col-form-label text-sm-end">Font Family</label>
                    <div class="col-sm-9">
                        <input type="text"
                               wire:model="font_family"
                               class="form-control"
                               placeholder="e.g. Nunito, sans-serif">
                        <small class="text-muted">Google Font name or CSS font stack.</small>
                    </div>
                </div>
            </section>

            {{-- ══════════════════════════════════════════════════════════════
                 THEME OPTIONS — Color Palette
            ═══════════════════════════════════════════════════════════════ --}}
            <section class="mb-5">
                <x-theme-section-title>Theme Options</x-theme-section-title>

                @php
                    $colorFields = [
                        'primary_color'               => ['label' => 'Primary Color',               'required' => true],
                        'heading_text_color'           => ['label' => 'Heading Text Color',          'required' => true],
                        'text_color'                   => ['label' => 'Text Color',                  'required' => true],
                        'menu_bg_color'                => ['label' => 'Menu BG Color',               'required' => true],
                        'menu_text_color'              => ['label' => 'Menu Text Color',             'required' => true],
                        'footer_bg_color'              => ['label' => 'Footer BG Color',             'required' => true],
                        'footer_text_color'            => ['label' => 'Footer Text Color',           'required' => true],
                        'footer_bg2_color'             => ['label' => 'Footer BG2 Color',            'required' => true],
                        'footer_copyright_text_color'  => ['label' => 'Footer Copyright Text Color', 'required' => true],
                        'sidebar_bg_color'             => ['label' => 'Sidebar BG Color',            'required' => false],
                        'sidebar_text_color'           => ['label' => 'Sidebar Text Color',          'required' => false],
                        'sidebar_active_bg'            => ['label' => 'Sidebar Active BG',           'required' => false],
                        'sidebar_active_text'          => ['label' => 'Sidebar Active Text',         'required' => false],
                        'topbar_bg_color'              => ['label' => 'Topbar BG Color',             'required' => false],
                        'topbar_text_color'            => ['label' => 'Topbar Text Color',           'required' => false],
                        'btn_primary_bg'               => ['label' => 'Button Primary BG',           'required' => false],
                        'btn_primary_text'             => ['label' => 'Button Primary Text',         'required' => false],
                        'btn_primary_hover_bg'         => ['label' => 'Button Primary Hover BG',     'required' => false],
                    ];
                @endphp

                @foreach ($colorFields as $field => $meta)
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label text-sm-end">
                            {{ $meta['label'] }}
                            @if ($meta['required']) <span class="text-danger">*</span> @endif
                        </label>
                        <div class="col-sm-9 d-flex align-items-center gap-2">
                            {{-- Text input bound to Livewire property --}}
                            <input type="text"
                                   wire:model.live.debounce.300ms="{{ $field }}"
                                   class="form-control @error($field) is-invalid @enderror"
                                   style="max-width: 190px;"
                                   placeholder="transparent / #hex / rgba()">

                            {{-- Color picker — Alpine syncs it with the wire:model value --}}
                            <div x-data="{
                                    get val() { return @js($this->$field ?? '#000000') },
                                }"
                                 x-init="
                                    $watch('val', v => {
                                        $el.querySelector('input[type=color]').value =
                                            /^#[0-9a-fA-F]{3,6}$/.test(v) ? v : '#000000';
                                    });
                                 "
                                 @theme-color-updated.window="
                                    if ($event.detail.property === '{{ $field }}') {
                                        val = $event.detail.value;
                                    }
                                 ">
                                <input type="color"
                                       style="width:36px; height:36px; padding:2px; border-radius:6px; cursor:pointer; border:1px solid #dee2e6;"
                                       value="{{ preg_match('/^#[0-9a-fA-F]{3,6}$/', $this->$field ?? '') ? $this->$field : '#000000' }}"
                                       @input="$wire.set('{{ $field }}', $el.value)">
                            </div>

                            @error($field)
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </section>

            {{-- ══════════════════════════════════════════════════════════════
                 SOCIAL LINKS
            ═══════════════════════════════════════════════════════════════ --}}
            <section class="mb-5">
                <x-theme-section-title>Social Links</x-theme-section-title>

                @php
                    $socialFields = [
                        'facebook_url'    => ['label' => 'Facebook URL',  'icon' => 'fab fa-facebook',  'placeholder' => 'https://www.facebook.com/username'],
                        'twitter_url'     => ['label' => 'Twitter URL',   'icon' => 'fab fa-twitter',   'placeholder' => 'https://www.twitter.com/username'],
                        'linkedin_url'    => ['label' => 'LinkedIn URL',  'icon' => 'fab fa-linkedin',  'placeholder' => 'https://www.linkedin.com/username'],
                        'instagram_url'   => ['label' => 'Instagram URL', 'icon' => 'fab fa-instagram', 'placeholder' => 'https://www.instagram.com/username'],
                        'youtube_url'     => ['label' => 'Youtube URL',   'icon' => 'fab fa-youtube',   'placeholder' => 'https://www.youtube.com/username'],
                        'google_plus_url' => ['label' => 'Google Plus',   'icon' => 'fab fa-google',    'placeholder' => ''],
                    ];
                @endphp

                @foreach ($socialFields as $field => $meta)
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-3 col-form-label text-sm-end">{{ $meta['label'] }}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-text"><i class="{{ $meta['icon'] }}"></i></span>
                                <input type="url"
                                       wire:model="{{ $field }}"
                                       class="form-control @error($field) is-invalid @enderror"
                                       placeholder="{{ $meta['placeholder'] }}">
                                @error($field) <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

            {{-- ══════════════════════════════════════════════════════════════
                 ADVANCED — Custom CSS / JS
            ═══════════════════════════════════════════════════════════════ --}}
            <section class="mb-5">
                <x-theme-section-title>Advanced</x-theme-section-title>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label text-sm-end">Custom CSS</label>
                    <div class="col-sm-9">
                        <textarea wire:model="custom_css"
                                  class="form-control font-monospace @error('custom_css') is-invalid @enderror"
                                  rows="6"
                                  placeholder="/* Your custom CSS here */">{{ $custom_css }}</textarea>
                        @error('custom_css') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label text-sm-end">Custom JS</label>
                    <div class="col-sm-9">
                        <textarea wire:model="custom_js"
                                  class="form-control font-monospace @error('custom_js') is-invalid @enderror"
                                  rows="6"
                                  placeholder="// Your custom JavaScript here">{{ $custom_js }}</textarea>
                        @error('custom_js') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </section>

            {{-- ── Save button ─────────────────────────────────────────────── --}}
            <div class="row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="button"
                            wire:click="save"
                            wire:loading.attr="disabled"
                            wire:target="save"
                            class="btn btn-primary px-5">
                        <span wire:loading.remove wire:target="save">
                            <i class="fas fa-save me-1"></i> Save
                        </span>
                        <span wire:loading wire:target="save">
                            <span class="spinner-border spinner-border-sm me-1"></span> Saving…
                        </span>
                    </button>
                </div>
            </div>

        </div>{{-- /.card-body --}}
    </div>{{-- /.card --}}

</div>