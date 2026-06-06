<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            // Tenant reference
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
 
            // ── Branding ────────────────────────────────────────────────
            $table->string('logo')->nullable();             // path: uploads/logo.png
            $table->string('favicon')->nullable();          // path: uploads/favicon.ico
            $table->string('app_name')->nullable();         // overrides default app name
 
            // ── Typography ──────────────────────────────────────────────
            $table->string('font_family')->default('Nunito, sans-serif');
            // e.g. "Nunito", "Poppins", "Roboto" – loaded from Google Fonts
 
            // ── Color Palette (mirrors the Website Settings screenshot) ──
            $table->string('primary_color')->default('#ff6b81');        // Primary Color *
            $table->string('heading_text_color')->default('#001828');   // Heading Text Color *
            $table->string('text_color')->default('#888');              // Text Color *
            $table->string('menu_bg_color')->default('transparent');    // Menu BG Color *
            $table->string('menu_text_color')->default('#fff');         // Menu Text Color *
            $table->string('footer_bg_color')->default('#001828');      // Footer BG Color *
            $table->string('footer_text_color')->default('#d2d6dc');    // Footer Text Color *
            $table->string('footer_bg2_color')->default('#020e0c');     // Footer BG2 Color *
            $table->string('footer_copyright_text_color')->default('#888'); // Footer Copyright Text *
 
            // ── Sidebar (admin panel) ───────────────────────────────────
            $table->string('sidebar_bg_color')->default('#001828');
            $table->string('sidebar_text_color')->default('#cdd4e0');
            $table->string('sidebar_active_bg')->default('#ff6b81');
            $table->string('sidebar_active_text')->default('#ffffff');
            $table->string('sidebar_hover_bg')->default('rgba(255,107,129,0.12)');
 
            // ── Topbar ──────────────────────────────────────────────────
            $table->string('topbar_bg_color')->default('#ffffff');
            $table->string('topbar_text_color')->default('#001828');
            $table->string('topbar_border_color')->default('#e8ecf0');
 
            // ── Button / Accent ─────────────────────────────────────────
            $table->string('btn_primary_bg')->default('#ff6b81');
            $table->string('btn_primary_text')->default('#ffffff');
            $table->string('btn_primary_hover_bg')->default('#e85c70');
 
            // ── Social Links ────────────────────────────────────────────
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('google_plus_url')->nullable();
 
            // ── PWA ─────────────────────────────────────────────────────
            $table->boolean('pwa_enabled')->default(false);
 
            // ── Custom CSS / JS (power users) ───────────────────────────
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
