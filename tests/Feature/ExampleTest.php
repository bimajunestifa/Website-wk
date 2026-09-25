<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Slider;
use App\Models\Achievement;
use App\Models\Gallery;
use App\Models\Testimonial;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    public function test_all_public_pages_return_successful_response(): void
    {
        $urls = [
            '/',
            '/spmb',
            '/ppdb',
            '/kompetensi-keahlian',
            '/kompetensi-keahlian/pplg',
            '/budaya',
            '/sumber-daya',
            '/tentang-kami',
            '/berita',
            '/berita/smk-wikrama-1-garut-terima-kunjungan-studi-tiru-dari-min-17-kepulauan-seribu-jakarta',
            '/admin/login'
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }

    public function test_unauthenticated_user_is_redirected_to_admin_login(): void
    {
        $response = $this->get('/admin/achievements');
        $response->assertRedirect('/admin/login');

        $responseLogin = $this->get('/login');
        $responseLogin->assertRedirect('/admin/login');
    }

    public function test_admin_dashboard_and_slider_management(): void
    {
        $admin = User::first();
        $this->actingAs($admin);

        // Test dashboard
        $dashResponse = $this->get('/admin');
        $dashResponse->assertStatus(200);
        $dashResponse->assertSee('Panel Pengelolaan SMK Wikrama 1 Garut');

        // Test 2 Master Hub Pages: Web SMK & SPMB Manager
        $webSmkResponse = $this->get('/admin/web-smk');
        $webSmkResponse->assertStatus(200);
        $webSmkResponse->assertSee('Pusat Edit Web Utama SMK');

        $spmbManagerResponse = $this->get('/admin/spmb-manager');
        $spmbManagerResponse->assertStatus(200);
        $spmbManagerResponse->assertSee('Pusat Edit Landing SPMB');

        // Test slider index
        $sliderIndex = $this->get('/admin/sliders');
        $sliderIndex->assertStatus(200);

        // Test editing a slider
        $slider = Slider::first();
        $this->assertNotNull($slider);

        $updateResponse = $this->put("/admin/sliders/{$slider->id}", [
            'type' => 'home',
            'title' => 'PPDB Wikrama Garut 2026/2027 - Diperbarui',
            'subtitle' => 'Pendaftaran online SMK Wikrama 1 Garut gelombang baru',
            'image_url' => $slider->image_url,
            'button_text' => 'Daftar Sekarang',
            'button_link' => '/spmb',
            'order' => 1,
            'is_active' => 1,
        ]);

        $updateResponse->assertRedirect(route('admin.sliders.index'));
        $slider->refresh();
        $this->assertEquals('PPDB Wikrama Garut 2026/2027 - Diperbarui', $slider->title);
    }

    public function test_admin_can_manage_achievements_gallery_and_testimonials(): void
    {
        $admin = User::first();
        $this->actingAs($admin);

        // 1. Achievements
        $achIndex = $this->get('/admin/achievements');
        $achIndex->assertStatus(200);

        $newAch = Achievement::create([
            'title' => 'Juara 1 Lomba Web Design Vokasi Jawa Barat',
            'slug' => 'test-slug-' . uniqid(),
            'category' => 'Tingkat Provinsi',
            'recipient_name' => 'Siswa PPLG Wikrama',
            'rank' => 'Juara 1',
            'event_year' => '2026',
            'description' => 'Meraih medali emas kategori Web Development.',
            'image_url' => '/assets/images/spmb/logo.png',
            'is_featured' => true,
            'order' => 1,
        ]);

        $achEdit = $this->get("/admin/achievements/{$newAch->id}/edit");
        $achEdit->assertStatus(200);
        $newAch->delete();

        // 2. Gallery
        $galIndex = $this->get('/admin/gallery');
        $galIndex->assertStatus(200);

        // 3. Testimonials
        $testiIndex = $this->get('/admin/testimonials');
        $testiIndex->assertStatus(200);

        // 4. Majors, Facilities, Cultures, Reports, Partners, News, Profile
        $this->get('/admin/majors')->assertStatus(200);
        $this->get('/admin/facilities')->assertStatus(200);
        $this->get('/admin/cultures')->assertStatus(200);
        $this->get('/admin/reports')->assertStatus(200);
        $this->get('/admin/partners')->assertStatus(200);
        $this->get('/admin/news')->assertStatus(200);
        $this->get('/admin/profile')->assertStatus(200);
    }

    public function test_contact_form_and_spmb_submission(): void
    {
        // 1. Regular contact form
        $response = $this->post('/kontak/kirim-pesan', [
            'name' => 'Ahmad Fauzi',
            'email' => 'ahmad@example.com',
            'phone' => '081234567890',
            'subject' => 'Informasi PPDB 2026/2027',
            'message' => 'Mohon info syarat pendaftaran untuk jurusan PPLG.',
        ]);
        $response->assertSessionHas('success');

        // 2. SPMB message submission
        $spmbResponse = $this->post('/spmb/submitMessage', [
            'name' => 'Siti Nurhaliza',
            'no_wa' => '+628987654321',
            'email' => 'siti@example.com',
            'message' => 'Saya ingin mendaftar jurusan Pemasaran Bisnis Digital.',
        ]);
        $spmbResponse->assertSessionHas('success');

        $admin = User::first();
        $this->actingAs($admin);

        $messagesResponse = $this->get('/admin/messages');
        $messagesResponse->assertStatus(200);
        $messagesResponse->assertSee('Ahmad Fauzi');
        $messagesResponse->assertSee('Siti Nurhaliza');
    }
}
