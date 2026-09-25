@extends('layouts.wikrama', [
    'bodyClass' => 'wp-singular post-template-default single single-post single-format-standard wp-embed-responsive wp-theme-vault ally-default uicore-animate-fade ui-a-dsmm-slide uicore-blog elementor-default elementor-kit-8',
    'solidNavbar' => true
])

@section('title', $news->title . ' – SMK Wikrama 1 Garut')

@push('styles')
<style>
    /* Sembunyikan floating black sticky bar tema lama agar tampilan bersih */
    .uicore-sticky-tb, 
    .ui-reading-progress, 
    .ui-smart-sticky-header, 
    .uicore-post-sticky {
        display: none !important;
    }

    .article-wrapper {
        max-width: 860px;
        margin: 0 auto;
        padding: 40px 20px 80px 20px;
    }

    .article-breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        font-size: 0.85rem;
        color: #64748B;
        margin-bottom: 20px;
    }
    .article-breadcrumb a {
        color: #1F3984;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }
    .article-breadcrumb a:hover {
        color: #F59E0B;
    }

    .article-title {
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        font-size: clamp(1.85rem, 3.5vw, 2.65rem);
        font-weight: 800;
        color: #0F172A;
        line-height: 1.28;
        letter-spacing: -0.02em;
        margin: 0 0 20px 0;
    }

    .article-meta-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        padding-bottom: 24px;
        border-bottom: 1px solid #E2E8F0;
        margin-bottom: 28px;
    }
    .article-meta-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        color: #475569;
        font-size: 0.8125rem;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 9999px;
    }
    .article-meta-pill i {
        font-size: 0.95rem;
    }
    .article-meta-category {
        background: #EFF6FF;
        border-color: #BFDBFE;
        color: #1D4ED8;
        font-weight: 700;
    }

    .article-featured-box {
        margin: 0 0 36px 0;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.15);
        background: #F1F5F9;
        border: 1px solid #E2E8F0;
    }
    .article-featured-box img {
        width: 100%;
        max-height: 520px;
        object-fit: cover;
        display: block;
    }

    /* Tipografi Artikel Elegan, Rapi & Estetik */
    .article-body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        font-size: 1.1rem;
        line-height: 1.9;
        color: #334155;
        letter-spacing: -0.01em;
    }
    .article-body p {
        margin: 0 0 1.5rem 0;
        text-align: justify;
        text-justify: inter-word;
    }
    .article-body p:first-of-type {
        font-size: 1.15rem;
        line-height: 1.85;
        color: #1E293B;
    }
    .article-body h2 {
        font-family: 'Poppins', sans-serif;
        font-size: 1.6rem;
        font-weight: 800;
        color: #1E3A8A;
        margin: 2.5rem 0 1rem 0;
        line-height: 1.35;
        letter-spacing: -0.015em;
    }
    .article-body h3 {
        font-family: 'Poppins', sans-serif;
        font-size: 1.325rem;
        font-weight: 700;
        color: #1E3A8A;
        margin: 2.2rem 0 0.85rem 0;
        line-height: 1.4;
    }
    .article-body h4 {
        font-family: 'Poppins', sans-serif;
        font-size: 1.15rem;
        font-weight: 700;
        color: #0F172A;
        margin: 1.75rem 0 0.65rem 0;
    }
    .article-body strong, .article-body b {
        font-weight: 700;
        color: #0F172A;
    }
    .article-body em, .article-body i {
        font-style: italic;
        color: #1E293B;
    }
    .article-body ul {
        margin: 1rem 0 1.75rem 0;
        padding-left: 0;
        list-style: none;
    }
    .article-body ul li {
        position: relative;
        padding-left: 1.85rem;
        margin-bottom: 0.65rem;
        line-height: 1.75;
        text-align: justify;
    }
    .article-body ul li::before {
        content: "";
        position: absolute;
        left: 0.35rem;
        top: 0.65rem;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #1F3984;
        box-shadow: 0 0 0 3px rgba(31, 57, 132, 0.2);
    }
    .article-body ol {
        margin: 1rem 0 1.75rem 0;
        padding-left: 1.5rem;
    }
    .article-body ol li {
        margin-bottom: 0.65rem;
        line-height: 1.75;
        padding-left: 0.35rem;
    }
    .article-body blockquote {
        margin: 2rem 0;
        padding: 1.25rem 1.75rem;
        background: linear-gradient(135deg, #F0F4FF 0%, #F8FAFC 100%);
        border-left: 4px solid #1F3984;
        border-radius: 0 16px 16px 0;
        font-style: italic;
        color: #1E293B;
        font-size: 1.05rem;
        line-height: 1.75;
    }
    .article-body blockquote p {
        margin: 0;
    }
    .article-cta-box {
        margin: 2.5rem 0 1.5rem 0;
        padding: 1.5rem 1.75rem;
        background: linear-gradient(135deg, #EFF6FF 0%, #EEF2F6 100%);
        border: 1px solid #BFDBFE;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(37, 99, 235, 0.05);
    }
    .article-cta-box h4 {
        margin: 0 0 10px 0;
        color: #1E3A8A;
        font-weight: 800;
        font-size: 1.1rem;
    }
    .article-cta-box p {
        margin: 0 0 6px 0;
        font-size: 0.95rem;
        color: #334155;
    }

    /* Tombol & Share */
    .article-share-bar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 24px 0;
        margin-top: 40px;
        border-top: 1px solid #E2E8F0;
        border-bottom: 1px solid #E2E8F0;
    }
    .share-pill-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 0.8125rem;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.25s ease;
    }
    .share-wa {
        background: #DCFCE7;
        color: #15803D;
    }
    .share-wa:hover {
        background: #22C55E;
        color: #ffffff;
    }
    .share-copy {
        background: #F1F5F9;
        color: #475569;
        cursor: pointer;
        border: none;
    }
    .share-copy:hover {
        background: #E2E8F0;
        color: #0F172A;
    }

    /* Berita Terkait Grid */
    .related-section {
        margin-top: 60px;
        padding-top: 40px;
        border-top: 2px dashed #E2E8F0;
    }
    .related-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.35rem;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 20px;
    }
    .related-card {
        background: #ffffff;
        border: 1px solid #E2E8F0;
        border-radius: 18px;
        overflow: hidden;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        flex-col;
    }
    .related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px -5px rgba(0, 0, 0, 0.08);
        border-color: #BFDBFE;
    }
    .related-card img {
        width: 100%;
        height: 140px;
        object-fit: cover;
    }
    .related-card-content {
        padding: 14px 16px;
    }
    .related-card-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #1E293B;
        line-height: 1.4;
        margin: 0 0 8px 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .related-card-date {
        font-size: 0.75rem;
        color: #94A3B8;
        display: flex;
        align-items: center;
        gap: 4px;
    }
</style>
@endpush

@section('content')
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article class="article-wrapper">
            
            <!-- Article Header -->
            <header class="uicore-single-header">
                <!-- Breadcrumbs -->
                <nav class="article-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Beranda</a>
                    <i class="ri-arrow-right-s-line"></i>
                    <a href="{{ route('news') }}">Berita</a>
                    @if($news->category)
                        <i class="ri-arrow-right-s-line"></i>
                        <a href="{{ route('news', ['kategori' => $news->category]) }}">{{ $news->category }}</a>
                    @endif
                    <i class="ri-arrow-right-s-line"></i>
                    <span style="color: #94A3B8;">Artikel</span>
                </nav>

                <!-- Judul Artikel Utama -->
                <h1 class="article-title">{{ $news->title }}</h1>

                <!-- Meta Data Row -->
                <div class="article-meta-row">
                    <span class="article-meta-pill article-meta-category">
                        <i class="ri-price-tag-3-line"></i> {{ $news->category ?? 'Berita' }}
                    </span>
                    <span class="article-meta-pill">
                        <i class="ri-user-3-line text-blue-600"></i> {{ $news->author ?? 'Humas Wikrama' }}
                    </span>
                    <span class="article-meta-pill">
                        <i class="ri-calendar-line text-amber-600"></i> 
                        {{ $news->published_at ? \Carbon\Carbon::parse($news->published_at)->isoFormat('dddd, D MMMM Y') : $news->created_at->isoFormat('dddd, D MMMM Y') }}
                    </span>
                    <span class="article-meta-pill">
                        <i class="ri-time-line text-emerald-600"></i> 2 menit baca
                    </span>
                </div>
            </header>

            <!-- Featured Image Cover -->
            @if($news->image_url)
                <div class="article-featured-box">
                    <img alt="{{ $news->title }}" src="{{ asset($news->image_url) }}" loading="lazy" />
                </div>
            @endif

            <!-- Isi Konten Artikel (Rapi, Bersih & Estetik) -->
            <div class="article-body">
                {!! $news->formatted_content !!}
            </div>

            <!-- Share & Action Bar -->
            <div class="article-share-bar">
                <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                    <span style="font-size: 0.85rem; font-weight: 700; color: #475569;">Bagikan:</span>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($news->title . ' - ' . url()->current()) }}" target="_blank" class="share-pill-btn share-wa">
                        <i class="ri-whatsapp-line text-base"></i> WhatsApp
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-pill-btn" style="background: #EFF6FF; color: #1E40AF;">
                        <i class="ri-facebook-circle-line text-base"></i> Facebook
                    </a>
                    <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan artikel berhasil disalin!');" class="share-pill-btn share-copy">
                        <i class="ri-links-line text-base"></i> Salin Tautan
                    </button>
                </div>

                <div style="display: flex; gap: 10px; align-items: center;">
                    <a href="{{ route('news') }}" style="display: inline-flex; align-items: center; gap: 6px; font-weight: 700; color: #1F3984; padding: 8px 18px; border-radius: 50px; background: #EFF3FF; text-decoration: none; font-size: 0.85rem; transition: background 0.2s;">
                        <i class="ri-arrow-left-line"></i> Semua Berita
                    </a>
                    <a href="{{ route('spmb') }}" style="display: inline-flex; align-items: center; gap: 6px; font-weight: 700; color: #ffffff; background: #1F3984; padding: 8px 20px; border-radius: 50px; text-decoration: none; font-size: 0.85rem; transition: background 0.2s;">
                        Daftar PPDB <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>

            <!-- Berita Rekomendasi Terkait -->
            @if(isset($recentNews) && $recentNews->isNotEmpty())
                <section class="related-section">
                    <h3 class="related-title">
                        <i class="ri-newspaper-line text-wikrama-blue"></i> Berita Terbaru Lainnya
                    </h3>
                    <div class="related-grid">
                        @foreach($recentNews->take(3) as $r)
                            <a href="{{ route('news.detail', $r->slug ?: $r->id) }}" class="related-card">
                                <img src="{{ asset($r->image_url ?: '/assets/images/IMG_5026-1-819x1024.png') }}" alt="{{ $r->title }}">
                                <div class="related-card-content">
                                    <div class="related-card-date">
                                        <i class="ri-calendar-line"></i>
                                        {{ $r->published_at ? \Carbon\Carbon::parse($r->published_at)->format('d M Y') : $r->created_at->format('d M Y') }}
                                    </div>
                                    <h4 class="related-card-title">{{ $r->title }}</h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

        </article>
    </main>
</div>
@endsection
