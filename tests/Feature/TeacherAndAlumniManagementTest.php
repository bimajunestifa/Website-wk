<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Major;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TeacherAndAlumniManagementTest extends TestCase
{
    protected function authenticateAdmin()
    {
        $admin = User::first() ?? User::factory()->create([
            'email' => 'admin@smkwikrama1garut.sch.id',
        ]);
        return $this->actingAs($admin);
    }

    public function test_admin_can_view_and_manage_teachers()
    {
        $this->authenticateAdmin();

        // 1. Index
        $response = $this->get(route('admin.teachers.index'));
        $response->assertStatus(200);
        $response->assertSee('Dewan Guru & Tenaga Pendidik');

        // 2. Create form
        $response = $this->get(route('admin.teachers.create'));
        $response->assertStatus(200);

        // 3. Store
        Storage::fake('public');
        $file = UploadedFile::fake()->image('guru_test.jpg');

        $response = $this->post(route('admin.teachers.store'), [
            'name' => 'Guru Peneliti Baru, M.Kom',
            'role' => 'Guru AI & Cloud Computing',
            'photo_file' => $file,
            'bio' => 'Pengajar teknologi generasi baru Wikrama',
            'order' => 99,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.teachers.index'));
        $this->assertDatabaseHas('teachers', [
            'name' => 'Guru Peneliti Baru, M.Kom',
            'role' => 'Guru AI & Cloud Computing',
            'is_active' => true,
        ]);

        $teacher = Teacher::where('name', 'Guru Peneliti Baru, M.Kom')->first();

        // 4. Toggle status
        $this->patch(route('admin.teachers.toggle', $teacher->id));
        $this->assertDatabaseHas('teachers', [
            'id' => $teacher->id,
            'is_active' => false,
        ]);

        // 5. Update
        $response = $this->put(route('admin.teachers.update', $teacher->id), [
            'name' => 'Guru Peneliti Senior, M.Kom',
            'role' => 'Kepala Riset AI',
            'is_active' => '1',
            'order' => 10,
        ]);
        $response->assertRedirect(route('admin.teachers.index'));
        $this->assertDatabaseHas('teachers', [
            'id' => $teacher->id,
            'name' => 'Guru Peneliti Senior, M.Kom',
            'role' => 'Kepala Riset AI',
            'is_active' => true,
        ]);

        // 6. Delete
        $response = $this->delete(route('admin.teachers.destroy', $teacher->id));
        $response->assertRedirect(route('admin.teachers.index'));
        $this->assertDatabaseMissing('teachers', [
            'id' => $teacher->id,
        ]);
    }

    public function test_admin_can_deactivate_and_activate_major()
    {
        $this->authenticateAdmin();

        $uid = uniqid();
        $name = 'Jurusan Uji ' . $uid;
        $major = Major::create([
            'name' => $name,
            'short_name' => 'UJI',
            'slug' => 'jurusan-uji-' . $uid,
            'description' => 'Jurusan yang akan ditutup / dinonaktifkan',
            'order' => 999,
            'is_active' => true,
        ]);

        try {
            // Check active on public majors page
            $res = $this->get(route('majors'));
            $res->assertSee($name);

            // Toggle to inactive
            $this->patch(route('admin.majors.toggle', $major->id));
            $this->assertDatabaseHas('majors', [
                'id' => $major->id,
                'is_active' => false,
            ]);

            // Now inactive major MUST NOT appear on public majors page
            $res = $this->get(route('majors'));
            $res->assertDontSee($name);
        } finally {
            $major->delete();
        }
    }

    public function test_resources_and_spmb_pages_render_teachers_and_alumni()
    {
        // Ensure test teacher & alumni exist
        $teacher = Teacher::firstOrCreate(
            ['name' => 'Kunedi, S.Si.'],
            [
                'role' => 'Kepala SMK Wikrama 1 Garut',
                'photo_url' => '/assets/images/dd0e5c11ab3b8a9eb83e87eb6f910855bd57af94-1.png',
                'order' => 1,
                'is_active' => true,
            ]
        );

        $alumni = \App\Models\Alumni::firstOrCreate(
            ['name' => "Ujang Amir Ma'rup"],
            [
                'quote' => 'Wikrama memberikan fondasi disiplin dan teknologi terbaik.',
                'graduation_year' => '2020',
                'major' => 'PPLG',
                'company' => 'PT Dermaga Rezeki Indonesia',
                'profession' => 'Owner',
                'photo_url' => '/assets/images/ujang.png',
                'is_active' => true,
            ]
        );

        $testimonial = Testimonial::firstOrCreate(
            ['name' => 'Akhmad Munito'],
            [
                'quote' => 'Maju Terus Wikrama, dengan sekolah di Wikrama saya dibekali ilmu yg sangat bermanfaat dan akhlakul karimah bisa langsung bisa bersaing ke dunia kerja di era modern ini',
                'graduation_year' => '2000',
                'major' => 'Administrasi Perkantoran (APK)',
                'company' => null,
                'photo_url' => null,
                'is_active' => true,
            ]
        );

        // 1. Resources page shows teacher and alumni
        $res = $this->get(route('resources'));
        $res->assertStatus(200);
        $res->assertSee('Tenaga Pengajar');
        $res->assertSee($teacher->name);
        $res->assertSee($alumni->name);
        $res->assertSee($alumni->company);

        // 2. SPMB page shows SPMB testimonials
        $spmbRes = $this->get(route('spmb'));
        $spmbRes->assertStatus(200);
        $spmbRes->assertSee('Testimoni');
        $spmbRes->assertSee($testimonial->name);
    }

    public function test_admin_can_manage_alumni()
    {
        $this->authenticateAdmin();

        // 1. Index
        $response = $this->get(route('admin.alumni.index'));
        $response->assertStatus(200);
        $response->assertSee('Data Alumni');

        // 2. Create form
        $response = $this->get(route('admin.alumni.create'));
        $response->assertStatus(200);

        // 3. Store
        Storage::fake('public');
        $file = UploadedFile::fake()->image('alumni_test.jpg');

        $response = $this->post(route('admin.alumni.store'), [
            'name' => 'Alumni Sukses Test',
            'company' => 'Google Indonesia',
            'profession' => 'Staff Software Engineer',
            'major' => 'Pengembangan Perangkat Lunak & Gim',
            'graduation_year' => '2023',
            'quote' => 'Wikrama luar biasa!',
            'photo_file' => $file,
            'order' => 99,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.alumni.index'));
        $this->assertDatabaseHas('alumnis', [
            'name' => 'Alumni Sukses Test',
            'company' => 'Google Indonesia',
            'is_active' => true,
        ]);

        $alm = \App\Models\Alumni::where('name', 'Alumni Sukses Test')->first();

        // 4. Toggle status
        $this->patch(route('admin.alumni.toggle', $alm->id));
        $this->assertDatabaseHas('alumnis', [
            'id' => $alm->id,
            'is_active' => false,
        ]);

        // 5. Update
        $response = $this->put(route('admin.alumni.update', $alm->id), [
            'name' => 'Alumni Sukses Senior Test',
            'company' => 'Google Global',
            'profession' => 'Principal Engineer',
            'is_active' => '1',
            'order' => 1,
        ]);
        $response->assertRedirect(route('admin.alumni.index'));
        $this->assertDatabaseHas('alumnis', [
            'id' => $alm->id,
            'name' => 'Alumni Sukses Senior Test',
            'company' => 'Google Global',
            'is_active' => true,
        ]);

        // 6. Delete
        $response = $this->delete(route('admin.alumni.destroy', $alm->id));
        $response->assertRedirect(route('admin.alumni.index'));
        $this->assertDatabaseMissing('alumnis', [
            'id' => $alm->id,
        ]);
    }

    public function test_admin_hubs_contain_teachers_alumni_and_majors_controls()
    {
        $this->authenticateAdmin();

        $res = $this->get(route('admin.web_smk'));
        $res->assertStatus(200);
        $res->assertSee(route('admin.teachers.index'));
        $res->assertSee(route('admin.alumni.index'));
        $res->assertSee(route('admin.majors.index'));

        $spmbRes = $this->get(route('admin.spmb_manager'));
        $spmbRes->assertStatus(200);
        $spmbRes->assertSee(route('admin.testimonials.index'));
    }
}
