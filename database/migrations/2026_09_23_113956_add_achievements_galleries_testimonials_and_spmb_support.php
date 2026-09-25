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
        // 1. Prestasi (Achievements)
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('Nasional'); // Nasional, Internasional, Provinsi, Kabupaten
            $table->string('recipient_name')->nullable(); // Nama siswa / tim / sekolah
            $table->string('rank')->nullable(); // Juara 1, Juara 2, Medali Emas, Finalis, dsb
            $table->string('event_year')->default('2025');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 2. Galeri Foto & Media
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('Kegiatan Siswa'); // Fasilitas, Prestasi, Kegiatan Siswa, Gedung
            $table->string('image_url');
            $table->text('caption')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 3. Testimoni Alumni (terutama dari spmb.html)
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('graduation_year')->nullable(); // Contoh: 2000, 2011, 2016
            $table->string('major')->nullable(); // Contoh: Rekayasa Perangkat Lunak (RPL)
            $table->text('quote');
            $table->string('photo_url')->nullable();
            $table->string('company')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 4. Update Sliders with type (home / spmb)
        Schema::table('sliders', function (Blueprint $table) {
            if (!Schema::hasColumn('sliders', 'type')) {
                $table->string('type')->default('home')->after('id');
            }
        });

        // 5. Update School Profiles with Motto, Afirmasi, Attitude
        Schema::table('school_profiles', function (Blueprint $table) {
            if (!Schema::hasColumn('school_profiles', 'motto')) {
                $table->string('motto')->default('Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah')->after('tagline');
            }
            if (!Schema::hasColumn('school_profiles', 'afirmasi')) {
                $table->string('afirmasi')->default('Padamu negeri - kami berjanji - lulus Wikrama siap membangun negeri')->after('motto');
            }
            if (!Schema::hasColumn('school_profiles', 'attitude')) {
                $table->string('attitude')->default('Aku ada lingkunganku bahagia')->after('afirmasi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_profiles', function (Blueprint $table) {
            if (Schema::hasColumn('school_profiles', 'attitude')) {
                $table->dropColumn(['motto', 'afirmasi', 'attitude']);
            }
        });

        Schema::table('sliders', function (Blueprint $table) {
            if (Schema::hasColumn('sliders', 'type')) {
                $table->dropColumn('type');
            }
        });

        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('achievements');
    }
};
