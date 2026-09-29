@extends('layouts.frontend')

@section('content')

<main id="main-content">

    <section
        class="order-success-section py-5"
        style="
            min-height: 70vh;
            display: flex;
            align-items: center;
        "
    >

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-7 col-md-9">

                    <div
                        class="success-card text-center p-4 p-md-5 rounded-4"
                        style="
                            background: var(--tb-bg-card, #111827);
                            border: 1px solid rgba(25,135,84,.25);
                            box-shadow: 0 20px 60px rgba(0,0,0,.25);
                        "
                    >

                        {{-- Success Icon --}}
                        <div class="success-icon mx-auto mb-4">

                            <i class="fas fa-check"></i>

                        </div>


                        {{-- Heading --}}
                        <h1 class="text-white fw-bold mb-3">
                            Order Received!
                        </h1>


                        {{-- Message --}}
                        <p class="text-secondary fs-5 mb-4">

                            Thank you for choosing
                            <strong class="text-success">
                                Terabyte IT Network
                            </strong>.

                            Your internet order has been saved successfully.

                        </p>


                        {{-- Order Number --}}
                        <div
                            class="order-number-box rounded-4 p-4 mb-4"
                            style="
                                background: rgba(0,0,0,.25);
                                border: 1px solid rgba(255,255,255,.08);
                            "
                        >

                            <span
                                class="text-secondary d-block small mb-1"
                            >
                                Your Order Number
                            </span>

                            <span
                                class="text-success fw-bold fs-2"
                            >
                                #{{ $order->id }}
                            </span>

                        </div>


                        {{-- WhatsApp Button --}}
                        @if ($whatsappUrl)

                            <a
                                href="{{ $whatsappUrl }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn btn-success btn-lg rounded-pill px-4 py-3 fw-bold mb-3 w-100"
                            >

                                <i class="fab fa-whatsapp me-2 fs-5"></i>

                                Continue on WhatsApp

                            </a>

                            <p class="text-secondary small mb-4">

                                Click the button above to send your order details
                                to our WhatsApp team.

                            </p>

                        @endif


                        {{-- Home Button --}}
                        <a
                            href="{{ route('home') }}"
                            class="btn btn-outline-light rounded-pill px-4 py-2"
                        >

                            <i class="fas fa-home me-2"></i>

                            Back to Home

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>


<style>

    .order-success-section {
        background:
            radial-gradient(
                circle at center,
                rgba(25,135,84,.08),
                transparent 55%
            );
    }


    .success-card {
        backdrop-filter: blur(15px);
    }


    .success-icon {

        width: 90px;
        height: 90px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: rgba(25,135,84,.12);

        border: 2px solid rgba(25,135,84,.35);

        color: #198754;

        font-size: 40px;

        box-shadow:
            0 0 0 10px rgba(25,135,84,.04),
            0 15px 40px rgba(0,0,0,.2);

        animation: successPop .5s ease-out;
    }


    .order-number-box {
        transition: transform .2s ease;
    }


    .order-number-box:hover {
        transform: translateY(-2px);
    }


    @keyframes successPop {

        0% {
            transform: scale(.5);
            opacity: 0;
        }

        70% {
            transform: scale(1.08);
            opacity: 1;
        }

        100% {
            transform: scale(1);
        }

    }

</style>

@endsection
