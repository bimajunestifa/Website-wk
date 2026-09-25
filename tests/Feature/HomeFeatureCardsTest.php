<?php

namespace Tests\Feature;

use App\Models\HomeFeatureCard;
use App\Models\SchoolProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeFeatureCardsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (HomeFeatureCard::count() === 0) {
            $this->seed(\Database\Seeders\HomeFeatureCardSeeder::class);
        }
    }

    public function test_homepage_renders_dynamic_feature_cards_and_section_titles(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Check if character cards are present
        $response->assertSee('Lulusan');
        $response->assertSee('Pengelolaan');
        $response->assertSee('Guru');
        $response->assertSee('Budaya');

        // Check if culture cards are present
        $response->assertSee('Suasana');
        $response->assertSee('LMS');
        $response->assertSee('Kurikulum');
        $response->assertSee('Teaching Factory');

        // Check if learning cards are present
        $response->assertSee('Program Matrikulasi');
        $response->assertSee('Moving Class');
        $response->assertSee('Sistem Belajar Bertiga');
    }

    public function test_spmb_page_has_no_admin_cms_login_link_and_no_avatar_photos(): void
    {
        $response = $this->get('/spmb');
        $response->assertStatus(200);

        $response->assertDontSee('Admin CMS');
        $response->assertDontSee('/admin/login');
        // Ensure testimonial avatar circle container is removed
        $response->assertDontSee('w-12 h-12 rounded-full object-cover ring-2 ring-blue-100');
    }

    public function test_admin_can_view_and_manage_home_features(): void
    {
        $admin = User::first() ?? User::factory()->create([
            'email' => 'admin@wikrama.sch.id',
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($admin)->get(route('admin.home-features.index'));
        $response->assertStatus(200);
        $response->assertSee('Pengelolaan 12 Kartu Karakter, Budaya &amp; Pembelajar Beranda', false);
        $response->assertSee('Lulusan');
        $response->assertSee('Teaching Factory');
        $response->assertSee('Program Matrikulasi');
        $response->assertSee('Moving Class');
        $response->assertSee('Sistem Belajar Bertiga');
    }

    public function test_admin_can_update_section_headers_and_buttons(): void
    {
        $admin = User::first() ?? User::factory()->create([
            'email' => 'admin@wikrama.sch.id',
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($admin)->post(route('admin.home-features.headers'), [
            'character_section_title' => 'Pendidikan Karakter Juara',
            'character_section_btn_text' => 'Daftar Sekarang Yuk',
            'character_section_btn_url' => '/spmb',
            'culture_section_title' => 'Budaya Sekolah Unggulan',
            'culture_section_btn_text' => 'Pelajari Selengkapnya',
            'culture_section_btn_url' => '/spmb',
            'learning_section_subtitle' => 'SMK WIKRAMA 1 GARUT TOP',
            'learning_section_title' => 'Tiada masyarakat pembelajar tanpa kesungguhan',
        ]);

        $response->assertRedirect(route('admin.home-features.index'));

        $this->assertDatabaseHas('school_profiles', [
            'character_section_title' => 'Pendidikan Karakter Juara',
            'character_section_btn_text' => 'Daftar Sekarang Yuk',
            'culture_section_title' => 'Budaya Sekolah Unggulan',
            'culture_section_btn_text' => 'Pelajari Selengkapnya',
            'learning_section_subtitle' => 'SMK WIKRAMA 1 GARUT TOP',
            'learning_section_title' => 'Tiada masyarakat pembelajar tanpa kesungguhan',
        ]);

        // Reset to original values
        SchoolProfile::first()->update([
            'character_section_title' => 'Pendidikan Berkarakter, Berakhlak Mulia, dan Berdaya Saing Global',
            'character_section_btn_text' => 'Daftar Sekarang',
            'character_section_btn_url' => '/spmb',
            'culture_section_title' => 'Membangun Karakter Unggul Melalui Budaya Sekolah yang Kuat',
            'culture_section_btn_text' => 'Daftar Sekarang',
            'culture_section_btn_url' => '/spmb',
            'learning_section_subtitle' => 'SMK WIKRAMA 1 GARUT',
            'learning_section_title' => 'Tiada masyarakat pembelajar sekolah, tanpa pemimpin perubaban sekolah, dan tanpa kesungguhan warga sekolah',
        ]);
    }

    public function test_admin_can_update_card_and_toggle_status(): void
    {
        $admin = User::first() ?? User::factory()->create([
            'email' => 'admin@wikrama.sch.id',
            'password' => bcrypt('password'),
        ]);

        $card = HomeFeatureCard::first();

        // Update card
        $response = $this->actingAs($admin)->put(route('admin.home-features.update', $card->id), [
            'title' => 'Lulusan Unggulan & Berkarakter',
            'description' => 'Lulusan kami langsung bekerja di industri ternama.',
            'link_url' => '/sumber-daya',
            'order' => 1,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.home-features.index'));

        $this->assertDatabaseHas('home_feature_cards', [
            'id' => $card->id,
            'title' => 'Lulusan Unggulan & Berkarakter',
            'description' => 'Lulusan kami langsung bekerja di industri ternama.',
        ]);

        // Toggle status
        $this->actingAs($admin)->patch(route('admin.home-features.toggle', $card->id));
        $this->assertFalse((bool) $card->fresh()->is_active);

        $this->actingAs($admin)->patch(route('admin.home-features.toggle', $card->id));
        $this->assertTrue((bool) $card->fresh()->is_active);
    }

    public function test_admin_can_update_school_logo(): void
    {
        $admin = User::first() ?? User::factory()->create([
            'email' => 'admin@wikrama.sch.id',
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($admin)->post(route('admin.profile.update'), [
            'school_name' => 'SMK Wikrama 1 Garut Unggul',
            'logo' => '/assets/images/wikrama-logo-custom.png',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('school_profiles', [
            'logo' => '/assets/images/wikrama-logo-custom.png',
        ]);

        // Verify admin dashboard renders with custom logo
        $dashResponse = $this->actingAs($admin)->get(route('admin.dashboard'));
        $dashResponse->assertSee('/assets/images/wikrama-logo-custom.png');

        // Always reset back to default logo so local dev browser is never left with broken image
        SchoolProfile::first()->update([
            'school_name' => 'SMK Wikrama 1 Garut',
            'logo' => '/assets/images/wikrama-logo-1.png',
        ]);
    }
}

