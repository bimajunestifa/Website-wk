<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_feature_cards', function (Blueprint $table) {
            $table->id();
            $table->string('section')->default('karakter'); // 'karakter' or 'budaya'
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('link_url')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::table('school_profiles', function (Blueprint $table) {
            $table->text('character_section_title')->nullable()->after('tagline');
            $table->string('character_section_btn_text')->nullable()->default('Daftar Sekarang')->after('character_section_title');
            $table->string('character_section_btn_url')->nullable()->default('/spmb')->after('character_section_btn_text');

            $table->text('culture_section_title')->nullable()->after('character_section_btn_url');
            $table->string('culture_section_btn_text')->nullable()->default('Pelajari Lebih Lanjut ->')->after('culture_section_title');
            $table->string('culture_section_btn_url')->nullable()->default('/spmb')->after('culture_section_btn_text');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_feature_cards');
        Schema::table('school_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'character_section_title',
                'character_section_btn_text',
                'character_section_btn_url',
                'culture_section_title',
                'culture_section_btn_text',
                'culture_section_btn_url',
            ]);
        });
    }
};

