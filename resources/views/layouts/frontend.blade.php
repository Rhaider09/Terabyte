<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $settings['site_name'] ?? 'Terabyte' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #0d6efd;
            --dark: #07111f
        }

        body {
            font-family: Arial, sans-serif;
            color: #172033
        }

        .navbar {
            background: #fff
        }

        .hero {
            background: linear-gradient(135deg, #07111f, #0d6efd);
            color: #fff;
            padding: 100px 0
        }

        .section {
            padding: 75px 0
        }

        .package {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 10px 35px #07111f12;
            transition: .2s
        }

        .package:hover {
            transform: translateY(-5px)
        }

        .price {
            font-size: 34px;
            font-weight: 800;
            color: var(--primary)
        }

        footer {
            background: #07111f;
            color: #fff;
            padding: 50px 0
        }
    </style>
    <style>
        /* Terabyte IT Network — Dark + Green Tech Theme */

        :root {
            --tb-bg-deep: #050d18;
            --tb-bg-card: #0f1f2e;
            --tb-bg-elevated: #132536;
            --tb-green: #22c55e;
            --tb-green-dim: #16a34a;
            --tb-green-glow: rgba(34, 197, 94, 0.35);
            --tb-text: #e2e8f0;
            --tb-muted: #94a3b8;
            --tb-border: rgba(34, 197, 94, 0.2);
            --tb-font: 'Plus Jakarta Sans', system-ui, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--tb-font);
            background: var(--tb-bg-deep);
            color: var(--tb-text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .skip-link {
            position: absolute;
            left: -9999px;
            z-index: 9999;
            padding: 0.5rem 1rem;
            background: var(--tb-green);
            color: #000;
        }

        .skip-link:focus {
            left: 1rem;
            top: 1rem;
        }

        .navbar {
            background: linear-gradient(180deg, rgba(5, 13, 24, 0.98) 0%, rgba(10, 22, 40, 0.95) 100%) !important;
            backdrop-filter: blur(12px);
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--tb-green) 0%, var(--tb-green-dim) 100%);
            color: #042;
            font-size: 1.1rem;
        }

        .navbar .nav-link {
            color: var(--tb-muted) !important;
            font-weight: 500;
            padding: 0.5rem 0.85rem !important;
            border-radius: 0.5rem;
            transition: color 0.2s, background 0.2s;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #fff !important;
            background: rgba(34, 197, 94, 0.12);
        }

        .hero-section {
            position: relative;
            padding: 4rem 0 5rem;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 50% at 50% -20%, var(--tb-green-glow), transparent 55%),
                radial-gradient(ellipse 60% 40% at 100% 50%, rgba(34, 197, 94, 0.08), transparent 50%);
            pointer-events: none;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.35rem 0.9rem;
            border-radius: 999px;
            background: rgba(34, 197, 94, 0.12);
            border: 1px solid var(--tb-border);
            color: var(--tb-green);
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3.25rem);
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: -0.02em;
        }

        .text-gradient {
            background: linear-gradient(90deg, #4ade80, #22c55e, #86efac);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--tb-green) 0%, var(--tb-green-dim) 100%);
            border: none;
            font-weight: 600;
            box-shadow: 0 4px 24px var(--tb-green-glow);
        }

        .btn-success:hover {
            filter: brightness(1.08);
            transform: translateY(-1px);
        }

        .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.25);
            color: var(--tb-text);
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.4);
            color: #fff;
        }

        .pulse-btn {
            animation: pulse-soft 2.5s ease-in-out infinite;
        }

        @keyframes pulse-soft {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.35);
            }

            50% {
                box-shadow: 0 0 0 8px rgba(34, 197, 94, 0);
            }
        }

        .section-title {
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .section-sub {
            color: var(--tb-muted);
            max-width: 560px;
        }

        .feature-card {
            background: var(--tb-bg-card);
            border: 1px solid var(--tb-border);
            border-radius: 1rem;
            padding: 1.75rem;
            height: 100%;
            transition: transform 0.25s ease, border-color 0.25s, box-shadow 0.25s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            border-color: rgba(34, 197, 94, 0.45);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.35);
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(34, 197, 94, 0.15);
            color: var(--tb-green);
            font-size: 1.35rem;
            margin-bottom: 1rem;
        }

        .package-card {
            background: var(--tb-bg-card);
            border: 1px solid var(--tb-border);
            border-radius: 1rem;
            overflow: hidden;
            transition: transform 0.25s ease, border-color 0.25s, box-shadow 0.25s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .package-card:hover {
            transform: translateY(-6px);
            border-color: rgba(34, 197, 94, 0.5);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.4);
        }

        .package-card .card-header-custom {
            background: linear-gradient(135deg, var(--tb-bg-elevated) 0%, var(--tb-bg-card) 100%);
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--tb-border);
        }

        .package-speed {
            font-size: 2rem;
            font-weight: 800;
            color: var(--tb-green);
            line-height: 1;
        }

        .package-price {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .testimonial-card {
            background: var(--tb-bg-card);
            border: 1px solid var(--tb-border);
            border-radius: 1rem;
            padding: 1.5rem;
            height: 100%;
            transition: border-color 0.2s;
        }

        .testimonial-card:hover {
            border-color: rgba(34, 197, 94, 0.35);
        }

        .stars {
            color: #fbbf24;
            letter-spacing: 0.1em;
        }

        .cta-banner {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.15) 0%, var(--tb-bg-card) 50%, rgba(15, 31, 46, 0.9) 100%);
            border: 1px solid var(--tb-border);
            border-radius: 1.25rem;
            padding: 2.5rem 2rem;
        }

        .footer {
            background: linear-gradient(180deg, var(--tb-bg-deep) 0%, #020810 100%);
        }

        .footer-links a {
            color: var(--tb-muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--tb-green);
        }

        .whatsapp-float {
            position: fixed;
            width: 56px;
            height: 56px;
            bottom: 24px;
            right: 24px;
            background: #25d366;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            box-shadow: 0 6px 24px rgba(37, 211, 102, 0.45);
            z-index: 1050;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .whatsapp-float:hover {
            transform: scale(1.08);
            color: #fff;
            box-shadow: 0 8px 32px rgba(37, 211, 102, 0.55);
        }

        .speedtest-float-btn {
            position: fixed;
            right: 24px;
            bottom: 92px;
            z-index: 1045;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            background: var(--tb-bg-elevated);
            border: 1px solid var(--tb-border);
            color: var(--tb-text);
        }

        .form-control:focus,
        .form-select:focus {
            background: var(--tb-bg-elevated);
            border-color: var(--tb-green);
            color: var(--tb-text);
            box-shadow: 0 0 0 0.2rem rgba(34, 197, 94, 0.2);
        }

        .form-control::placeholder {
            color: var(--tb-muted);
        }

        .form-label {
            color: var(--tb-muted);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .page-header {
            padding: 3rem 0 2rem;
            background: linear-gradient(180deg, rgba(34, 197, 94, 0.08) 0%, transparent 100%);
        }

        .animate-fade-up {
            animation: fadeUp 0.7s ease forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        @media (max-width: 991px) {
            .hero-section {
                padding: 3rem 0 3.5rem;
            }

            .speedtest-float-btn {
                right: 16px;
                bottom: 88px;
                padding: 0.5rem 0.9rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top border-bottom border-success border-opacity-25 shadow-sm">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('home') }}">
                <span class="brand-icon rounded-2 d-inline-flex align-items-center justify-content-center">
                    <i class="fas fa-broadcast-tower"></i>
                </span>

                <span>
                    {{ $settings['site_name'] ?? 'Terabyte' }} <span class="text-success">{{ $settings['site_name_title'] ?? 'IT Network' }}</span>
                </span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">

                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <!-- Packages -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('packages') }}">
                            Packages
                        </a>
                    </li>

                    <!-- Order -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.create') }}">
                            Order
                        </a>
                    </li>

                    <!-- About -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            About
                        </a>
                    </li>

                    <!-- Contact -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>

                    <!-- Billing -->
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-outline-light btn-sm px-3 rounded-pill" href="https://terabytes.pk/billing/portal/login.php" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-file-invoice-dollar me-1"></i>
                            Billing
                        </a>
                    </li>

                    <!-- Order Now -->
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-success btn-sm px-3 rounded-pill pulse-btn" href="{{ route('order.create') }}">
                            <i class="fab fa-whatsapp me-1"></i>
                            Order Now
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>



    @yield('content')

    {{-- Footer --}}

    <footer class="footer mt-auto pt-5 pb-4 border-top border-success border-opacity-25">

        <div class="container">

            <div class="row g-4">

                <div class="col-lg-4">

                    <div class="d-flex align-items-center gap-2 mb-3">

                        <span class="brand-icon rounded-2 d-inline-flex align-items-center justify-content-center"><i class="fas fa-broadcast-tower"></i></span>

                        <span class="fw-bold fs-5">{{ $settings['site_name'] ?? 'Terabyte' }} <span class="text-success">IT Network</span></span>

                    </div>

                    <p class="text-secondary small mb-0">Enterprise-grade fiber connectivity for homes and businesses. Fast installs, fair pricing, and support that never sleeps.</p>

                </div>

                <div class="col-6 col-lg-2">

                    <h6 class="text-white fw-semibold mb-3">Quick Links</h6>

                    <ul class="list-unstyled small footer-links">

                        <li><a href="{{ route('home') }}">Home</a></li>

                        <li><a href="{{ route('packages') }}">Packages</a></li>

                        <li><a href="{{ route('order.create') }}">Order</a></li>

                        <li><a href="{{ route('about') }}">About Us</a></li>

                    </ul>

                </div>

                <div class="col-6 col-lg-3">

                    <h6 class="text-white fw-semibold mb-3">Support</h6>

                    <ul class="list-unstyled small footer-links">

                        <li><a href="{{ route('contact') }}">Contact</a></li>

                        @php
                            $whatsapp = $settings['whatsapp'] ?? '';
                            $whatsapp = preg_replace('/[^0-9]/', '', $whatsapp);

                            // Pakistan number: 0323xxxxxxx → 92323xxxxxxx
                            if (str_starts_with($whatsapp, '0')) {
                                $whatsapp = '92' . substr($whatsapp, 1);
                            }
                        @endphp

                        <li>
                            <a href="https://wa.me/{{ $whatsapp }}" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-whatsapp"></i>
                                WhatsApp
                            </a>
                        </li>

                        <li><span class="text-secondary">24/7 Helpdesk</span></li>

                    </ul>

                </div>

                <div class="col-lg-3">

                    <h6 class="text-white fw-semibold mb-3">Contact</h6>

                    <ul class="list-unstyled small text-secondary">

                        <li class="mb-2"><i class="fas fa-phone text-success me-2"></i> {{ $settings['phone'] ?? '0323-0436771' }} </li>

                        <li class="mb-2"><i class="fas fa-envelope text-success me-2"></i> {{ $settings['email'] ?? 'info@example.com' }} </li>

                        <li><i class="fas fa-map-marker-alt text-success me-2"></i> {{ $settings['address'] ?? 'Lahore, Punjab, Pakistan' }} </li>

                    </ul>

                </div>

            </div>

            <hr class="border-secondary border-opacity-25 my-4">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 small text-secondary">

                <span>© 2026 Terabyte IT Network. All rights reserved.</span>

                <span>Powerd by AriseTechnologies .</span>

            </div>

        </div>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
