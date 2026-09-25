<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\EducationReport;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EducationReportAndMarqueeTest extends TestCase
{
    use DatabaseTransactions;

    public function test_homepage_has_marquee_css_and_filled_progress_bars()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Assert Marquee animation CSS is present without blocking transforms
        $response->assertSee('animation: uicoreMarqueeScroll 35s linear infinite !important;', false);
        $response->assertSee('@keyframes uicoreMarqueeScroll', false);

        // Assert all 5 progress bars have percentage styling
        $response->assertSee('style="width: 98%;"', false);
        $response->assertSee('style="width: 91%;"', false);
        $response->assertSee('style="width: 95%;"', false);
        $response->assertSee('style="width: 90%;"', false);
        $response->assertSee('style="width: 96%;"', false);

        // Assert background color fill
        $response->assertSee('background-color: #0190FE80 !important;', false);
    }

    public function test_admin_can_update_education_reports()
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        $report = EducationReport::first();
        $this->assertNotNull($report);

        $response = $this->actingAs($user)->put(route('admin.reports.update', $report->id), [
            'indicator_name' => 'Kemampuan Literasi Wikrama Teruji',
            'score' => 99.5,
            'status' => 'Sangat Baik',
            'year' => '2025/2026',
            'notes' => 'Catatan revisi admin'
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('education_reports', [
            'id' => $report->id,
            'indicator_name' => 'Kemampuan Literasi Wikrama Teruji',
            'score' => 99.5,
            'percentage' => 100,
        ]);
    }
}

