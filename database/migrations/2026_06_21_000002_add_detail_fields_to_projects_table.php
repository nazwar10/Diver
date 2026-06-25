<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('client_name')->nullable()->after('title');
            $table->string('timeline')->nullable()->after('tagline');
            $table->text('challenge')->nullable()->after('description');
            $table->text('solution')->nullable()->after('challenge');
            $table->string('hero_image_path')->nullable()->after('thumbnail_path');
            $table->json('gallery_images')->nullable()->after('hero_image_path');
            $table->json('services_used')->nullable()->after('gallery_images');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'client_name',
                'timeline',
                'challenge',
                'solution',
                'hero_image_path',
                'gallery_images',
                'services_used',
            ]);
        });
    }
};
