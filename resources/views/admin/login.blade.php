<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In – Administrator SMK Wikrama 1 Garut</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/cropped-logo-wikrama.png') }}">
    <link rel="icon" href="{{ asset('assets/images/cropped-logo-wikrama.png') }}">

    <!-- Google Fonts: Poppins & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --wikrama-navy: #001E42;
            --wikrama-navy-dark: #00142E;
            --wikrama-blue: #1F3984;
            --wikrama-gold: #FFF500;
            --wikrama-amber: #F59E0B;
            --wikrama-border: #E2E8F0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            /* Background menyesuaikan warna resmi Wikrama (Deep Navy Blue) */
            background: linear-gradient(135deg, #00142E 0%, #001E42 50%, #152B68 100%);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
            color: #1E293B;
        }

        /* Subtle ambient lighting on Wikrama background */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 85% 15%, rgba(31, 57, 132, 0.4) 0%, transparent 60%),
                        radial-gradient(circle at 15% 85%, rgba(255, 245, 0, 0.04) 0%, transparent 50%);
            pointer-events: none;
        }

        .font-heading {
            font-family: 'Poppins', sans-serif;
        }

        /* Login Card Container */
        .login-card {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45);
            border: 1px solid rgba(255, 255, 255, 0.15);
            position: relative;
            z-index: 1;
            padding: 44px 40px;
            max-width: 860px;
            width: 100%;
        }

        /* Logo menyatu secara alami tanpa frame kotak putih */
        .logo-blend {
            width: 74px;
            height: 74px;
            object-fit: contain;
            display: block;
            margin: 0 auto 14px auto;
            filter: drop-shadow(0 4px 12px rgba(0, 30, 66, 0.15));
            transition: transform 0.3s ease;
        }

        .logo-blend:hover {
            transform: scale(1.05);
        }

        /* Input Controls */
        .form-control-custom {
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 0.95rem;
            color: #0F172A;
            background-color: #FFFFFF;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            border-color: var(--wikrama-blue);
            box-shadow: 0 0 0 3px rgba(31, 57, 132, 0.15);
            outline: none;
        }

        /* Password input group */
        .input-group-custom .form-control {
            border: 1px solid #CBD5E1;
            border-right: none;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            padding: 12px 14px;
            font-size: 0.95rem;
        }

        .input-group-custom .form-control:focus {
            border-color: var(--wikrama-blue);
            box-shadow: none;
        }

        .input-group-custom .btn-toggle-eye {
            border: 1px solid #CBD5E1;
            border-left: none;
            background-color: #FFFFFF;
            color: #64748B;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            padding: 0 14px;
            transition: color 0.2s ease;
        }

        .input-group-custom .btn-toggle-eye:hover {
            color: var(--wikrama-navy);
        }

        .input-group-custom:focus-within {
            border-color: var(--wikrama-blue);
        }

        .input-group-custom:focus-within .form-control,
        .input-group-custom:focus-within .btn-toggle-eye {
            border-color: var(--wikrama-blue);
        }

        /* Solid Dark Login Button */
        .btn-login-dark {
            background-color: var(--wikrama-navy);
            border: 1px solid var(--wikrama-navy);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 13px 20px;
            border-radius: 8px;
            width: 100%;
            transition: all 0.25s ease;
        }

        .btn-login-dark:hover {
            background-color: var(--wikrama-blue);
            border-color: var(--wikrama-blue);
            color: #ffffff;
            box-shadow: 0 6px 18px rgba(0, 30, 66, 0.25);
            transform: translateY(-1px);
        }

        .btn-login-dark:active {
            transform: translateY(0);
        }

        /* Vertical Divider between Form and Quick Actions */
        .vertical-divider-col {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .vertical-divider-line {
            width: 1px;
            background-color: var(--wikrama-border);
            height: 85%;
            position: absolute;
        }

        .vertical-divider-text {
            background-color: #ffffff;
            position: relative;
            padding: 8px 0;
            color: #94A3B8;
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: lowercase;
        }

        /* Right Side Portal Action Buttons (Template Style) */
        .btn-portal-action {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            padding: 12px 18px;
            border: 1px solid #CBD5E1;
            border-radius: 8px;
            background-color: #FFFFFF;
            color: #1E293B;
            font-weight: 500;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.2s ease;
            margin-bottom: 14px;
        }

        .btn-portal-action:hover {
            background-color: #F8FAFC;
            border-color: #94A3B8;
            color: var(--wikrama-navy);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transform: translateY(-1px);
        }

        .btn-portal-action:last-child {
            margin-bottom: 0;
        }

        .portal-icon {
            font-size: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .form-check-input:checked {
            background-color: var(--wikrama-navy);
            border-color: var(--wikrama-navy);
        }

        .form-check-input:focus {
            border-color: var(--wikrama-blue);
            box-shadow: 0 0 0 0.25rem rgba(31, 57, 132, 0.15);
        }

        @media (max-width: 767.98px) {
            .login-card {
                padding: 32px 22px;
            }
            .vertical-divider-col {
                margin: 24px 0;
            }
            .vertical-divider-line {
                width: 100%;
                height: 1px;
            }
            .vertical-divider-text {
                padding: 0 12px;
            }
        }
    </style>
</head>
<body>

    <div class="login-card">

        <!-- Logo Sekolah Menyatu Bersih Tanpa Frame Kotak -->
        <div class="text-center">
            <a href="{{ route('home') }}" title="SMK Wikrama 1 Garut">
                <img src="{{ asset('assets/images/wikrama-logo-1.png') }}" 
                     alt="Logo SMK Wikrama 1 Garut" 
                     class="logo-blend">
            </a>
            <h2 class="font-heading fw-bold mb-1" style="color: var(--wikrama-navy); font-size: 1.85rem;">
                Sign in
            </h2>
            <p class="text-muted small mb-4">
                Portal Administrator CMS • <a href="{{ route('home') }}" class="text-decoration-none fw-semibold" style="color: var(--wikrama-blue);">SMK Wikrama 1 Garut</a>
            </p>
        </div>

        <!-- Alerts: Success / Error -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4 py-2.5 rounded-3 border-0 shadow-sm" role="alert" style="background-color: #ECFDF5; color: #065F46;">
                <i class="bi bi-check-circle-fill text-success fs-5"></i>
                <div class="small fw-medium">{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-4 py-2.5 rounded-3 border-0 shadow-sm" role="alert" style="background-color: #FEF2F2; color: #991B1B;">
                <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
                <div class="small fw-medium">{{ $errors->first() }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- 2-Column Split: Form (Left) & Quick Actions (Right) with "or" Divider -->
        <div class="row align-items-center">

            <!-- Left Column: Login Inputs & Submit Button -->
            <div class="col-12 col-md-6 pe-md-3">
                <form action="{{ route('admin.login.submit') }}" method="POST" novalidate>
                    @csrf

                    <!-- Email Input -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary mb-1" for="adminEmail">
                            Email
                        </label>
                        <input type="email" 
                               name="email" 
                               id="adminEmail" 
                               value="{{ old('email', 'admin@smkwikrama1garut.sch.id') }}" 
                               required 
                               autocomplete="email"
                               class="form-control form-control-custom @error('email') is-invalid @enderror" 
                               placeholder="admin@smkwikrama1garut.sch.id">
                        @error('email')
                            <div class="text-danger small mt-1" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Input with Toggle Eye -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary mb-1" for="adminPassword">
                            Password
                        </label>
                        <div class="input-group input-group-custom">
                            <input type="password" 
                                   name="password" 
                                   id="adminPassword" 
                                   required 
                                   autocomplete="current-password"
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="••••••••">
                            <button class="btn btn-toggle-eye" 
                                    type="button" 
                                    id="togglePassword" 
                                    title="Tampilkan / Sembunyikan Kata Sandi">
                                <i class="bi bi-eye" id="togglePasswordIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1" style="font-size: 12px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password / Helper -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                            <label class="form-check-label small text-muted" for="rememberMe">
                                Remember me
                            </label>
                        </div>
                        <span class="text-muted small" style="font-size: 12px;" title="Kredensial Default Administrator">
                            Default: <strong class="text-dark">admin123</strong>
                        </span>
                    </div>

                    <!-- Log In Button -->
                    <button type="submit" class="btn btn-login-dark">
                        Log in
                    </button>
                </form>
            </div>

            <!-- Middle Divider with "or" -->
            <div class="col-12 col-md-1 vertical-divider-col py-2 py-md-0">
                <div class="vertical-divider-line"></div>
                <div class="vertical-divider-text">or</div>
            </div>

            <!-- Right Column: Portal Shortcuts (Bootstrap Template Style) -->
            <div class="col-12 col-md-5 ps-md-3">
                <div class="d-flex flex-column justify-content-center h-100">
                    
                    <!-- Button 1: Website Utama -->
                    <a href="{{ route('home') }}" class="btn-portal-action">
                        <span class="portal-icon text-primary">
                            <i class="bi bi-globe2"></i>
                        </span>
                        <span>Continue to Website Utama</span>
                    </a>

                    <!-- Button 2: Portal SPMB -->
                    <a href="{{ route('spmb') }}" class="btn-portal-action">
                        <span class="portal-icon text-warning">
                            <i class="bi bi-mortarboard-fill"></i>
                        </span>
                        <span>Continue to Portal SPMB</span>
                    </a>

                    <!-- Button 3: WhatsApp Helpdesk -->
                    <a href="https://wa.me/6281323314430" target="_blank" rel="noopener noreferrer" class="btn-portal-action">
                        <span class="portal-icon text-success">
                            <i class="bi bi-whatsapp"></i>
                        </span>
                        <span>Helpdesk IT Administrator</span>
                    </a>

                </div>
            </div>

        </div>

        <!-- Footer Copyright -->
        <div class="text-center text-muted small mt-4 pt-3 border-top" style="font-size: 12px;">
            &copy; {{ date('Y') }} SMK Wikrama 1 Garut • Seluruh Hak Cipta Dilindungi.
        </div>

    </div>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Interactive Show/Hide Password Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePasswordBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('adminPassword');
            const toggleIcon = document.getElementById('togglePasswordIcon');

            if (togglePasswordBtn && passwordInput && toggleIcon) {
                togglePasswordBtn.addEventListener('click', function () {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    toggleIcon.classList.toggle('bi-eye', !isPassword);
                    toggleIcon.classList.toggle('bi-eye-slash', isPassword);
                });
            }
        });
    </script>
</body>
</html>
