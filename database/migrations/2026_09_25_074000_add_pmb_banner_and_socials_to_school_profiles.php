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
        Schema::table('school_profiles', function (Blueprint $table) {
            if (!Schema::hasColumn('school_profiles', 'pmb_banner_title')) {
                $table->string('pmb_banner_title')->nullable()->default('PMB Gelombang 1 Resmi Dibuka !');
            }
            if (!Schema::hasColumn('school_profiles', 'pmb_banner_subtitle')) {
                $table->string('pmb_banner_subtitle')->nullable()->default('Pendaftaran Peserta Didik Baru (PPDB) SMK Wikrama 1 Garut');
            }
            if (!Schema::hasColumn('school_profiles', 'pmb_banner_text')) {
                $table->text('pmb_banner_text')->nullable();
            }
            if (!Schema::hasColumn('school_profiles', 'pmb_banner_image')) {
                $table->string('pmb_banner_image', 500)->nullable()->default('/assets/images/558651258_18389940643130368_6632104292343839978_n.jpg');
            }
            if (!Schema::hasColumn('school_profiles', 'pmb_banner_btn_text')) {
                $table->string('pmb_banner_btn_text', 100)->nullable()->default('Daftar sekarang');
            }
            if (!Schema::hasColumn('school_profiles', 'pmb_banner_btn_url')) {
                $table->string('pmb_banner_btn_url', 255)->nullable()->default('/spmb');
            }
            if (!Schema::hasColumn('school_profiles', 'facebook_url')) {
                $table->string('facebook_url', 255)->nullable()->default('https://www.facebook.com/smkwikrama1garut');
            }
            if (!Schema::hasColumn('school_profiles', 'instagram_url')) {
                $table->string('instagram_url', 255)->nullable()->default('https://www.instagram.com/smkwikrama1garut/');
            }
            if (!Schema::hasColumn('school_profiles', 'twitter_url')) {
                $table->string('twitter_url', 255)->nullable();
            }
            if (!Schema::hasColumn('school_profiles', 'youtube_url')) {
                $table->string('youtube_url', 255)->nullable()->default('https://www.youtube.com/@smkwikrama1garut');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'pmb_banner_title',
                'pmb_banner_subtitle',
                'pmb_banner_text',
                'pmb_banner_image',
                'pmb_banner_btn_text',
                'pmb_banner_btn_url',
                'facebook_url',
                'instagram_url',
                'twitter_url',
                'youtube_url',
            ]);
        });
    }
};

