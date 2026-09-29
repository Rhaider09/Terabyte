@extends('layouts.frontend')
@section('content')
    <main id="main-content">
        <section class="hero-section">
            <div class="container position-relative">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-7">
                        <span class="hero-badge animate-fade-up"><i class="fas fa-bolt"></i> {{ $settings['hero_title'] ?? 'Next-gen fiber network' }}</span>
                        <h1 class="hero-title text-white mt-3 mb-4 animate-fade-up delay-1">
                            {{ $settings['hero_subtitle'] ?? 'Internet that moves at' }},<br> <span class="text-gradient">{{ $settings['hero_site_name'] ?? 'Terabyte Speed' }}</span>
                        </h1>
                        <p class="lead text-secondary mb-4 animate-fade-up delay-2" style="max-width: 32rem;">
                            {{ $settings['hero_Distraction'] ??
                                'Stream, game, and work without limits. Symmetric speeds, low ping, and local support teams — built for Pakistan’s connected future.
                                                                                    ' }}
                        </p>
                        <div class="d-flex flex-wrap gap-3 animate-fade-up delay-3">
                            <a href="{{ route('order.store') }}" class="btn btn-success btn-lg rounded-pill px-4"><i class="fas fa-shopping-cart me-2"></i>Order Now</a>
                            <a href="{{ route('packages') }}" class="btn btn-outline-light btn-lg rounded-pill px-4">View Packages</a>
                        </div>
                    </div>

                    <div class="col-lg-5 text-center text-lg-end">

                        <div class="p-4 rounded-4 border border-success border-opacity-25 bg-dark bg-opacity-50 animate-fade-up delay-2" style="backdrop-filter: blur(8px);">

                            <div class="display-3 fw-bold text-success mb-2">99.9%</div>

                            <div class="text-secondary small text-uppercase tracking-wide">Uptime commitment</div>

                            <hr class="border-secondary border-opacity-25 my-4">

                            <div class="row text-start g-3 small">

                                <div class="col-6"><i class="fas fa-check-circle text-success me-2"></i> Fiber to the premises</div>

                                <div class="col-6"><i class="fas fa-check-circle text-success me-2"></i> Same-day callbacks</div>

                                <div class="col-6"><i class="fas fa-check-circle text-success me-2"></i> Fair usage policy</div>

                                <div class="col-6"><i class="fas fa-check-circle text-success me-2"></i> Secure billing</div>
                                <div class="col-6"><i class="fas fa-check-circle text-success me-2"></i> Pay Your Bills Easily With jazz Cash</div>



                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <section class="py-5 border-top border-success border-opacity-25">

            <div class="container">

                <div class="text-center mb-5">

                    <h2 class="section-title text-white mb-2">Why choose us</h2>

                    <p class="section-sub mx-auto">Everything you expect from a premium ISP — performance, transparency, and people who pick up the phone.</p>

                </div>

                <div class="row g-4">

                    <div class="col-md-4">

                        <div class="feature-card">

                            <div class="feature-icon"><i class="fas fa-gauge-high"></i></div>

                            <h3 class="h5 text-white fw-semibold mb-2">High speed &amp; low latency</h3>

                            <p class="text-secondary small mb-0">Optimized routing and fiber backbone for smooth 4K streaming, cloud apps, and competitive gaming.</p>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="feature-card">

                            <div class="feature-icon"><i class="fas fa-headset"></i></div>

                            <h3 class="h5 text-white fw-semibold mb-2">24/7 human support</h3>

                            <p class="text-secondary small mb-0">Round-the-clock helpdesk on phone and WhatsApp — no endless hold music, just solutions.</p>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="feature-card">

                            <div class="feature-icon"><i class="fas fa-map-location-dot"></i></div>

                            <h3 class="h5 text-white fw-semibold mb-2">Growing coverage</h3>

                            <p class="text-secondary small mb-0">We’re expanding city by city. Check availability and get installed by certified technicians.</p>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        {{-- //package// --}}

        <section id="packages" class="py-5 bg-opacity-10" style="background: rgba(15, 31, 46, 0.5);">

            <div class="container">

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-end gap-3 mb-4">

                    <div>

                        <h2 class="section-title text-white mb-2">Internet packages</h2>

                        <p class="section-sub mb-0">Pick a plan that fits your household or office. All prices in PKR (monthly).</p>

                    </div>

                    <a href="packages.php" class="btn btn-outline-light rounded-pill">Compare all plans</a>

                </div>

                <div class="row g-4">
                    <div class="row g-4">
                        @foreach ($packages as $package)
                            <div class="col-md-6 col-xl-3">

                                <article class="package-card h-100">

                                    {{-- Card Header --}}
                                    <div class="card-header-custom">

                                        <h3 class="h5 text-white mb-1">
                                            {{ $package->name }}
                                        </h3>

                                        <div class="package-speed">
                                            {{ $package->speed ?? '15' }}

                                            <span class="fs-6 text-secondary fw-normal">
                                                Mbps
                                            </span>
                                        </div>

                                    </div>

                                    {{-- Card Body --}}
                                    <div class="p-4 flex-grow-1 d-flex flex-column">

                                        {{-- Price --}}
                                        <div class="package-price text-white mb-3">

                                            {{ number_format($package->price) }}

                                            <span class="fs-6 text-secondary fw-normal">
                                                PKR / {{ $package->billing_period }}
                                            </span>

                                        </div>

                                        {{-- Description --}}
                                        <p class="text-secondary small flex-grow-1">
                                            {{ $package->short_description }}
                                        </p>

                                        {{-- Features --}}
                                        @if (!empty($package->features))
                                            <ul class="package-features">

                                                @foreach ($package->features as $feature)
                                                    <li>
                                                        {{ $feature }}
                                                    </li>
                                                @endforeach

                                            </ul>
                                        @endif

                                        {{-- Order Button --}}
                                        <a href="{{ route('order.create', $package) }}" class="btn btn-success w-100 rounded-pill mt-2">
                                            Order Now
                                        </a>

                                    </div>

                                </article>

                            </div>
                        @endforeach

                    </div>



                </div>

        </section>


        <section class="py-5">
            <div class="container">

                <!-- Section Heading -->
                <div class="text-center mb-5">
                    <h2 class="section-title text-white mb-2">What customers say</h2>
                    <p class="section-sub mx-auto">Real feedback from subscribers on our network.</p>
                </div>

                <!-- Testimonials -->
                <div class="row g-4">

                    @foreach ($testimonials as $testimonial)
                        <div class="col-md-4">
                            <div class="testimonial-card h-100">

                                <!-- Dynamic Rating Stars -->
                                <div class="stars mb-2" aria-label="{{ $testimonial->rating }} out of 5 stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $testimonial->rating)
                                            <span class="text-warning">★</span>
                                        @else
                                            <span class="text-secondary">☆</span>
                                        @endif
                                    @endfor
                                </div>

                                <!-- Message -->
                                <p class="section-sub mx-auto">
                                    {{ $testimonial->message }}
                                </p>

                                <!-- Name -->
                                <div class="fw-semibold text-white">
                                    {{ $testimonial->name }}
                                </div>

                                <!-- Designation -->
                                <div class="small text-muted">
                                    {{ $testimonial->designation }}
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>



        <section class="py-5">

            <div class="container">

                <div class="cta-banner text-center text-lg-start">

                    <div class="row align-items-center gy-4">

                        <div class="col-lg-8">

                            <h2 class="h3 text-white fw-bold mb-2">Download IP TV APP</h2>

                            <p class="text-secondary mb-0">Get our latest IPTV app for smooth live TV streaming on your Android device.</p>

                        </div>

                        <div class="col-lg-4 text-lg-end">

                            <a href="https://terabytes.pk/apk/Pattan.apk" class="btn btn-success btn-lg rounded-pill px-5" download=""><i class="fas fa-download me-2"></i>Download Now</a>

                        </div>

                    </div>

                </div>

            </div>

        </section>
        <button type="button" class="speedtest-float-btn btn btn-success rounded-pill shadow" data-bs-toggle="modal" data-bs-target="#speedTestModal" aria-label="Open Internet Speed Test">
            <i class="fas fa-gauge-high me-2"></i>Speed Test
        </button>
        <div class="modal fade" id="speedTestModal" tabindex="-1" aria-labelledby="speedTestModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-dark border border-success border-opacity-25">
                    <div class="modal-header border-secondary border-opacity-25">
                        <h2 class="modal-title h5 text-white mb-0" id="speedTestModalLabel">Terabyte Internet Speed Test</h2>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0"><grammarly-extension data-grammarly-shadow-root="true" style="visibility: visible !important; position: absolute; top: 0px; left: 0px; pointer-events: none; margin: 0px; border: 0px; --rem: 16;" class="dnXmp"></grammarly-extension>
                        <iframe src="https://terabytes.speedtestcustom.com/" width="100%" height="650" frameborder="0" title="Terabyte IT Network Speed Test" spellcheck="false"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
