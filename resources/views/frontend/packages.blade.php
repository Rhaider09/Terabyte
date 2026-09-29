@extends('layouts.frontend')
@section('content')
    {{-- <section class="section"><div class="container"><h1 class="mb-5">Internet Packages</h1><div class="row g-4">
@foreach ($packages as $package)<div class="col-md-6 col-lg-4"><div class="card package p-4 h-100"><h3>{{ $package->name }}</h3><div class="price">Rs {{ number_format($package->price) }}</div><p>{{ $package->speed }} / month</p><ul>@foreach ($package->features ?? [] as $f)<li>{{ $f }}</li>@endforeach</ul><a href="{{ route('order.create',$package) }}" class="btn btn-primary">Order</a></div></div>@endforeach
</div></div></section> --}}

    <main id="main-content">

        <section class="page-header">
            <div class="container">
                <h1 class="display-5 fw-bold text-white mb-2">Internet packages</h1>
                <p class="text-secondary mb-0">Transparent pricing. Upgrade or downgrade as your needs change.</p>
            </div>
        </section>

        <section class="pb-5">
            <div class="container">
                <div class="row g-4">
                    @foreach ($packages as $package)
                        <div class="col-md-6 col-xl-4">
                            <article class="package-card">
                                <div class="card-header-custom">
                                    <h2 class="h5 text-white mb-1"> {{ $package->name }}</h2>
                                    <div class="package-speed"> {{ $package->speed ?? '15' }} <span class="fs-6 text-secondary fw-normal">Mbps</span></div>
                                </div>
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

    </main>
@endsection
