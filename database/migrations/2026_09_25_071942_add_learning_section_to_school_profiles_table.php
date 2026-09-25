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
            if (!Schema::hasColumn('school_profiles', 'learning_section_subtitle')) {
                $table->string('learning_section_subtitle')->nullable()->default('SMK Wikrama 1 Garut')->after('culture_section_btn_url');
            }
            if (!Schema::hasColumn('school_profiles', 'learning_section_title')) {
                $table->string('learning_section_title', 500)->nullable()->default('Tiada masyarakat pembelajar sekolah, tanpa pemimpin perubaban sekolah, dan tanpa kesungguhan warga sekolah');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_profiles', function (Blueprint $table) {
            $table->dropColumn(['learning_section_subtitle', 'learning_section_title']);
        });
    }
};
