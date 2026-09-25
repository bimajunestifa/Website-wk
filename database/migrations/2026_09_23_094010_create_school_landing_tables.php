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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('image_url')->nullable();
            $table->string('btn_text')->default('Daftar Sekarang');
            $table->string('btn_url')->default('https://spmb.smkwikrama1garut.sch.id');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->default('SMK Wikrama 1 Garut');
            $table->string('tagline')->default('Solusi Pendidikan Akhlaq Modern Era 4.0');
            $table->text('philosophy')->nullable();
            $table->text('description')->nullable();
            $table->string('principal_name')->default('Kunedi, S.Si.');
            $table->string('principal_title')->default('Kepala SMK Wikrama 1 Garut');
            $table->string('principal_image')->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->string('phone')->default('0813-2331-4430');
            $table->string('whatsapp')->default('6281323314430');
            $table->string('email')->default('info@smkwikrama1garut.sch.id');
            $table->text('address')->nullable();
            $table->text('maps_embed_url')->nullable();
            $table->string('brochure_url')->nullable();
            $table->string('spmb_url')->nullable();
            $table->timestamps();
        });

        Schema::create('vision_missions', function (Blueprint $table) {
            $table->id();
            $table->text('vision');
            $table->json('mission');
            $table->string('motto')->default('Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah');
            $table->timestamps();
        });

        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('advantages')->nullable();
            $table->text('career_prospects')->nullable();
            $table->string('image_url')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('Laboratorium');
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('education_reports', function (Blueprint $table) {
            $table->id();
            $table->string('indicator_name');
            $table->decimal('score', 5, 2)->default(90);
            $table->integer('percentage')->default(90);
            $table->string('status')->default('Sangat Baik');
            $table->string('ranking_text')->nullable();
            $table->text('notes')->nullable();
            $table->string('year')->default('2024/2025');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('school_cultures', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('Mitra Industri');
            $table->string('badge_text')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('website')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('category')->default('Berita');
            $table->string('image_url')->nullable();
            $table->string('author')->default('Humas Wikrama');
            $table->date('published_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('news');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('school_cultures');
        Schema::dropIfExists('education_reports');
        Schema::dropIfExists('facilities');
        Schema::dropIfExists('majors');
        Schema::dropIfExists('vision_missions');
        Schema::dropIfExists('school_profiles');
        Schema::dropIfExists('sliders');
    }
};
