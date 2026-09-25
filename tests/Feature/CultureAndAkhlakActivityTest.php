<?php

namespace Tests\Feature;

use App\Models\SchoolCulture;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CultureAndAkhlakActivityTest extends TestCase
{
    public function test_culture_page_displays_akhlak_activities(): void
    {
        $response = $this->get('/budaya');
        $response->assertStatus(200);
        $response->assertSee('Kegiatan');
        $response->assertSee('Pengembangan Akhlak Mulia');
        $response->assertSee('MENGHAFAL AL QUR’AN');
        $response->assertSee('TAHFIDZ');
    }

    public function test_admin_can_update_akhlak_activity_and_upload_image(): void
    {
        Storage::fake('public');

        $admin = User::first();
        $this->actingAs($admin);

        $activity = SchoolCulture::where('category', 'akhlak_activity')->first();
        $this->assertNotNull($activity);

        $file = UploadedFile::fake()->image('tahfidz_santri.jpg', 600, 400);

        $response = $this->put("/admin/cultures/{$activity->id}", [
            'category' => 'akhlak_activity',
            'title' => 'Menghafal Al Qur’an Unggulan',
            'subtitle' => 'Tahfidz 30 Juz',
            'description' => 'Target hafalan mutqin dan bersanad.',
            'image_file' => $file,
            'order' => 1,
        ]);

        $response->assertRedirect('/admin/cultures');

        $activity->refresh();
        $this->assertEquals('Menghafal Al Qur’an Unggulan', $activity->title);
        $this->assertEquals('Tahfidz 30 Juz', $activity->subtitle);
        $this->assertNotNull($activity->image_url);

        // Check public page displays updated title
        $publicResponse = $this->get('/budaya');
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('MENGHAFAL AL QUR’AN UNGGULAN');
        $publicResponse->assertSee('TAHFIDZ 30 JUZ');
    }
}

