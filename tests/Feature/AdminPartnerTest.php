<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Partner;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AdminPartnerTest extends TestCase
{
    protected function authenticateAdmin()
    {
        $admin = User::first() ?? User::factory()->create([
            'email' => 'admin@smkwikrama1garut.sch.id',
        ]);
        return $this->actingAs($admin);
    }

    public function test_admin_can_view_partners_index()
    {
        $this->authenticateAdmin();
        $response = $this->get(route('admin.partners.index'));
        $response->assertStatus(200);
    }

    public function test_admin_can_create_partner_with_name_and_website()
    {
        $this->authenticateAdmin();

        $response = $this->post(route('admin.partners.store'), [
            'name' => 'Insitu Hotel',
            'website' => 'https://hotelinsitugarut.com/',
        ]);

        $response->assertRedirect(route('admin.partners.index'));
        $this->assertDatabaseHas('partners', [
            'name' => 'Insitu Hotel',
            'website' => 'https://hotelinsitugarut.com/',
        ]);
    }

    public function test_admin_can_upload_partner_logo()
    {
        Storage::fake('public');
        $this->authenticateAdmin();

        $file = UploadedFile::fake()->image('insitu_logo.png', 200, 100);

        $response = $this->post(route('admin.partners.store'), [
            'name' => 'PT Mitra Sejahtera',
            'website' => 'https://mitrasejahtera.com',
            'logo_file' => $file,
        ]);

        $response->assertRedirect(route('admin.partners.index'));
        $partner = Partner::where('name', 'PT Mitra Sejahtera')->first();
        $this->assertNotNull($partner);
        $this->assertNotNull($partner->logo_url);
    }

    public function test_admin_can_update_partner()
    {
        $this->authenticateAdmin();

        $partner = Partner::create([
            'name' => 'Old Partner',
            'category' => 'Mitra Industri',
            'website' => 'https://old.com',
        ]);

        $response = $this->put(route('admin.partners.update', $partner->id), [
            'name' => 'Updated Partner',
            'website' => 'https://updated.com',
        ]);

        $response->assertRedirect(route('admin.partners.index'));
        $this->assertDatabaseHas('partners', [
            'id' => $partner->id,
            'name' => 'Updated Partner',
            'website' => 'https://updated.com',
        ]);
    }
}

