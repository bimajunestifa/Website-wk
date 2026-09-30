@extends('layouts.wikrama')

@section('title', 'Sumber Daya – SMK Wikrama 1 Garut')

@section('body_class', 'wp-singular page-template-default page page-id-24 wp-embed-responsive wp-theme-vault ally-default uicore-animate-fade ui-a-dsmm-slide uicore-sticky-tb elementor-default elementor-kit-8 elementor-page elementor-page-24')

@push('styles')
    <link rel='stylesheet' id='widget-heading-css' href='{{ asset('assets/wikrama/css/widget-heading.min.css') }}' media='all' />
    <link rel='stylesheet' id='widget-divider-css' href='{{ asset('assets/wikrama/css/widget-divider.min.css') }}' media='all' />
    <link rel='stylesheet' id='widget-image-css' href='{{ asset('assets/wikrama/css/widget-image.min.css') }}' media='all' />
    <link rel='stylesheet' id='e-sticky-css' href='{{ asset('assets/wikrama/css/sticky.min.css') }}' media='all' />
    <link rel='stylesheet' id='swiper-css' href='{{ asset('assets/wikrama/css/swiper.min.css') }}' media='all' />
    <link rel='stylesheet' id='e-swiper-css' href='{{ asset('assets/wikrama/css/e-swiper.min.css') }}' media='all' />
    <link rel='stylesheet' id='widget-nested-carousel-css' href='{{ asset('assets/wikrama/css/widget-nested-carousel.min.css') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-24-css' href='{{ asset('assets/wikrama/css/post-24.css') }}' media='all' />
    <style type='text/css' class='wpcb2-inline-style'>
    .card-overlay .card-img{top:0;left:0;right:0;bottom:0}.card-overlay .card-img img{transition:all 1s cubic-bezier(0.34,.615,.4,.985)}.card-overlay .card-img::before{background:linear-gradient(180deg,rgba(0,0,0,0) 50%,rgba(0,0,0,.75));opacity:1;position:absolute;content:"";width:100%;height:100%;left:0;bottom:0;z-index:1;transition:opacity .8s cubic-bezier(0.34,.615,.4,.985)}.card-overlay .card-img::after{background:linear-gradient(0deg,rgba(0,0,0,.55),rgba(0,0,0,.55));opacity:0;position:absolute;content:"";width:100%;height:100%;left:0;bottom:0;z-index:1;transition:opacity .8s cubic-bezier(0.34,.615,.4,.985)}.card-overlay .card-video{top:0;left:0;right:0;bottom:0}.card-overlay .card-box{transition:all .8s cubic-bezier(0.34,.615,.4,.985);transition-behavior:allow-discrete}.card-overlay .card-box .card-title{border-color:transparent;transition:all .8s cubic-bezier(0.34,.615,.4,.985)}.card-overlay .card-box .card-description{transition:all .25s cubic-bezier(0.34,.615,.4,.985);display:none;opacity:0;scale:0;transition-behavior:allow-discrete}.card-overlay:hover .card-img img{filter:blur(6px);transform:scale(1.2)}.card-overlay:hover .card-img::before{opacity:0}.card-overlay:hover .card-img::after{opacity:1}.card-overlay:hover .card-box{transform:translateY(0)}.card-overlay:hover .card-box .card-title{border-color:white}.card-overlay:hover .card-box .card-description{display:flex;transition-behavior:allow-discrete;opacity:1;scale:1}.uicore-page-title a{color:var(--uicore-body-color)}.uicore-page-title .uicore .ui-breadcrumb span a span{opacity:1}

    /* Sticky sidebar enhancement */
    @media (min-width: 1025px) {
    .elementor-element-d9519e9 {
    position: sticky !important;
    top: 120px !important;
    align-self: flex-start !important;
    z-index: 10;
    }
    }

    /* Carousel Navigation & Styling */
    .elementor-element-579cd70 .swiper {
    overflow: hidden;
    position: relative;
    }
    .elementor-element-579cd70 .elementor-swiper-button {
    cursor: pointer;
    z-index: 20;
    }

    /* Tenaga Pengajar (Teachers) Grid & Cards matching live site */
    #tenaga-pengajar.elementor-element-24d14b0 {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 0 !important;
    }
    @media (max-width: 1024px) {
        #tenaga-pengajar.elementor-element-24d14b0 {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }
    @media (max-width: 640px) {
        #tenaga-pengajar.elementor-element-24d14b0 {
            grid-template-columns: repeat(1, 1fr) !important;
        }
    }
    .teacher-card {
        padding: 40px 20px !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: flex-start !important;
        text-align: center !important;
        min-height: 290px;
    }
    .teacher-avatar-wrapper {
        width: 125px;
        height: 125px;
        border-radius: 50%;
        border: 2px solid #FF7A00;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin: 0 auto 18px auto;
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(255, 122, 0, 0.12);
        flex-shrink: 0;
    }
    .teacher-avatar-wrapper img {
        width: 120px !important;
        height: 120px !important;
        object-fit: cover !important;
        object-position: center 20% !important;
        border-radius: 50% !important;
        display: block !important;
    }
    .teacher-name {
        font-family: var(--uicore-primary-font-family, 'Poppins', sans-serif);
        font-size: 17px !important;
        font-weight: 700 !important;
        color: #111827 !important;
        margin: 0 0 6px 0 !important;
        line-height: 1.35 !important;
        text-align: center !important;
    }
    .teacher-role {
        font-family: var(--uicore-text-font-family, 'Poppins', sans-serif);
        font-size: 13.5px !important;
        color: #64748B !important;
        margin: 0 !important;
        line-height: 1.4 !important;
        text-align: center !important;
    }
    </style>
@endpush

@section('content')
<header class="uicore uicore-page-title uicore-section uicore-box">
    <div class="uicore-overlay"></div>
    <div class="uicore uicore-container">
        <p class="uicore-animate ui-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <span itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="{{ route('home') }}">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content=" 1" />
            </span>
            <i class="uicore-separator uicore-i-arrow"></i>
            <span itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <span>
                    <span itemprop="name">Sumber Daya</span>
                    <meta itemprop="position" content=" 2" />
                </span>
            </span>
        </p>
        <h1 class="uicore-title uicore-animate h1 uicore-typo-h1">Sumber Daya</h1>
    </div>
</header>
<!-- 1.4 uicore_before_content -->
<div id="primary" class="content-area">
    <article id="post-24" class="post-24 page type-page status-publish hentry">
        <main class="entry-content">
            <div data-elementor-type="wp-page" data-elementor-id="24" class="elementor elementor-24" data-elementor-post-type="page">
                <div class="elementor-element elementor-element-91e3897 e-flex e-con-boxed e-con e-parent" data-id="91e3897" data-element_type="container" data-settings='{"background_background":"classic"}'>
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-76c70c8 e-con-full e-flex e-con e-child" data-id="76c70c8" data-element_type="container">
                            <div class="elementor-element elementor-element-d9519e9 e-con-full e-flex e-con e-child" data-id="d9519e9" data-element_type="container" data-settings='{"sticky":"top","sticky_on":["desktop"],"sticky_offset":140,"sticky_offset_tablet":0,"sticky_parent":"yes","sticky_effects_offset":0,"sticky_anchor_link_offset":0}'>
                                <div class="elementor-element elementor-element-1253af3 elementor-widget elementor-widget-heading" data-id="1253af3" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-heading-title elementor-size-default">Memaksimalkan Potensi Siswa</div>
                                </div>
                                <div class="elementor-element elementor-element-c1fb59c elementor-widget elementor-widget-heading" data-id="c1fb59c" data-element_type="widget" data-widget_type="heading.default">
                                    <h2 class="elementor-heading-title elementor-size-default">Fasilitas Sekolah</h2>
                                </div>
                                <div class="elementor-element elementor-element-6985bda elementor-widget elementor-widget-text-editor" data-id="6985bda" data-element_type="widget" data-widget_type="text-editor.default">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                    </p>
                                </div>
                                <div class="elementor-element elementor-element-b28a976 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="b28a976" data-element_type="widget" data-widget_type="divider.default">
                                    <div class="elementor-divider">
                                        <span class="elementor-divider-separator"></span>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-6819270 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="6819270" data-element_type="widget" data-widget_type="icon-list.default">
                                    <ul class="elementor-icon-list-items">
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="ri ri-building-2-fill"></i>
                                            </span>
                                            <span class="elementor-icon-list-text">Ruang Laboratorium</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="elementor-element elementor-element-909beba elementor-widget elementor-widget-text-editor" data-id="909beba" data-element_type="widget" data-widget_type="text-editor.default">
                                    <p>
                                        Pengembangan Software, Netwotk Infrastructure, Computer and Network Installation, Hotel, Unit Bisnis Percetakan
                                    </p>
                                </div>
                                <div class="elementor-element elementor-element-25a2def elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="25a2def" data-element_type="widget" data-widget_type="divider.default">
                                    <div class="elementor-divider">
                                        <span class="elementor-divider-separator"></span>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-fa7226c elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="fa7226c" data-element_type="widget" data-widget_type="icon-list.default">
                                    <ul class="elementor-icon-list-items">
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="ri ri-building-2-fill"></i>
                                            </span>
                                            <span class="elementor-icon-list-text">Ruang Laboratorium</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="elementor-element elementor-element-bcb9536 elementor-widget elementor-widget-text-editor" data-id="bcb9536" data-element_type="widget" data-widget_type="text-editor.default">
                                    <p>Ruang Kelas, Perpustakaan Digital, Ruang Sinema, Ruang Teaching Factory</p>
                                </div>
                                <div class="elementor-element elementor-element-c33668a elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="c33668a" data-element_type="widget" data-widget_type="divider.default">
                                    <div class="elementor-divider">
                                        <span class="elementor-divider-separator"></span>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-f6f9ac5 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="f6f9ac5" data-element_type="widget" data-widget_type="icon-list.default">
                                    <ul class="elementor-icon-list-items">
                                        <li class="elementor-icon-list-item">
                                            <span class="elementor-icon-list-icon">
                                                <i aria-hidden="true" class="ri ri-building-2-fill"></i>
                                            </span>
                                            <span class="elementor-icon-list-text">Ruang Laboratorium</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="elementor-element elementor-element-e321e0d elementor-widget elementor-widget-text-editor" data-id="e321e0d" data-element_type="widget" data-widget_type="text-editor.default">
                                    <p>
                                        Masjid Asiyah, Green Cafe, Pondok Pesantren Al Ikrom, UKS, Kantin Sehat, Ruang Serbaguna, Panggung Kreasi Budaya, Lapangan Basket, Voli, Bulutangkis dan Futsal, Free Wifi, CCTV
                                    </p>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-55e81e3 e-con-full e-grid e-con e-child" data-id="55e81e3" data-element_type="container">
                                @forelse($facilities as $f)
                                <div class="elementor-element e-con-full e-flex e-con e-child" data-element_type="container" style="position: relative; overflow: hidden; border-radius: 8px;">
                                    <div class="elementor-element elementor-widget elementor-widget-image" data-element_type="widget" data-widget_type="image.default">
                                        <img fetchpriority="high" decoding="async" width="1000" height="750" src="{{ asset($f->image_url ?: '/assets/images/8f5d1c27544f0cb8e82f799c3f49050c2777e021-1024x768.jpg') }}" class="attachment-large size-large" alt="{{ $f->name }}" style="width: 100%; height: 260px; object-fit: cover;" />
                                    </div>
                                    <div class="elementor-element e-con-full e-flex e-con e-child" data-element_type="container" data-settings='{"position":"absolute"}' style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(180deg, transparent, rgba(0,0,0,0.85)); padding: 25px 15px 12px;">
                                        <div class="elementor-element elementor-widget elementor-widget-heading" data-element_type="widget" data-widget_type="heading.default">
                                            <h5 class="elementor-heading-title elementor-size-default" style="color: #ffffff; margin: 0; font-size: 15px; font-weight: 600;">{{ $f->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12 text-center text-muted py-4">Belum ada data fasilitas.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-74613fd e-flex e-con-boxed e-con e-parent" data-id="74613fd" data-element_type="container">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-fda8c59 e-con-full e-flex e-con e-child" data-id="fda8c59" data-element_type="container">
                            <div class="elementor-element elementor-element-82e71f7 elementor-widget elementor-widget-heading" data-id="82e71f7" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-heading-title elementor-size-default">Memaksimalkan Potensi Siswa</div>
                            </div>
                            <div class="elementor-element elementor-element-1dbf752 elementor-widget elementor-widget-heading" data-id="1dbf752" data-element_type="widget" data-widget_type="heading.default">
                                <h2 class="elementor-heading-title elementor-size-default">Suasana Sekolah</h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-87bc3fd e-con-full e-grid e-con e-child" data-id="87bc3fd" data-element_type="container">
                            <div class="elementor-element elementor-element-4a782f7 e-con-full e-flex e-con e-child" data-id="4a782f7" data-element_type="container">
                                <div class="elementor-element elementor-element-4083731 elementor-widget elementor-widget-image" data-id="4083731" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="750" src="{{ asset('assets/images/13dcbac415d7a2dca7d788019226fad322d1a169-1024x768.jpg') }}" class="attachment-large size-large wp-image-816" alt="" srcset="/assets/images/13dcbac415d7a2dca7d788019226fad322d1a169-1024x768.jpg 1024w, /assets/images/13dcbac415d7a2dca7d788019226fad322d1a169-300x225.jpg 300w, /assets/images/13dcbac415d7a2dca7d788019226fad322d1a169-768x576.jpg 768w, /assets/images/13dcbac415d7a2dca7d788019226fad322d1a169-650x488.jpg 650w, /assets/images/13dcbac415d7a2dca7d788019226fad322d1a169.jpg 1280w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-07c6353 e-con-full e-flex e-con e-child" data-id="07c6353" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-2c6bedb elementor-widget elementor-widget-heading" data-id="2c6bedb" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Lingkungan Sekolah</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-b0f0048 e-con-full e-flex e-con e-child" data-id="b0f0048" data-element_type="container">
                                <div class="elementor-element elementor-element-e42f57c elementor-widget elementor-widget-image" data-id="e42f57c" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="667" src="{{ asset('assets/images/590fc25396a898d3c29a34f812255f6887b2ce35-1024x683.jpg') }}" class="attachment-large size-large wp-image-817" alt="" srcset="/assets/images/590fc25396a898d3c29a34f812255f6887b2ce35-1024x683.jpg 1024w, /assets/images/590fc25396a898d3c29a34f812255f6887b2ce35-300x200.jpg 300w, /assets/images/590fc25396a898d3c29a34f812255f6887b2ce35-768x512.jpg 768w, /assets/images/590fc25396a898d3c29a34f812255f6887b2ce35-1536x1024.jpg 1536w, /assets/images/590fc25396a898d3c29a34f812255f6887b2ce35-650x433.jpg 650w, /assets/images/590fc25396a898d3c29a34f812255f6887b2ce35.jpg 1620w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-1ed7624 e-con-full e-flex e-con e-child" data-id="1ed7624" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-a3baf55 elementor-widget elementor-widget-heading" data-id="a3baf55" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Panggung Budaya</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-25610dd e-con-full e-flex e-con e-child" data-id="25610dd" data-element_type="container">
                                <div class="elementor-element elementor-element-4452f69 elementor-widget elementor-widget-image" data-id="4452f69" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="572" src="{{ asset('assets/images/e2766d248dde7582a337a89f79f4fa97c9ebeb43-1024x586.jpg') }}" class="attachment-large size-large wp-image-822" alt="" srcset="/assets/images/e2766d248dde7582a337a89f79f4fa97c9ebeb43-1024x586.jpg 1024w, /assets/images/e2766d248dde7582a337a89f79f4fa97c9ebeb43-300x172.jpg 300w, /assets/images/e2766d248dde7582a337a89f79f4fa97c9ebeb43-768x439.jpg 768w, /assets/images/e2766d248dde7582a337a89f79f4fa97c9ebeb43-650x372.jpg 650w, /assets/images/e2766d248dde7582a337a89f79f4fa97c9ebeb43.jpg 1203w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-d5b3996 e-con-full e-flex e-con e-child" data-id="d5b3996" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-8710db2 elementor-widget elementor-widget-heading" data-id="8710db2" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Lapangan</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-77cb604 e-con-full e-flex e-con e-child" data-id="77cb604" data-element_type="container">
                                <div class="elementor-element elementor-element-0730c8c elementor-widget elementor-widget-image" data-id="0730c8c" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="667" src="{{ asset('assets/images/b16a4cfa68a33736a7ea1d323f7b7319bb8bbc54-1024x683.jpg') }}" class="attachment-large size-large wp-image-821" alt="" srcset="/assets/images/b16a4cfa68a33736a7ea1d323f7b7319bb8bbc54-1024x683.jpg 1024w, /assets/images/b16a4cfa68a33736a7ea1d323f7b7319bb8bbc54-300x200.jpg 300w, /assets/images/b16a4cfa68a33736a7ea1d323f7b7319bb8bbc54-768x512.jpg 768w, /assets/images/b16a4cfa68a33736a7ea1d323f7b7319bb8bbc54-1536x1024.jpg 1536w, /assets/images/b16a4cfa68a33736a7ea1d323f7b7319bb8bbc54-650x433.jpg 650w, /assets/images/b16a4cfa68a33736a7ea1d323f7b7319bb8bbc54.jpg 1620w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-c1c7954 e-con-full e-flex e-con e-child" data-id="c1c7954" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-eb9d1d9 elementor-widget elementor-widget-heading" data-id="eb9d1d9" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Ruang Kuliah Umum</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-eac9a5e e-con-full e-flex e-con e-child" data-id="eac9a5e" data-element_type="container">
                                <div class="elementor-element elementor-element-2e868db elementor-widget elementor-widget-image" data-id="2e868db" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="485" src="{{ asset('assets/images/4b9c2f1dce59a8f2db058b1a0b1224a686b05182-1024x497.jpg') }}" class="attachment-large size-large wp-image-820" alt="" srcset="/assets/images/4b9c2f1dce59a8f2db058b1a0b1224a686b05182-1024x497.jpg 1024w, /assets/images/4b9c2f1dce59a8f2db058b1a0b1224a686b05182-300x146.jpg 300w, /assets/images/4b9c2f1dce59a8f2db058b1a0b1224a686b05182-768x373.jpg 768w, /assets/images/4b9c2f1dce59a8f2db058b1a0b1224a686b05182-650x315.jpg 650w, /assets/images/4b9c2f1dce59a8f2db058b1a0b1224a686b05182.jpg 1280w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-430a7f0 e-con-full e-flex e-con e-child" data-id="430a7f0" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-4a8c5a4 elementor-widget elementor-widget-heading" data-id="4a8c5a4" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Masjid Sekolah</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-970c5d5 e-con-full e-flex e-con e-child" data-id="970c5d5" data-element_type="container">
                                <div class="elementor-element elementor-element-9ab9a63 elementor-widget elementor-widget-image" data-id="9ab9a63" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="750" src="{{ asset('assets/images/00585457516c5047ae9fa2cc078e29fb5bb647ae-1-1024x768.jpg') }}" class="attachment-large size-large wp-image-823" alt="" srcset="/assets/images/00585457516c5047ae9fa2cc078e29fb5bb647ae-1-1024x768.jpg 1024w, /assets/images/00585457516c5047ae9fa2cc078e29fb5bb647ae-1-300x225.jpg 300w, /assets/images/00585457516c5047ae9fa2cc078e29fb5bb647ae-1-768x576.jpg 768w, /assets/images/00585457516c5047ae9fa2cc078e29fb5bb647ae-1-1536x1152.jpg 1536w, /assets/images/00585457516c5047ae9fa2cc078e29fb5bb647ae-1-650x488.jpg 650w, /assets/images/00585457516c5047ae9fa2cc078e29fb5bb647ae-1.jpg 2000w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-f2059ec e-con-full e-flex e-con e-child" data-id="f2059ec" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-db281ab elementor-widget elementor-widget-heading" data-id="db281ab" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Ruang Belajar</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-9113b51 e-con-full e-flex e-con e-child" data-id="9113b51" data-element_type="container">
                                <div class="elementor-element elementor-element-f52385d elementor-widget elementor-widget-image" data-id="f52385d" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="563" src="{{ asset('assets/images/82d990d9d8a6c667139bb4dc84aab6abe670ac1c-1024x577.jpg') }}" class="attachment-large size-large wp-image-819" alt="" srcset="/assets/images/82d990d9d8a6c667139bb4dc84aab6abe670ac1c-1024x577.jpg 1024w, /assets/images/82d990d9d8a6c667139bb4dc84aab6abe670ac1c-300x169.jpg 300w, /assets/images/82d990d9d8a6c667139bb4dc84aab6abe670ac1c-768x432.jpg 768w, /assets/images/82d990d9d8a6c667139bb4dc84aab6abe670ac1c-1536x865.jpg 1536w, /assets/images/82d990d9d8a6c667139bb4dc84aab6abe670ac1c-650x366.jpg 650w, /assets/images/82d990d9d8a6c667139bb4dc84aab6abe670ac1c.jpg 1600w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-bc4e5c2 e-con-full e-flex e-con e-child" data-id="bc4e5c2" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-bf6be8e elementor-widget elementor-widget-heading" data-id="bf6be8e" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Ruang Belajar</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-257c103 e-con-full e-flex e-con e-child" data-id="257c103" data-element_type="container">
                                <div class="elementor-element elementor-element-200d774 elementor-widget elementor-widget-image" data-id="200d774" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="563" src="{{ asset('assets/images/cb81bec048e889917da1dfdcde76bf668a2c4be1-1024x577.jpg') }}" class="attachment-large size-large wp-image-828" alt="" srcset="/assets/images/cb81bec048e889917da1dfdcde76bf668a2c4be1-1024x577.jpg 1024w, /assets/images/cb81bec048e889917da1dfdcde76bf668a2c4be1-300x169.jpg 300w, /assets/images/cb81bec048e889917da1dfdcde76bf668a2c4be1-768x432.jpg 768w, /assets/images/cb81bec048e889917da1dfdcde76bf668a2c4be1-1536x865.jpg 1536w, /assets/images/cb81bec048e889917da1dfdcde76bf668a2c4be1-650x366.jpg 650w, /assets/images/cb81bec048e889917da1dfdcde76bf668a2c4be1.jpg 1600w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-4557eb2 e-con-full e-flex e-con e-child" data-id="4557eb2" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-bd48f32 elementor-widget elementor-widget-heading" data-id="bd48f32" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Ruang Belajar</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-9dde563 e-con-full e-flex e-con e-child" data-id="9dde563" data-element_type="container">
                                <div class="elementor-element elementor-element-a2c1bd6 elementor-widget elementor-widget-image" data-id="a2c1bd6" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="750" src="{{ asset('assets/images/d25b2a7f6f0587931d8f29e272f1c1b9de80e33b.jpg') }}" class="attachment-large size-large wp-image-827" alt="" srcset="/assets/images/d25b2a7f6f0587931d8f29e272f1c1b9de80e33b.jpg 1024w, /assets/images/d25b2a7f6f0587931d8f29e272f1c1b9de80e33b-300x225.jpg 300w, /assets/images/d25b2a7f6f0587931d8f29e272f1c1b9de80e33b-768x576.jpg 768w, /assets/images/d25b2a7f6f0587931d8f29e272f1c1b9de80e33b-650x488.jpg 650w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-cb4e28a e-con-full e-flex e-con e-child" data-id="cb4e28a" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-ccf9184 elementor-widget elementor-widget-heading" data-id="ccf9184" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Ruang UKS</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-0c73f28 e-con-full e-flex e-con e-child" data-id="0c73f28" data-element_type="container">
                                <div class="elementor-element elementor-element-c7c9bcd elementor-widget elementor-widget-image" data-id="c7c9bcd" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="780" height="780" src="{{ asset('assets/images/74328ca2cc994281fc0d4653673559ecf869ce0d.jpg') }}" class="attachment-large size-large wp-image-826" alt="" srcset="/assets/images/74328ca2cc994281fc0d4653673559ecf869ce0d.jpg 780w, /assets/images/74328ca2cc994281fc0d4653673559ecf869ce0d-300x300.jpg 300w, /assets/images/74328ca2cc994281fc0d4653673559ecf869ce0d-150x150.jpg 150w, /assets/images/74328ca2cc994281fc0d4653673559ecf869ce0d-768x768.jpg 768w, /assets/images/74328ca2cc994281fc0d4653673559ecf869ce0d-650x650.jpg 650w" sizes="(max-width: 780px) 100vw, 780px" />
                                </div>
                                <div class="elementor-element elementor-element-7f3d03c e-con-full e-flex e-con e-child" data-id="7f3d03c" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-083bee4 elementor-widget elementor-widget-heading" data-id="083bee4" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Kamar Santri</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-3a74b11 e-con-full e-flex e-con e-child" data-id="3a74b11" data-element_type="container">
                                <div class="elementor-element elementor-element-0d4642f elementor-widget elementor-widget-image" data-id="0d4642f" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="750" src="{{ asset('assets/images/8c8f5fa96315aedab36a4888e27872e6348f999a-1024x768.jpg') }}" class="attachment-large size-large wp-image-825" alt="" srcset="/assets/images/8c8f5fa96315aedab36a4888e27872e6348f999a-1024x768.jpg 1024w, /assets/images/8c8f5fa96315aedab36a4888e27872e6348f999a-300x225.jpg 300w, /assets/images/8c8f5fa96315aedab36a4888e27872e6348f999a-768x576.jpg 768w, /assets/images/8c8f5fa96315aedab36a4888e27872e6348f999a-1536x1152.jpg 1536w, /assets/images/8c8f5fa96315aedab36a4888e27872e6348f999a-650x488.jpg 650w, /assets/images/8c8f5fa96315aedab36a4888e27872e6348f999a.jpg 1600w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-26c6fea e-con-full e-flex e-con e-child" data-id="26c6fea" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-3d69fac elementor-widget elementor-widget-heading" data-id="3d69fac" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Lobby Hotel</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-ee88e8d e-con-full e-flex e-con e-child" data-id="ee88e8d" data-element_type="container">
                                <div class="elementor-element elementor-element-22cf4bb elementor-widget elementor-widget-image" data-id="22cf4bb" data-element_type="widget" data-widget_type="image.default">
                                    <img loading="lazy" decoding="async" width="1000" height="750" src="{{ asset('assets/images/a8d9e4807a84f134d5e1d288ff4ea769b91a4615-1-1024x768.jpg') }}" class="attachment-large size-large wp-image-824" alt="" srcset="/assets/images/a8d9e4807a84f134d5e1d288ff4ea769b91a4615-1-1024x768.jpg 1024w, /assets/images/a8d9e4807a84f134d5e1d288ff4ea769b91a4615-1-300x225.jpg 300w, /assets/images/a8d9e4807a84f134d5e1d288ff4ea769b91a4615-1-768x576.jpg 768w, /assets/images/a8d9e4807a84f134d5e1d288ff4ea769b91a4615-1-1536x1152.jpg 1536w, /assets/images/a8d9e4807a84f134d5e1d288ff4ea769b91a4615-1-650x488.jpg 650w, /assets/images/a8d9e4807a84f134d5e1d288ff4ea769b91a4615-1.jpg 2000w" sizes="(max-width: 1000px) 100vw, 1000px" />
                                </div>
                                <div class="elementor-element elementor-element-336501b e-con-full e-flex e-con e-child" data-id="336501b" data-element_type="container" data-settings='{"position":"absolute"}'>
                                    <div class="elementor-element elementor-element-9a4aa6f elementor-widget elementor-widget-heading" data-id="9a4aa6f" data-element_type="widget" data-widget_type="heading.default">
                                        <h5 class="elementor-heading-title elementor-size-default">Kantin Sehat</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-a3002f3 e-con-full e-flex e-con e-child" data-id="a3002f3" data-element_type="container" data-settings='{"background_background":"classic"}'>
                    <div class="elementor-element elementor-element-870f727 e-con-full e-flex e-con e-child" data-id="870f727" data-element_type="container">
                        <div class="elementor-element elementor-element-05c9ee4 elementor-widget elementor-widget-heading" data-id="05c9ee4" data-element_type="widget" data-widget_type="heading.default">
                            <h2 class="elementor-heading-title elementor-size-default">Visi</h2>
                        </div>
                        <div class="elementor-element elementor-element-1ff3773 elementor-widget elementor-widget-text-editor" data-id="1ff3773" data-element_type="widget" data-widget_type="text-editor.default">
                            Menjadi sekolah kejuruan teladan nasional yang menghasilkan lulusan yang mampu memenuhi kebutuhan industri 4.0, berkarakter profil pelajar Pancasila, dan berjiwa kewirausahaan pada tahun 2028, dengan berpedoman pada Al Qur’an dan Hadits.
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-9de3966 e-con-full e-flex e-con e-child" data-id="9de3966" data-element_type="container" data-settings='{"background_background":"classic"}'>
                    <div class="elementor-element elementor-element-378c95c e-con-full e-flex e-con e-child" data-id="378c95c" data-element_type="container">
                        <div class="elementor-element elementor-element-f8c4cea elementor-widget elementor-widget-heading" data-id="f8c4cea" data-element_type="widget" data-widget_type="heading.default">
                            <h2 class="elementor-heading-title elementor-size-default">Motto</h2>
                        </div>
                        <div class="elementor-element elementor-element-b47aeef elementor-widget elementor-widget-text-editor" data-id="b47aeef" data-element_type="widget" data-widget_type="text-editor.default">
                            <p>
                                Ilmu yang Amaliah
                                <br />
                                Amal yang Ilmiah
                                <br />
                                Akhlakul Karimah
                            </p>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-721d1eb e-con-full e-flex e-con e-child" data-id="721d1eb" data-element_type="container">
                        <div class="elementor-element elementor-element-d242f60 elementor-widget elementor-widget-heading" data-id="d242f60" data-element_type="widget" data-widget_type="heading.default">
                            <h2 class="elementor-heading-title elementor-size-default">Misi</h2>
                        </div>
                        <div class="elementor-element elementor-element-32711f2 elementor-widget elementor-widget-text-editor" data-id="32711f2" data-element_type="widget" data-widget_type="text-editor.default">
                            <ol>
                                <li>
                                    Mendidik anak bangsa dengan hati dan teknologi sehingga memenuhi kebutuhan mutu dunia kerja.
                                </li>
                                <li>
                                    Menyelenggarakan pendidikan yang berfokus pada pengembangan karakter dan moral siswa.
                                </li>
                                <li>
                                    Membangun kebersamaan sosial, jiwa kewirausahaan, dan gerakan cinta tanah air dan lingkungan.
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-d40a26e e-flex e-con-boxed e-con e-parent" data-id="d40a26e" data-element_type="container">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-a420ca4 e-con-full e-flex e-con e-child" data-id="a420ca4" data-element_type="container">
                            <div class="elementor-element elementor-element-67e8779 elementor-widget elementor-widget-heading" data-id="67e8779" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-heading-title elementor-size-default">Mendidik dengan hati dan teknologi</div>
                            </div>
                            <div class="elementor-element elementor-element-07d33ae elementor-widget elementor-widget-heading" data-id="07d33ae" data-element_type="widget" data-widget_type="heading.default">
                                <h2 class="elementor-heading-title elementor-size-default">Tenaga Pengajar</h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-24d14b0 e-con-full e-grid e-con e-child" data-id="24d14b0" data-element_type="container" id="tenaga-pengajar">
                            @forelse($teachers as $teacher)
                            @php
                                $isBlue = (intdiv($loop->index, 4) + ($loop->index % 4)) % 2 == 0;
                            @endphp
                            <div class="elementor-element e-con-full e-flex e-con e-child teacher-card" style="background-color: {{ $isBlue ? '#EFF3FF' : '#FFFFFF' }};">
                                <div class="teacher-avatar-wrapper">
                                    @if($teacher->photo_url)
                                        <img loading="lazy" decoding="async" width="120" height="120" src="{{ asset($teacher->photo_url) }}" alt="{{ $teacher->name }}" />
                                    @else
                                        <div style="width: 100%; height: 100%; border-radius: 50%; background: #EFF3FF; color: #1F3984; font-size: 2.2rem; font-weight: bold; display: flex; align-items: center; justify-content: center;">
                                            {{ substr($teacher->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="elementor-element elementor-widget elementor-widget-heading" style="text-align: center; width: 100%;">
                                    <h5 class="elementor-heading-title elementor-size-default teacher-name">{{ $teacher->name }}</h5>
                                </div>
                                <div class="elementor-element elementor-widget elementor-widget-text-editor" style="text-align: center; width: 100%;">
                                    <p class="teacher-role">{{ $teacher->role }}</p>
                                </div>
                            </div>
                            @empty
                            <div class="col-span-full text-center py-8 text-gray-500">Belum ada data tenaga pendidik.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-16cfd7f e-flex e-con-boxed e-con e-parent" data-id="16cfd7f" data-element_type="container" data-settings='{"background_background":"classic"}'>
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-fe842db e-con-full e-flex e-con e-child" data-id="fe842db" data-element_type="container">
                            <div class="elementor-element elementor-element-a5bed8f elementor-widget elementor-widget-heading" data-id="a5bed8f" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-heading-title elementor-size-default">Alumni</div>
                            </div>
                            <div class="elementor-element elementor-element-9510faf elementor-widget elementor-widget-heading" data-id="9510faf" data-element_type="widget" data-widget_type="heading.default">
                                <h2 class="elementor-heading-title elementor-size-default">SMK Wikrama 1 Garut</h2>
                            </div>
                            <div class="elementor-element elementor-element-6eba350 elementor-widget elementor-widget-text-editor" data-id="6eba350" data-element_type="widget" data-widget_type="text-editor.default">
                                <p>Kami bahagia menjadi bagian dari perjuangan dan kesuksesan</p>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-0e3aafb e-con-full e-flex e-con e-child" data-id="0e3aafb" data-element_type="container">
                            <div class="elementor-element elementor-element-579cd70 elementor-arrows-position-inside elementor-widget elementor-widget-n-carousel" data-id="579cd70" data-element_type="widget" data-settings='{"carousel_items":[{"slide_title":"Ujang","_id":"9deafbe"},{"slide_title":"Auriel","_id":"e7bdf40"},{"slide_title":"Ichan MB","_id":"3ae4427"},{"_id":"d98276c","slide_title":"Desta"},{"_id":"11c9517","slide_title":"Slide #5"},{"_id":"8fcbf9f","slide_title":"Slide #6"},{"_id":"4698202","slide_title":"Slide #7"},{"_id":"c7e501d","slide_title":"Slide #8"}],"slides_to_show":"2","image_spacing_custom":{"unit":"px","size":30,"sizes":[]},"slides_to_show_tablet":"2","slides_to_show_mobile":"1","autoplay":"yes","autoplay_speed":5000,"pause_on_hover":"yes","pause_on_interaction":"yes","infinite":"yes","speed":500,"offset_sides":"none","arrows":"yes","image_spacing_custom_tablet":{"unit":"px","size":"","sizes":[]},"image_spacing_custom_mobile":{"unit":"px","size":"","sizes":[]}}' data-widget_type="nested-carousel.default">
                                <div class="e-n-carousel swiper" role="region" aria-roledescription="carousel" aria-label="Carousel" dir="ltr">
                                    <div class="swiper-wrapper" aria-live="off">
                                        @forelse($alumnis as $index => $alm)
                                        <div class="swiper-slide" data-slide="{{ $index + 1 }}" role="group" aria-roledescription="slide" aria-label="{{ $index + 1 }} of {{ $alumnis->count() }}">
                                            <div class="elementor-element e-flex e-con-boxed e-con e-child" data-settings='{"background_background":"classic"}'>
                                                <div class="e-con-inner text-center" style="padding: 24px 18px;">
                                                    <div class="elementor-element elementor-widget elementor-widget-image" data-widget_type="image.default">
                                                        @if($alm->photo_url)
                                                            <img loading="lazy" decoding="async" width="160" height="160" src="{{ asset($alm->photo_url) }}" class="attachment-large size-large" alt="{{ $alm->name }}" style="width: 140px; height: 140px; object-fit: cover; object-position: center top; border-radius: 50%; margin: 0 auto 14px; border: 4px solid #FF7A00; box-shadow: 0 4px 14px rgba(255, 122, 0, 0.2);" />
                                                        @else
                                                            <div style="width: 140px; height: 140px; border-radius: 50%; background: #EFF3FF; color: #1F3984; font-size: 2.8rem; font-weight: bold; display: flex; align-items: center; justify-content: center; margin: 0 auto 14px; border: 4px solid #FF7A00;">
                                                                {{ substr($alm->name, 0, 1) }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="elementor-element elementor-widget elementor-widget-heading" data-widget_type="heading.default">
                                                        <h5 class="elementor-heading-title elementor-size-default" style="font-weight: 700; color: #001E42; font-size: 1.15rem; margin-bottom: 6px;">{{ $alm->name }}</h5>
                                                    </div>
                                                    <div class="elementor-element elementor-widget elementor-widget-text-editor" data-widget_type="text-editor.default" style="font-size: 0.92rem; color: #4B5563; line-height: 1.5;">
                                                        @if($alm->company)
                                                            <strong style="color: #1F3984; font-size: 0.98rem; display: block;">{{ $alm->company }}</strong>
                                                        @endif
                                                        @if($alm->profession)
                                                            <span style="color: #FF7A00; font-weight: 600;">{{ $alm->profession }}</span>
                                                        @endif
                                                        @if($alm->major || $alm->graduation_year)
                                                            <div style="font-size: 0.82rem; color: #6B7280; margin-top: 4px;">
                                                                {{ $alm->major }} {{ $alm->graduation_year ? '• Lulusan ' . $alm->graduation_year : '' }}
                                                            </div>
                                                        @endif
                                                        @if($alm->quote)
                                                            <p class="mt-3 text-muted" style="font-style: italic; font-size: 0.85rem; line-height: 1.4; color: #64748B;">“{{ $alm->quote }}”</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="swiper-slide text-center py-6 text-muted">Belum ada data alumni.</div>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="elementor-swiper-button elementor-swiper-button-prev" role="button" tabindex="0" aria-label="Previous">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-eicon-chevron-left" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M646 125C629 125 613 133 604 142L308 442C296 454 292 471 292 487 292 504 296 521 308 533L604 854C617 867 629 875 646 875 663 875 679 871 692 858 704 846 713 829 713 812 713 796 708 779 692 767L438 487 692 225C700 217 708 204 708 187 708 171 704 154 692 142 675 129 663 125 646 125Z"></path>
                                    </svg>
                                </div>
                                <div class="elementor-swiper-button elementor-swiper-button-next" role="button" tabindex="0" aria-label="Next">
                                    <svg aria-hidden="true" class="e-font-icon-svg e-eicon-chevron-right" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M696 533C708 521 713 504 713 487 713 471 708 454 696 446L400 146C388 133 375 125 354 125 338 125 325 129 313 142 300 154 292 171 292 187 292 204 296 221 308 233L563 492 304 771C292 783 288 800 288 817 288 833 296 850 308 863 321 871 338 875 354 875 371 875 388 867 400 854L696 533Z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </article>
</div>
<!-- #primary -->
@endsection

@push('scripts')
    <script id="jquery-sticky-js" src="{{ asset('assets/wikrama/js/jquery.sticky.min.js') }}"></script>
    <script id="swiper-bundle-js" src="{{ asset('assets/wikrama/js/swiper.js') }}"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    function initAlumniCarousel() {
    var carouselEl = document.querySelector('.elementor-element-579cd70 .swiper');
    if (carouselEl && !carouselEl.swiper) {
    try {
    new Swiper(carouselEl, {
    slidesPerView: 2,
    spaceBetween: 30,
    loop: true,
    autoplay: {
    delay: 5000,
    disableOnInteraction: false,
    pauseOnMouseEnter: true
    },
    speed: 500,
    navigation: {
    nextEl: '.elementor-element-579cd70 .elementor-swiper-button-next',
    prevEl: '.elementor-element-579cd70 .elementor-swiper-button-prev'
    },
    breakpoints: {
    320: {
    slidesPerView: 1,
    spaceBetween: 20
    },
    768: {
    slidesPerView: 2,
    spaceBetween: 25
    },
    1024: {
    slidesPerView: 2,
    spaceBetween: 30
    }
    }
    });
    console.log('Alumni swiper initialized successfully');
    } catch(e) {
    console.error('Alumni swiper init error:', e);
    }
    }
    }

    initAlumniCarousel();
    setTimeout(initAlumniCarousel, 500);
    });
    </script>
@endpush
