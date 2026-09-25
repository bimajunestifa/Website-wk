@extends('layouts.wikrama', [
    'bodyClass' => 'wp-singular post-template-default single single-post wp-embed-responsive wp-theme-vault ally-default uicore-animate-fade ui-a-dsmm-slide uicore-sticky-tb uicore-narow elementor-default elementor-kit-8',
    'solidNavbar' => true
])

@section('title', $major->name . ' – SMK Wikrama 1 Garut')

@section('content')
<div id="primary" class="content-area">
    <main id="main" class="site-main uicore-section uicore-box uicore">
        <div class="uicore uicore-container uicore-content-wrapper uicore-blog-animation">
            <div class="uicore-type-post uicore-post-content uicore-animate">
                <article class="blog-fonts post-{{ $major->id }}">
                    
                    <!-- Major Header -->
                    <header class="uicore-single-header">
                        <div class="uicore-animate ui-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                            <span itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                <a href="{{ route('home') }}" itemprop="item"><span itemprop="name">Home</span></a>
                                <meta content="1" itemprop="position"/>
                            </span>
                            <i class="uicore-separator uicore-i-arrow"></i>
                            <span itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                <a href="{{ route('majors') }}" itemprop="item"><span itemprop="name">Kompetensi Keahlian</span></a>
                                <meta content="2" itemprop="position"/>
                            </span>
                            <i class="uicore-separator uicore-i-arrow"></i>
                            <span itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                <span><span itemprop="name">{{ $major->name }}</span><meta content="3" itemprop="position"/></span>
                            </span>
                        </div>

                        <h1 class="entry-title uicore-animate">{{ $major->name }}</h1>

                        <div class="uicore-entry-meta uicore-animate">
                            <span class="ui-blog-author" style="font-weight: 600; color: #1F3984;"><i class="ri-award-line" style="vertical-align: -1px; margin-right: 4px;"></i> Program Keahlian {{ $major->short_name }}</span>
                            <span class="uicore-meta-separator">•</span>
                            <span class="ui-blog-date">SMK Wikrama 1 Garut</span>
                        </div>

                        @if($major->image_url)
                            <figure class="uicore-post-media" style="margin: 25px 0 35px 0; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 30px rgba(0,0,0,0.1);">
                                <img alt="{{ $major->name }}" src="{{ asset($major->image_url) }}" style="width: 100%; max-height: 520px; object-fit: cover; display: block; border-radius: 16px;"/>
                            </figure>
                        @endif
                    </header>

                    <!-- Major Body Content -->
                    <div class="entry-content" style="font-size: 16px; line-height: 1.85; color: #2D3748;">
                        <h3 style="color: #1F3984; font-family: 'Poppins', sans-serif; font-weight: 700; margin-bottom: 15px;">
                            Tentang Program Keahlian {{ $major->name }}
                        </h3>
                        
                        @foreach(preg_split('/\r\n\s*\r\n|\n\s*\n/', $major->description) as $paragraph)
                            @if(trim($paragraph))
                                <p style="margin-bottom: 1.5em; text-align: justify;">{{ trim($paragraph) }}</p>
                            @endif
                        @endforeach

                        @if($major->career_prospects)
                            <div style="background-color: #F8FAFC; border-left: 4px solid #1F3984; padding: 20px 24px; border-radius: 0 12px 12px 0; margin: 30px 0;">
                                <h4 style="color: #1F3984; font-size: 16px; font-weight: 700; margin-bottom: 8px; font-family: 'Poppins', sans-serif;">
                                    <i class="ri-briefcase-4-line" style="color: #FF7A00; margin-right: 6px;"></i> Prospek Karir Lulusan:
                                </h4>
                                <p style="margin: 0; color: #4A5568; line-height: 1.6;">{{ $major->career_prospects }}</p>
                            </div>
                        @endif

                        <div style="margin-top: 40px; padding-top: 25px; border-top: 1px solid #E2E8F0; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 16px;">
                            <a href="{{ route('majors') }}" style="color: #1F3984; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                                <i class="ri-arrow-left-line"></i> Kembali ke Kompetensi Keahlian
                            </a>
                            <a href="{{ route('spmb') }}" class="uicore-btn" style="background-color: #1F3984; color: #fff; padding: 12px 28px; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-block;">
                                <span>Daftar di Jurusan Ini &rarr;</span>
                            </a>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </main>
</div>
@endsection
