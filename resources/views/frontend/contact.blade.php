@extends('layouts.frontend')
@section('content')
    {{-- <section class="section"><div class="container"><h1>Contact Us</h1>@if (session('success'))<div class="alert alert-success">{{session('success')}}</div>@endif
<form method="POST" class="col-lg-8 mt-4">@csrf<input name="name" class="form-control mb-3" placeholder="Name" required><input name="email" type="email" class="form-control mb-3" placeholder="Email" required><input name="phone" class="form-control mb-3" placeholder="Phone"><textarea name="message" class="form-control mb-3" rows="6" placeholder="Message" required></textarea><button class="btn btn-primary">Send Message</button></form></div></section> --}}

    <main id="main-content">



        <section class="page-header">

            <div class="container">

                <h1 class="display-5 fw-bold text-white mb-2">Contact us</h1>

                <p class="text-secondary mb-0">We’re here to help with new orders, billing, and technical support.</p>

            </div>

        </section>



        <section class="pb-5">

            <div class="container">

                <div class="row g-4">

                    <div class="col-lg-6">

                        <div class="feature-card h-100">

                            <div class="feature-icon"><i class="fas fa-phone-volume"></i></div>

                            <h2 class="h5 text-white mb-3">Phone &amp; WhatsApp</h2>

                            <p class="text-secondary mb-3">Call or message us anytime. For fastest response on orders, use WhatsApp.</p>

                            <p class="mb-2"><strong class="text-white">{{ $settings['phone'] ?? '0323-0436771' }}</strong></p>


                            @php
                                $whatsapp = $settings['whatsapp'] ?? '';
                                $whatsapp = preg_replace('/[^0-9]/', '', $whatsapp);

                                // Pakistan number: 0323xxxxxxx → 92323xxxxxxx
                                if (str_starts_with($whatsapp, '0')) {
                                    $whatsapp = '92' . substr($whatsapp, 1);
                                }
                            @endphp

                            <li>
                                {{-- <a href="https://wa.me/923230436771" class="btn btn-success rounded-pill" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp me-2"></i>Chat on WhatsApp</a> --}}
                                <a href="https://wa.me/{{ $whatsapp }}" class="btn btn-success rounded-pill" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-whatsapp"></i>
                                    WhatsApp
                                </a>
                            </li>

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <div class="feature-card h-100">

                            <div class="feature-icon"><i class="fas fa-envelope-open-text"></i></div>

                            <h2 class="h5 text-white mb-3">Email</h2>

                            <p class="text-secondary mb-3">For corporate quotes and partnership inquiries.</p>

                            <a href="mailto:Sales@terabyts.pk" class="text-success text-decoration-none fw-semibold">{{ $settings['email'] ?? 'info@example.com' }}</a>

                        </div>

                    </div>

                    <div class="col-12">

                        <div class="feature-card">

                            <div class="feature-icon"><i class="fas fa-map-marker-alt"></i></div>

                            <h2 class="h5 text-white mb-2">Office Address</h2>

                            <p class="text-secondary mb-0">

                                <br>

                               {{ $settings['address'] ?? 'Lahore, Punjab, Pakistan' }},<br>

                               {{ $settings['phone'] ?? '0323-0436771' }} .<br>



                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>



    </main>
@endsection
