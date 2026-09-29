@extends('admin.layout') @section('content')
    <h1>{{ $package->exists ? 'Edit' : 'Add' }} Package</h1>
    <form method="POST" action="{{ $package->exists ? route('admin.packages.update', $package) : route('admin.packages.store') }}" class="card p-4 mt-4">@csrf @if ($package->exists)
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-md-6 mb-3"><label>Name</label><input name="name" class="form-control" value="{{ $package->name }}" required></div>
            <div class="col-md-6 mb-3"><label>Speed</label><input name="speed" class="form-control" value="{{ $package->speed }}" required></div>
            <div class="col-md-4 mb-3"><label>Price</label><input name="price" type="number" step="0.01" class="form-control" value="{{ $package->price }}" required></div>
            <div class="col-md-4 mb-3"><label>Billing</label><input name="billing_period" class="form-control" value="{{ $package->billing_period ?: 'month' }}" required></div>
            <div class="col-md-4 mb-3"><label>Install Fee</label><input name="installation_fee" type="number" step="0.01" class="form-control" value="{{ $package->installation_fee }}"></div>
        </div>
        <label>Description</label>
        <textarea name="short_description" class="form-control mb-3">{{ $package->short_description }}</textarea><label>Features (one per line)</label>
        <textarea name="features" class="form-control mb-3" rows="6">{{ implode("\n", $package->features ?? []) }}</textarea>
        <div class="form-check mb-3"><input class="form-check-input" type="checkbox" name="router_included" value="1" @checked($package->router_included)><label class="form-check-label">Router included</label></div>
        <div class="form-check mb-3"><input class="form-check-input" type="checkbox" name="status" value="1" @checked($package->exists ? $package->status : true)><label class="form-check-label">Active</label></div><button class="btn btn-primary">Save</button>
    </form>
@endsection
