@extends('layouts.wikrama')

@section('title', 'Tentang Kami – SMK Wikrama 1 Garut')

@section('body_class', 'wp-singular page-template-default page page-id-28 wp-embed-responsive wp-theme-vault ally-default uicore-animate-fade ui-a-dsmm-slide uicore-sticky-tb elementor-default elementor-kit-8 elementor-page elementor-page-28')

@push('styles')
    <link rel='stylesheet' id='widget-heading-css' href='{{ asset('assets/wikrama/css/widget-heading.min.css') }}' media='all' />
    <link rel='stylesheet' id='widget-google_maps-css' href='{{ asset('assets/wikrama/css/widget-google_maps.min.css') }}' media='all' />
    <link rel='stylesheet' id='widget-icon-box-css' href='{{ asset('assets/wikrama/css/widget-icon-box.min.css') }}' media='all' />
    <link rel='stylesheet' id='lucide-icons-css' href='{{ asset('assets/wikrama/css/lucide-icons.css') }}' media='all' />
    <link rel='stylesheet' id='themify-icons-css' href='{{ asset('assets/wikrama/css/themify-icons.css') }}' media='all' />
    <link rel='stylesheet' id='elementor-post-28-css' href='{{ asset('assets/wikrama/css/post-28.css') }}' media='all' />
    <style type='text/css'>
        /* Contact cards subtle styling and smooth elevation */
        .elementor-28 .elementor-element.elementor-element-825c978,
        .elementor-28 .elementor-element.elementor-element-67fe33f,
        .elementor-28 .elementor-element.elementor-element-f66fc54 {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            border-radius: 12px;
        }

        .elementor-28 .elementor-element.elementor-element-825c978:hover,
        .elementor-28 .elementor-element.elementor-element-67fe33f:hover,
        .elementor-28 .elementor-element.elementor-element-f66fc54:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 35px rgba(31, 57, 132, 0.12);
            border-color: rgba(31, 57, 132, 0.15);
        }

        .elementor-28 .elementor-element.elementor-element-39e8baa iframe {
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        /* Modern Form Styling */
        .contact-form-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.06);
            padding: 40px;
            margin-top: 50px;
        }

        .contact-form-input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 10px;
            border: 1px solid #E2E8F0;
            background-color: #F8FAFC;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: #1E293B;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        .contact-form-input:focus {
            outline: none;
            border-color: #1F3984;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(31, 57, 132, 0.1);
        }

        .contact-btn-submit {
            background-color: #1F3984;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 15px;
            padding: 14px 28px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .contact-btn-submit:hover {
            background-color: #001E42;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(31, 57, 132, 0.25);
        }

        .contact-alert-success {
            background-color: #ECFDF5;
            border: 1px solid #A7F3D0;
            color: #065F46;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
        }
    </style>
@endpush

@php
    $rawPhone = $profile->phone ?? '081323314430';
    $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
    if (str_starts_with($cleanPhone, '0')) {
        $waPhone = '62' . substr($cleanPhone, 1);
    } else {
        $waPhone = $cleanPhone;
    }
    $phoneDisplay = $rawPhone;
    $email = $profile->email ?? 'info@smkwikrama1garut.sch.id';
    $address = $profile->address ?? 'Jl. Otto Iskandardinata, Kp Tanjung, Ds Pasawahan, Kec Tarogong Kaler Garut';
    $mapsUrl = $profile->maps_embed_url ?? 'https://maps.google.com/maps?q=SMK%20Wikrama%201%20Garut&t=m&z=10&output=embed&iwloc=near';
@endphp

@section('content')
    <!-- Page Header & Breadcrumbs -->
    <header class="uicore uicore-page-title uicore-section uicore-box">
        <div class="uicore-overlay"></div>
        <div class="uicore uicore-container">
            <p class="uicore-animate ui-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="{{ route('home') }}" itemprop="item">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta content="1" itemprop="position" />
                </span>
                <i class="uicore-separator uicore-i-arrow"></i>
                <span itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <span>
                        <span itemprop="name">Tentang Kami</span>
                        <meta content="2" itemprop="position" />
                    </span>
                </span>
            </p>
            <h1 class="uicore-title uicore-animate h1 uicore-typo-h1">Tentang Kami</h1>
        </div>
    </header>

    <article id="post-28" class="post-28 page type-page status-publish hentry">
        <main class="entry-content">
            <div class="elementor elementor-28">
                
                <!-- Main Contact & Maps Section -->
                <div class="elementor-element elementor-element-a5297de e-flex e-con-boxed e-con e-parent" data-id="a5297de" data-element_type="container">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-408a2ee e-con-full e-flex e-con e-child" data-id="408a2ee" data-element_type="container">
                            
                            <!-- Subtitle Tag -->
                            <div class="elementor-element elementor-element-c5af7fe elementor-widget elementor-widget-heading" data-id="c5af7fe" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-heading-title elementor-size-default">Hubungi Kami</div>
                            </div>

                            <!-- Main Heading -->
                            <div class="elementor-element elementor-element-f5e42cc elementor-widget elementor-widget-heading" data-id="f5e42cc" data-element_type="widget" data-widget_type="heading.default">
                                <h2 class="elementor-heading-title elementor-size-default">Mari Terhubung dengan SMK Wikrama 1 Garut</h2>
                            </div>

                            <!-- Description -->
                            <div class="elementor-element elementor-element-98e66b5 elementor-widget__width-initial elementor-widget elementor-widget-text-editor" data-id="98e66b5" data-element_type="widget" data-widget_type="text-editor.default">
                                <p>Kami siap menjawab pertanyaan Anda seputar pendaftaran, program unggulan, maupun kerja sama. Kunjungi kami langsung atau hubungi melalui kontak berikut.</p>
                            </div>

                            <!-- Google Maps Widget -->
                            <div class="elementor-element elementor-element-39e8baa elementor-widget elementor-widget-google_maps" data-id="39e8baa" data-element_type="widget" data-widget_type="google_maps.default">
                                <div class="elementor-custom-embed">
                                    <iframe 
                                        title="SMK Wikrama 1 Garut" 
                                        aria-label="SMK Wikrama 1 Garut" 
                                        src="{{ $mapsUrl }}" 
                                        loading="lazy">
                                    </iframe>
                                </div>
                            </div>

                            <!-- 3 Contact Cards -->
                            <div class="elementor-element elementor-element-7c79a1b e-grid e-con-full e-con e-child" data-id="7c79a1b" data-element_type="container">
                                
                                <!-- Card 1: Telepon / WhatsApp -->
                                <div class="elementor-element elementor-element-825c978 e-con-full e-flex e-con e-child" data-id="825c978" data-element_type="container" data-settings='{"background_background":"classic"}'>
                                    <div class="elementor-element elementor-element-59d4023 elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="59d4023" data-element_type="widget" data-widget_type="icon-box.default">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <a class="elementor-icon" href="https://wa.me/{{ $waPhone }}" target="_blank" rel="noopener noreferrer" aria-label="Telepon" tabindex="-1">
                                                    <i aria-hidden="true" class="lu lu-phone-call"></i>
                                                </a>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <h5 class="elementor-icon-box-title">
                                                    <a href="https://wa.me/{{ $waPhone }}" target="_blank" rel="noopener noreferrer">Telepon</a>
                                                </h5>
                                                <p class="elementor-icon-box-description">
                                                    {{ $phoneDisplay }}
                                                    <br>
                                                    (tersedia Whatsapp)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 2: Email -->
                                <div class="elementor-element elementor-element-67fe33f e-con-full e-flex e-con e-child" data-id="67fe33f" data-element_type="container" data-settings='{"background_background":"classic"}'>
                                    <div class="elementor-element elementor-element-4f1a9b6 elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="4f1a9b6" data-element_type="widget" data-widget_type="icon-box.default">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <a class="elementor-icon" href="mailto:{{ $email }}" target="_blank" rel="noopener noreferrer" aria-label="Email" tabindex="-1">
                                                    <i aria-hidden="true" class="ti ti-email"></i>
                                                </a>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <h5 class="elementor-icon-box-title">
                                                    <a href="mailto:{{ $email }}" target="_blank" rel="noopener noreferrer">Email</a>
                                                </h5>
                                                <p class="elementor-icon-box-description">
                                                    {{ $email }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 3: Alamat -->
                                <div class="elementor-element elementor-element-f66fc54 e-con-full e-flex e-con e-child" data-id="f66fc54" data-element_type="container" data-settings='{"background_background":"classic"}'>
                                    <div class="elementor-element elementor-element-25d1e31 elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="25d1e31" data-element_type="widget" data-widget_type="icon-box.default">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <span class="elementor-icon">
                                                    <i aria-hidden="true" class="lu lu-map-pinned"></i>
                                                </span>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <h5 class="elementor-icon-box-title">
                                                    <span>Alamat</span>
                                                </h5>
                                                <p class="elementor-icon-box-description">
                                                    {{ $address }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Interactive Message & Inquiries Form -->
                            <div class="contact-form-card" style="width: 100%; box-sizing: border-box;">
                                @if(session('success'))
                                    <div class="contact-alert-success">
                                        <i class="ri-checkbox-circle-fill" style="font-size: 20px;"></i>
                                        <div>
                                            <strong>Berhasil!</strong> {{ session('success') }}
                                        </div>
                                    </div>
                                @endif

                                <div style="text-align: center; margin-bottom: 30px;">
                                    <span style="display: inline-block; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 700; color: #1F3984; text-transform: uppercase; letter-spacing: 1.5px; background: rgba(31, 57, 132, 0.08); padding: 6px 16px; border-radius: 20px; margin-bottom: 12px;">
                                        Kirim Pesan
                                    </span>
                                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 26px; font-weight: 800; color: #001E42; margin: 0 0 10px 0;">
                                        Ada Pertanyaan Seputar SMK Wikrama?
                                    </h3>
                                    <p style="font-family: 'Inter', sans-serif; font-size: 14px; color: #64748B; max-width: 600px; margin: 0 auto;">
                                        Silakan isi formulir di bawah ini. Tim kami akan dengan senang hati merespons pesan Anda secepatnya.
                                    </p>
                                </div>

                                <form action="{{ route('contact.send') }}" method="POST">
                                    @csrf
                                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 20px;">
                                        <div>
                                            <label style="display: block; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 8px;">
                                                Nama Lengkap <span style="color: #EF4444;">*</span>
                                            </label>
                                            <input type="text" name="name" required class="contact-form-input" placeholder="Masukkan nama Anda" value="{{ old('name') }}">
                                            @error('name')
                                                <span style="color: #EF4444; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label style="display: block; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 8px;">
                                                Alamat Email
                                            </label>
                                            <input type="email" name="email" class="contact-form-input" placeholder="email@contoh.com" value="{{ old('email') }}">
                                            @error('email')
                                                <span style="color: #EF4444; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 20px;">
                                        <div>
                                            <label style="display: block; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 8px;">
                                                No. WhatsApp / Telepon
                                            </label>
                                            <input type="text" name="phone" class="contact-form-input" placeholder="08xxxxxxxxxx" value="{{ old('phone') }}">
                                            @error('phone')
                                                <span style="color: #EF4444; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label style="display: block; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 8px;">
                                                Subjek Pesan
                                            </label>
                                            <input type="text" name="subject" class="contact-form-input" placeholder="Contoh: Info Pendaftaran / Kerjasama" value="{{ old('subject') }}">
                                            @error('subject')
                                                <span style="color: #EF4444; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div style="margin-bottom: 24px;">
                                        <label style="display: block; font-family: 'Poppins', sans-serif; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 8px;">
                                            Isi Pesan <span style="color: #EF4444;">*</span>
                                        </label>
                                        <textarea name="message" rows="5" required class="contact-form-input" placeholder="Tuliskan pesan atau pertanyaan Anda di sini...">{{ old('message') }}</textarea>
                                        @error('message')
                                            <span style="color: #EF4444; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div style="text-align: right;">
                                        <button type="submit" class="contact-btn-submit">
                                            <span>Kirim Pesan Sekarang</span>
                                            <i class="ri-send-plane-fill"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </main>
    </article>
@endsection
