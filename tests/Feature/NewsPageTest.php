<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsPageTest extends TestCase
{
    public function test_news_page_displays_articles_and_filters(): void
    {
        $response = $this->get('/berita');
        $response->assertStatus(200);
        $response->assertSee('Berita');
        $response->assertSee('ui-post-filter');
        $response->assertSee('uicore-blog-grid');
    }

    public function test_homepage_displays_dynamic_latest_news(): void
    {
        $latest = News::where('is_published', true)->orderBy('published_at', 'desc')->first();
        if ($latest) {
            $response = $this->get('/');
            $response->assertStatus(200);
            $response->assertSee($latest->title);
        }
    }

    public function test_news_filter_by_category(): void
    {
        $response = $this->get('/berita?kategori=Berita');
        $response->assertStatus(200);
        $response->assertSee('Berita');
    }

    public function test_news_detail_page_renders(): void
    {
        $news = News::first();
        if ($news) {
            $response = $this->get('/berita/' . $news->slug);
            $response->assertStatus(200);
            $response->assertSee($news->title);
            $response->assertSee('uicore-single-header');
        }
    }

    public function test_admin_can_manage_news(): void
    {
        $user = User::first() ?? User::factory()->create();

        // Check admin news listing
        $response = $this->actingAs($user)->get('/admin/news');
        $response->assertStatus(200);

        // Create new article
        $createResponse = $this->actingAs($user)->post('/admin/news', [
            'title' => 'Test Artikel Baru Wikrama',
            'excerpt' => 'Ringkasan artikel uji coba untuk verifikasi admin.',
            'content' => 'Isi lengkap artikel berita uji coba SMK Wikrama 1 Garut.',
            'category' => 'Berita',
            'author' => 'Admin Wikrama',
            'is_published' => true,
        ]);
        $createResponse->assertRedirect();

        $created = News::where('title', 'Test Artikel Baru Wikrama')->first();
        $this->assertNotNull($created);

        // Edit article
        $updateResponse = $this->actingAs($user)->put('/admin/news/' . $created->id, [
            'title' => 'Test Artikel Baru Wikrama Updated',
            'excerpt' => 'Ringkasan artikel uji coba terupdate.',
            'content' => 'Isi artikel berita uji coba yang telah diperbarui.',
            'category' => 'Berita',
            'author' => 'Admin Wikrama',
            'is_published' => true,
        ]);
        $updateResponse->assertRedirect();
        $this->assertDatabaseHas('news', ['title' => 'Test Artikel Baru Wikrama Updated']);

        // Delete article
        $deleteResponse = $this->actingAs($user)->delete('/admin/news/' . $created->id);
        $deleteResponse->assertRedirect();
        $this->assertDatabaseMissing('news', ['title' => 'Test Artikel Baru Wikrama Updated']);
    }
}

