@extends('layouts.frontend')

@section('content')

<main id="main-content">

    {{-- Page Header --}}
    <section class="page-header py-5">
        <div class="container">
            <div class="text-center">
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill mb-3">
                    <i class="fas fa-wifi me-2"></i>Internet Connection
                </span>

                <h1 class="display-5 fw-bold text-white mb-2">
                    Order Fiber Internet
                </h1>

                <p class="text-secondary mb-0">
                    Fill in your details and select your internet package.
                </p>
            </div>
        </div>
    </section>


    {{-- Order Section --}}
    <section class="pb-5">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8 col-xl-7">

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-circle-exclamation me-2"></i>
                                <strong>Please correct the following:</strong>
                            </div>

                            <ul class="mb-0 ps-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success rounded-4 border-0 shadow-sm mb-4">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif


                    {{-- Order Card --}}
                    <div class="order-card p-4 p-md-5 rounded-4 border border-success border-opacity-25"
                         style="
                            background: var(--tb-bg-card, #111827);
                            box-shadow: 0 20px 60px rgba(0,0,0,.25);
                         ">

                        <div class="text-center mb-4">

                            <div class="order-icon mx-auto mb-3">
                                <i class="fas fa-satellite-dish"></i>
                            </div>

                            <h2 class="text-white fw-bold mb-2">
                                Get Connected Today
                            </h2>

                            <p class="text-secondary mb-0">
                                Enter your information below and we'll contact you for installation.
                            </p>

                        </div>


                        {{-- Laravel Form --}}
                        <form
                            method="POST"
                            action="{{ route('order.store') }}"
                            id="internetOrderForm"
                            novalidate
                        >

                            @csrf


                            {{-- Full Name --}}
                            <div class="mb-4">

                                <label
                                    for="full_name"
                                    class="form-label text-white fw-semibold"
                                >
                                    Full Name
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-dark border-secondary text-success">
                                        <i class="fas fa-user"></i>
                                    </span>

                                    <input
                                        type="text"
                                        id="full_name"
                                        name="full_name"
                                        class="form-control bg-dark text-white border-secondary"
                                        value="{{ old('full_name') }}"
                                        placeholder="Enter your full name"
                                        maxlength="128"
                                        required
                                    >

                                </div>

                                @error('full_name')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Phone --}}
                            <div class="mb-4">

                                <label
                                    for="phone"
                                    class="form-label text-white fw-semibold"
                                >
                                    Phone Number
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-dark border-secondary text-success">
                                        <i class="fas fa-phone"></i>
                                    </span>

                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        class="form-control bg-dark text-white border-secondary"
                                        value="{{ old('phone') }}"
                                        placeholder="03XX-XXXXXXX"
                                        maxlength="32"
                                        required
                                    >

                                </div>

                                @error('phone')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Email + City --}}
                            <div class="row">

                                <div class="col-md-6 mb-4">

                                    <label
                                        for="email"
                                        class="form-label text-white fw-semibold"
                                    >
                                        Email
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text bg-dark border-secondary text-success">
                                            <i class="fas fa-envelope"></i>
                                        </span>

                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            class="form-control bg-dark text-white border-secondary"
                                            value="{{ old('email') }}"
                                            placeholder="your@email.com"
                                        >

                                    </div>

                                    @error('email')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                <div class="col-md-6 mb-4">

                                    <label
                                        for="city"
                                        class="form-label text-white fw-semibold"
                                    >
                                        City
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text bg-dark border-secondary text-success">
                                            <i class="fas fa-city"></i>
                                        </span>

                                        <input
                                            type="text"
                                            id="city"
                                            name="city"
                                            class="form-control bg-dark text-white border-secondary"
                                            value="{{ old('city', 'Lahore') }}"
                                            placeholder="Your city"
                                        >

                                    </div>

                                    @error('city')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                            </div>


                            {{-- Installation Address --}}
                            <div class="mb-4">

                                <label
                                    for="installation_address"
                                    class="form-label text-white fw-semibold"
                                >
                                    Installation Address
                                    <span class="text-danger">*</span>
                                </label>

                                <textarea
                                    id="installation_address"
                                    name="installation_address"
                                    class="form-control bg-dark text-white border-secondary"
                                    rows="4"
                                    maxlength="2000"
                                    placeholder="House number, street, area, city..."
                                    required
                                >{{ old('installation_address') }}</textarea>

                                @error('installation_address')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Package --}}
                            <div class="mb-4">

                                <label
                                    for="package_id"
                                    class="form-label text-white fw-semibold"
                                >
                                    Select Internet Package
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-dark border-secondary text-success">
                                        <i class="fas fa-gauge-high"></i>
                                    </span>

                                    <select
                                        id="package_id"
                                        name="package_id"
                                        class="form-select bg-dark text-white border-secondary"
                                        required
                                    >

                                        <option value="">
                                            — Select a package —
                                        </option>

                                        @foreach(
                                            \App\Models\Package::where('status', true)
                                            ->orderBy('price')
                                            ->get()
                                            as $p
                                        )

                                            <option
                                                value="{{ $p->id }}"
                                                data-price="{{ $p->price }}"
                                                data-name="{{ $p->name }}"
                                                data-speed="{{ $p->speed ?? '' }}"
                                                @selected(
                                                    old('package_id', optional($package)->id) == $p->id
                                                )
                                            >
                                                {{ $p->name }}
                                                @if(!empty($p->speed))
                                                    — {{ $p->speed }} Mbps
                                                @endif
                                                — Rs {{ number_format($p->price) }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                                @error('package_id')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Selected Package Summary --}}
                            <div
                                id="packageSummary"
                                class="mb-4 p-4 rounded-4 border border-success border-opacity-25"
                                style="background: rgba(0,0,0,.25); display:none;"
                            >

                                <div class="d-flex justify-content-between align-items-center mb-2">

                                    <span class="text-secondary">
                                        Selected Package
                                    </span>

                                    <i class="fas fa-circle-check text-success"></i>

                                </div>

                                <div
                                    id="packageNameDisplay"
                                    class="text-white fw-bold fs-5"
                                >
                                    —
                                </div>

                                <div
                                    id="packageSpeedDisplay"
                                    class="text-secondary small mt-1"
                                >
                                </div>

                                <div class="mt-3">

                                    <span class="text-secondary small d-block">
                                        Monthly Price
                                    </span>

                                    <span
                                        id="price_display"
                                        class="fs-3 fw-bold text-success"
                                    >
                                        —
                                    </span>

                                </div>

                            </div>


                            {{-- Message --}}
                            <div class="mb-4">

                                <label
                                    for="message"
                                    class="form-label text-white fw-semibold"
                                >
                                    Additional Message
                                    <span class="text-secondary fw-normal">
                                        (Optional)
                                    </span>
                                </label>

                                <textarea
                                    id="message"
                                    name="message"
                                    class="form-control bg-dark text-white border-secondary"
                                    rows="3"
                                    maxlength="2000"
                                    placeholder="Any additional information..."
                                >{{ old('message') }}</textarea>

                                @error('message')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- Submit Button --}}
                            <button
                                type="submit"
                                id="submitOrderBtn"
                                class="btn btn-success btn-lg w-100 rounded-pill py-3 fw-bold"
                            >

                                <i class="fab fa-whatsapp me-2 fs-5"></i>

                                Submit Order & Continue to WhatsApp

                            </button>


                            <div class="text-center mt-3">

                                <small class="text-secondary">

                                    <i class="fas fa-shield-halved me-1"></i>

                                    Your information is secure and will only be used for your internet order.

                                </small>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </section>

</main>


{{-- Order Page CSS --}}
<style>

    .page-header {
        background:
            radial-gradient(
                circle at top right,
                rgba(25, 135, 84, .15),
                transparent 40%
            ),
            linear-gradient(
                135deg,
                #07110d,
                #0b1511
            );
    }

    .order-card {
        backdrop-filter: blur(15px);
    }

    .order-icon {
        width: 72px;
        height: 72px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 22px;

        background: rgba(25, 135, 84, .12);

        border: 1px solid rgba(25, 135, 84, .3);

        color: #198754;

        font-size: 30px;

        box-shadow:
            0 10px 30px rgba(0,0,0,.2);
    }

    .form-control,
    .form-select,
    .input-group-text {
        min-height: 50px;
    }

    .form-control::placeholder {
        color: #6c757d;
    }

    .form-control:focus,
    .form-select:focus {
        background-color: #111827 !important;
        color: #fff !important;

        border-color: #198754 !important;

        box-shadow:
            0 0 0 .2rem rgba(25,135,84,.15) !important;
    }

    .input-group-text {
        min-width: 48px;
        justify-content: center;
    }

    #packageSummary {
        transition: all .25s ease;
    }

    #submitOrderBtn {
        transition: all .25s ease;
    }

    #submitOrderBtn:hover {
        transform: translateY(-2px);

        box-shadow:
            0 10px 25px rgba(25,135,84,.25);
    }

    #submitOrderBtn:active {
        transform: translateY(0);
    }

    @media (max-width: 576px) {

        .order-card {
            padding: 22px !important;
        }

        .page-header h1 {
            font-size: 2rem;
        }

    }

</style>


{{-- Order Page JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const packageSelect = document.getElementById('package_id');
    const priceDisplay = document.getElementById('price_display');
    const packageNameDisplay = document.getElementById('packageNameDisplay');
    const packageSpeedDisplay = document.getElementById('packageSpeedDisplay');
    const packageSummary = document.getElementById('packageSummary');

    const orderForm = document.getElementById('internetOrderForm');
    const submitButton = document.getElementById('submitOrderBtn');


    function updatePackageDetails() {

        const selectedOption =
            packageSelect.options[packageSelect.selectedIndex];


        if (!selectedOption || !selectedOption.value) {

            priceDisplay.textContent = '—';

            packageNameDisplay.textContent = '—';

            packageSpeedDisplay.textContent = '';

            packageSummary.style.display = 'none';

            return;
        }


        const price =
            parseFloat(
                selectedOption.getAttribute('data-price')
            );


        const packageName =
            selectedOption.getAttribute('data-name') || '';


        const speed =
            selectedOption.getAttribute('data-speed') || '';


        packageNameDisplay.textContent =
            packageName;


        if (speed) {

            packageSpeedDisplay.textContent =
                speed + ' Mbps Internet';

        } else {

            packageSpeedDisplay.textContent =
                '';

        }


        if (!isNaN(price)) {

            priceDisplay.textContent =
                Math.round(price).toLocaleString('en-PK') + ' PKR / Month';

        } else {

            priceDisplay.textContent =
                '—';

        }


        packageSummary.style.display =
            'block';
    }


    packageSelect.addEventListener(
        'change',
        updatePackageDetails
    );


    // Load selected package if available
    updatePackageDetails();


    // Prevent accidental double submission
    orderForm.addEventListener('submit', function () {

        if (!orderForm.checkValidity()) {

            return;
        }


        submitButton.disabled = true;

        submitButton.innerHTML =
            '<i class="fas fa-spinner fa-spin me-2"></i>' +
            'Submitting Order...';

    });

});
</script>

@endsection
