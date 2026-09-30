<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <link href="/img/SPMB-Biru.png" rel='icon'>

    <title>SPMB SMK Wikrama 1 Garut</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="/assets/template/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/template/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/assets/template/plugins/slick/slick.css">
    <link rel="stylesheet" href="/assets/template/plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="/assets/template/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/template/plugins/aos/aos.css">
    <link rel="stylesheet" type="text/css" href="/assets/landing-page/css/font-awesome.css">

    <!-- CUSTOM CSS -->
    <link href="/assets/template/css/style.css" rel="stylesheet">
    <link href="/assets/template/css/preloader.css" rel="stylesheet">
    <link href="/assets/template/css/header.css" rel="stylesheet">
    <link href="/assets/template/css/superiority.css" rel="stylesheet">
    <link href="/assets/template/css/slider-slick.css" rel="stylesheet">
    <link href="/assets/template/css/superiority.css" rel="stylesheet">
    <link href="/assets/template/css/contact.css" rel="stylesheet">
    <link href="/assets/template/css/slider.css" rel="stylesheet">
    <link href="/assets/template/css/additional.css" rel="stylesheet">

    <style>
        .carousel-item {
            background-color: #001E42;
        }
        .gradient-banner {
            display: flex;
            align-items: center;
            background-position: right center !important;
            background-size: cover !important;
            position: relative;
        }
        .hero-content-box {
            max-width: 480px;
            z-index: 2;
            position: relative;
            text-align: left;
        }
        .hero-badge-spmb {
            display: inline-block;
            background-color: #FFF500;
            color: #001E42;
            font-weight: 800;
            padding: 5px 14px;
            font-size: 12px;
            border-radius: 20px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .hero-title-spmb {
            color: #001E42;
            font-weight: 800;
            font-size: 2.35rem;
            line-height: 1.22;
            font-family: 'Raleway', sans-serif;
            margin-bottom: 16px;
            word-break: break-word;
        }
        .hero-subtitle-spmb {
            color: #334155;
            font-size: 1.05rem;
            line-height: 1.6;
            max-width: 450px;
            margin-bottom: 24px;
            font-weight: 500;
        }
        .hero-btn-spmb {
            background-color: #FFF500;
            color: #001E42;
            font-weight: 800;
            font-size: 14px;
            padding: 12px 28px;
            border-radius: 8px;
            border: 2px solid #EAB308;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.12);
            transition: all 0.25s ease;
            text-decoration: none;
        }
        .hero-btn-spmb:hover {
            background-color: #001E42;
            color: #ffffff;
            border-color: #001E42;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,30,66,0.25);
            text-decoration: none;
        }
        @media (max-width: 991.98px) {
            .gradient-banner {
                background-position: center center !important;
            }
            .hero-content-box {
                background: rgba(255, 255, 255, 0.94);
                backdrop-filter: blur(8px);
                -webkit-backdrop-filter: blur(8px);
                padding: 28px;
                border-radius: 16px;
                box-shadow: 0 10px 30px rgba(0, 30, 66, 0.15);
                margin: 20px auto;
                max-width: 100%;
                text-align: center;
            }
            .hero-title-spmb {
                font-size: 1.85rem;
            }
        }
        #heroCarousel .carousel-control-prev,
        #heroCarousel .carousel-control-next {
            width: 46px;
            height: 46px;
            background-color: rgba(0, 30, 66, 0.65);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.85;
            transition: all 0.3s ease;
            z-index: 10;
            border: 2px solid rgba(255, 255, 255, 0.4);
        }
        #heroCarousel .carousel-control-prev:hover,
        #heroCarousel .carousel-control-next:hover {
            background-color: #1F3984;
            opacity: 1;
            transform: translateY(-50%) scale(1.08);
            border-color: #FFF500;
        }
        #heroCarousel .carousel-control-prev {
            left: 20px;
        }
        #heroCarousel .carousel-control-next {
            right: 20px;
        }
        #heroCarousel .carousel-control-prev-icon,
        #heroCarousel .carousel-control-next-icon {
            width: 18px;
            height: 18px;
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    
    <div class="modal" id="success-msg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-0 m-0">
                
                <div class="modal-body">
                    <div class="alert alert-success mb-0 text-center" role="alert" style="height: fit-content;">
                        Pesan telah berhasil dikirim!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="/img/SPMB-Biru.png" alt="" style="width: 70px; position: absolute; top: 5px; left: 20px;" />
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="#beranda" class="active">Beranda</a></li>
                            <li><a href="#jurusan">Jurusan</a></li>
                            <li><a href="#features">Tentang Kami</a></li>
                            <li><a href="#testimonials">Testimoni</a></li>
                            <li><a href="#contact-us">Hubungi Kami</a></li>
                            <li><a href="{{ route('home') }}" target="_blank" style="color: #02398c; font-weight: bold;"><i class="fa fa-home"></i> Web Resmi</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!--====================================
    =            Hero Section            =
    =====================================-->
    
    <!-- Hero Slider Section -->
    <div style="background-color: #001E42; min-height: 650px;">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($sliders as $index => $slider)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <section class="gradient-banner" style="background-image: linear-gradient(rgba(0,0,0,0.02),rgba(0,0,0,0.02)),url('{{ $slider->image_url ?? '/img/BG-PPLG.jpg' }}'); height: 650px;">
                        <div class="container mt-4" id="beranda">
                            <div class="row align-items-center" style="min-height: 520px;">
                                <div class="col-xl-6 col-lg-6 col-md-7 col-12">
                                    <div class="hero-content-box">
                                        <span class="hero-badge-spmb">
                                            <i class="fa fa-graduation-cap mr-1"></i> Penerimaan Siswa Baru
                                        </span>
                                        <h1 class="hero-title-spmb">
                                            @if(str_contains($slider->title, 'SPMB TA 2026-2027'))
                                                SPMB TA 2026-2027<br>
                                                <span style="color: #1F3984;">SMK Wikrama 1 Garut</span>
                                            @else
                                                {{ $slider->title }}
                                            @endif
                                        </h1>
                                        <p class="hero-subtitle-spmb">{!! nl2br(e($slider->subtitle)) !!}</p>
                                        <div>
                                            <a href="{{ $slider->btn_url ?? '#contact-us' }}" class="hero-btn-spmb">
                                                {{ $slider->btn_text ?? 'Pendaftaran SPMB' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                @empty
                <div class="carousel-item active">
                    <section class="gradient-banner" style="background-image: linear-gradient(rgba(0,0,0,0.02),rgba(0,0,0,0.02)),url('/img/BG-PPLG.jpg'); height: 650px;">
                        <div class="container mt-4" id="beranda">
                            <div class="row align-items-center" style="min-height: 520px;">
                                <div class="col-xl-6 col-lg-6 col-md-7 col-12">
                                    <div class="hero-content-box">
                                        <span class="hero-badge-spmb">
                                            <i class="fa fa-graduation-cap mr-1"></i> Penerimaan Siswa Baru
                                        </span>
                                        <h1 class="hero-title-spmb">
                                            SPMB TA 2026-2027<br>
                                            <span style="color: #1F3984;">SMK Wikrama 1 Garut</span>
                                        </h1>
                                        <p class="hero-subtitle-spmb">
                                            Ayo! Segera daftarkan dirimu ke SMK Wikrama dengan cara klik tombol di bawah ini!<br>
                                            <strong>Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah.</strong>
                                        </p>
                                        <div>
                                            <a href="#contact-us" class="hero-btn-spmb">
                                                Pendaftaran SPMB
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                @endforelse
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!--====  End of Hero Section  ====-->

    <section class="pt-0 position-relative pull-top mb-5" id="jumbotron-card">
        <div class="container">
            <div class="rounded shadow p-5 bg-white">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-0 text-center">
                        <h3 class="font-weight-bold text-capitalize h5 ">MOTTO</h3>
                        <p class="regular text-muted">{{ $profile->motto ?? 'Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah' }}</p>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
                        <h3 class="font-weight-bold text-capitalize h5 ">AFIRMASI</h3>
                        <p class="regular text-muted">{{ $profile->afirmasi ?? 'Padamu negeri - kami berjanji - lulus Wikrama siap membangun negeri' }}</p>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
                        <h3 class="font-weight-bold text-capitalize h5 ">ATTITUDE</h3>
                        <p class="regular text-muted">{{ $profile->attitude ?? 'Aku ada lingkunganku bahagia' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="mt-0 padding-bottom-0 pl-0 pr-0 pb-0 pt-3 pt-sm-0" id="jurusan">
        <div class="related mt-sm-5 mt-3 mb-sm-5 mb-3 px-2 px-md-5">
            <h2 class="pl-3 font-weight-bold mb-4">Jurusan</h2>
            <div class="row row-cols-3 row-cols-lg-3 g-4">
                @foreach($majors as $m)
                <div class="col-12 col-md-6 mb-4">
                    <a href="{{ route('major.detail', $m->slug) }}" class="cardd d-flex flex-column h-100 align-items-start text-decoration-none p-4 shadow-sm rounded bg-white">
                        <div class="catagory mb-2">
                            <h5 class="font-weight-bold" style="color: #02398c;">{{ $m->short_name ?? 'SMK' }}</h5>
                        </div>
                        <div class="name mb-2">
                            <h4 style="color: #0E0E0E; font-weight: 600;">{{ $m->name }}</h4>
                        </div>
                        <div class="desc pe-0" style="color: #858585;">
                            <strong>Keunggulan</strong><br>
                            {{ $m->advantages ?? $m->description }}
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    

    <!-- Superiority -->
    <section class="mt-0 pl-0 pr-0 pb-0 pt-3 pt-sm-0" id="features">
        <div class="wrapperInfo mt-sm-5 mt-3 mb-sm-5 mb-3">
            <div class="row">
                <div class="col-12 col-lg-6 content-col">
                    <div class="imagesWrapper">
                        <img src="/img/Gedung.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row content">
                        <div class="col-6">
                            <iframe
                                src="https://www.youtube.com/embed/XVoDV4ry3HA">
                            </iframe>
                        </div>
                        <div class="col-6 wrapperText">
                            <div class="text">
                                <h5 class="font-weight-bold" style="color: #fbdd00;">Pembelajaran Akhlak & Kompetensi</h5>
                                <p class="text-white">Sekolah komputer, bisnis manajemen, dan pariwisata  yang mengutamakan pendidikan akhlak mulia untuk  melahirkan pemimpin "berhati Mekah berotak Jerman" melek teknologi di era 4.0.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row content">
                        <div class="col-6 wrapperText">
                            <div class="text">
                                <h5 class="font-weight-bold" style="color: #fbdd00">SMK Unggul dan Berprestasi Nasional</h5>
                                <p class="text-white">SMK Wikrama 1 Garut termasuk 20% SMK unggul di Indonesia berdasarkan
                                    "Rapor Pendidikan Nasional" dari KEMENDIKBUD tahun 2025</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <iframe
                                src="https://www.youtube.com/embed/ZIlrnzOXZhQ">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ***** Prestasi & Kejuaraan Siswa SPMB Start ***** -->
    @if(isset($achievements) && $achievements->count() > 0)
    <section class="py-5" id="prestasi" style="background: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <span class="badge px-3 py-2 text-uppercase font-weight-bold" style="background-color: #fbdd00; color: #02398c; border-radius: 20px; font-size: 12px; letter-spacing: 1px;">Prestasi &amp; Kejuaraan</span>
                    <h2 class="font-weight-bold mt-2" style="color: #02398c;">Siswa &amp; Sekolah Berprestasi</h2>
                    <p class="text-muted" style="max-width: 600px; margin: 0 auto;">Bukti nyata keunggulan akademik, kompetensi teknologi, dan pembinaan karakter di SMK Wikrama 1 Garut</p>
                </div>
            </div>
            <div class="row">
                @foreach($achievements as $ach)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 16px; border: 1px solid #eef2f6; overflow: hidden; transition: transform 0.3s ease;">
                        @if($ach->image_url)
                        <div style="height: 190px; overflow: hidden; background: #f1f5f9; position: relative;">
                            <img src="{{ asset($ach->image_url) }}" alt="{{ $ach->title }}" class="w-100 h-100" style="object-fit: cover;">
                            <span class="badge position-absolute" style="top: 12px; right: 12px; background: rgba(2, 57, 140, 0.9); color: #fff; padding: 6px 12px; border-radius: 8px; font-size: 11px;">
                                {{ $ach->category ?? 'Prestasi' }}
                            </span>
                        </div>
                        @else
                        <div style="height: 100px; background: linear-gradient(135deg, #02398c, #1f3984); display: flex; align-items: center; justify-content: space-between; padding: 0 20px;">
                            <i class="fa fa-trophy" style="font-size: 32px; color: #fbdd00;"></i>
                            <span class="badge" style="background: rgba(255,255,255,0.2); color: #fff; padding: 5px 10px; border-radius: 6px; font-size: 11px;">
                                {{ $ach->category ?? 'Prestasi' }}
                            </span>
                        </div>
                        @endif
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge font-weight-bold" style="background: #fff8db; color: #946c00; font-size: 11px; padding: 4px 8px; border-radius: 6px;">
                                        {{ $ach->rank ?? 'Juara' }}
                                    </span>
                                    <span class="text-muted small font-weight-bold">Tahun {{ $ach->event_year }}</span>
                                </div>
                                <h5 class="card-title font-weight-bold mb-2" style="color: #001E42; font-size: 1.05rem; line-height: 1.4;">
                                    {{ $ach->title }}
                                </h5>
                                @if($ach->recipient_name)
                                <p class="small text-secondary mb-2" style="font-weight: 500;">
                                    <i class="fa fa-user text-warning mr-1"></i> {{ $ach->recipient_name }}
                                </p>
                                @endif
                                @if($ach->description)
                                <p class="card-text text-muted small" style="line-height: 1.5;">
                                    {{ Str::limit($ach->description, 120) }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- ***** Prestasi & Kejuaraan Siswa SPMB End ***** -->

    <!-- ***** Testimoni SPMB Start ***** -->
    <section class="mt-0 pb-0 pt-2" id="testimonials" style="background: #f8f9fa;">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="font-weight-bold mb-3" style="color: #02398c;">Testimoni</h2>
                <p class="text-muted">Apa kata alumni tentang SMK Wikrama 1 Garut</p>
            </div>
            <div class="timeline-carousel__item-wrapper" data-js="timeline-carousel">
                @foreach($testimonials as $t)
                <!--Timeline item-->
                <div class="timeline-carousel__item">
                    <div class="timeline-carousel__item-inner shadow rounded p-4 bg-white h-100 d-flex flex-column align-items-center text-center">
                        <span class="year badge bg-primary mb-2" style="font-size: 1rem;">{{ $t->graduation_year ?? 'Alumni' }}</span>
                        <span class="name font-weight-bold mb-2" style="color: #02398c;">{{ $t->name }}</span>
                        <p class="mb-2" style="font-style: italic;">"{{ $t->quote }}"</p>
                        <p class="major text-secondary mb-0">{{ $t->major ?? 'Alumni Wikrama' }}{{ $t->company ? ' • '.$t->company : '' }}</p>
                    </div>
                </div>
                <!--/Timeline item-->
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Testimoni SPMB End ***** -->
    

    <!-- ***** Contact Us Start ***** -->
    <section class="px-0 py-5" style="background: #02398c" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title font-weight-bold text-white">Hubungi Kami</h2>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->
            <div class="row mt-3">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
                    <h5 class="text-white font-weight-bold">Kontak Pendaftaran</h5>
                    <div class="contact-text">
                        <p class="text-white">Jl Ottista Kp Tanjung  RT 3 RW 13 Ds Pasawahan Kec Targong Kaler Kab Garut 44151
                            <br>info@smkwikrama1garut.sch.id
                        </p>
                        <p class="text-white">
                            Sundari : <a style="text-decoration: underline !important; font-weight: bold !important" href="https://wa.me/{{ $profile->whatsapp ?? '628112232880' }}">hubungi kami (klik disini)</a>
                        </p>
                        <a href="#contact-us" class="main-button">Daftar Sekarang</a>
                    </div>
                </div>

                <!-- ***** Contact Text End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" method="POST">
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Nama Lengkap" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="no_wa" type="text" class="form-control" id="no_wa" required="" value="+62">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Alamat Email" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Pesan" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Kirim Pesan</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->

    <!--============================
    =            Footer            =
    =============================-->
    <footer>
        <div class="footer-main bg-light px-0 pb-3 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-12"></div>
                    <div class="col-lg-5 col-md-5 m-md-auto align-self-center">
                        <div class="block m-auto">
                            <a href="#"><img src="/img/logo.png" alt="footer-logo" width="120" class="ml-2"></a>
                            <!-- Social Site Icons -->
                            <ul class="social-icon list-inline pl-4">
                                <li class="list-inline-item">
                                    <a href="linkedin.com/company/smkwikrama1garut/" target="_blank" style="background-color: #fbdd00; color: #333"><i class="ti-linkedin"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/smkwikrama1garut/" target="_blank" style="background-color: #fbdd00; color: #333"><i class="ti-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-5 col-12 mt-sm-5 mt-3 mt-lg-0 pl-4 pl-md-0">
                        <div class="block-2">
                            <!-- heading -->
                            <h6 class="text-dark">Tautan</h6>
                            <!-- links -->
                            <ul>
                                <li><a href="#beranda" class="active">Beranda</a></li>
                                <li><a href="#jurusan">Jurusan</a></li>
                                <li><a href="#features">Tentang Kami</a></li>
                                <li><a href="#testimonials">Testimoni</a></li>
                                <li><a href="#contact-us">Hubungi Kami</a></li>
                                <li><a href="{{ route('home') }}" target="_blank" style="color: #02398c; font-weight: bold;"><i class="fa fa-home"></i> Web Resmi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-7 mt-sm-5 mt-3 mt-lg-0 pl-4 pl-md-0">
                        <div class="block-2">
                            <!-- heading -->
                            <h6 class="text-dark">Kontak Sekolah</h6>
                            <!-- links -->
                            <ul>
                                <li class="font-weight-bold">628112232880</li>
                                <li>Alamat<br />
                                    Jl Otista Kp Tanjung<br />
                                    Desa Pasawahan <br />
                                    Kec Tarogong Kaler 44151</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center py-4 bg-light" style="border-top: 1px solid #5F6F94">
            <small class="text-secondary">Copyright &copy; <script>
                    document.write(new Date().getFullYear())
                </script> SMK Wikrama</small class="text-secondary">
        </div>
    </footer>

    <!-- To Top -->
    <div class="scroll-top-to">
        <i class="ti-angle-up"></i>
    </div>

    <!-- JAVASCRIPTS -->
    <script src="/assets/template/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/template/plugins/slick/slick.min.js"></script>
    <script src="/assets/template/plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="/assets/template/plugins/syotimer/jquery.syotimer.min.js"></script>
    <script src="/assets/template/plugins/aos/aos.js"></script>
    <script src="/assets/landing-page/js/scrollreveal.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
    <script src="/assets/template/plugins/google-map/gmap.js"></script>

    <!-- Global Init -->
    <script src="/assets/landing-page/js/custom.js"></script>

    <script src="/assets/template/js/script.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#contact').submit(function(e) {
            e.preventDefault();

            var urlForm = "{{ route('spmb.submit') }}";

            var data = {
                name: $('#name').val(),
                no_wa: $('#no_wa').val(),
                email: $('#email').val(),
                message: $('#message').val(),
            }

            $.ajax({
                type: 'POST',
                url: urlForm,
                data: data,
                cache: false,
                success: (data) => {
                    $("#success-msg").modal('show');
                    $('#contact')[0].reset();
                    setTimeout(function() {
                        $("#success-msg").modal('hide');
                    }, 3000);
                },
            });
        });
    </script>

    <script>
        $('.slick-cultivar').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 2.08,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1.2,
                        slidesToScroll: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 0.9,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 0.8,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 0.6,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 0.4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 350,
                    settings: {
                        slidesToShow: 0.4,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>

    <script>
        var myCarousel = document.querySelector('#heroCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            pause: 'hover',
            wrap: true
        });
    </script>

    <script>
        $.js = function(el) {
            return $('[data-js=' + el + ']')
        };

        function carousel() {
            $.js('timeline-carousel').slick({
                infinite: false,
                arrows: false,
                dots: true,
                autoplay: false,
                speed: 1100,
                slidesToShow: 2,
                slidesToScroll: 2,
                responsive: [{
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });
        }

        carousel();
    </script>
</body>

</html>
