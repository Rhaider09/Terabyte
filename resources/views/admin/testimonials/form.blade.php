@extends('admin.layout') @section('content')
    <h1>
        Testimonial</h1>
    <form method="POST" action="{{ $item->exists ? route('admin.testimonials.update', $item) : route('admin.testimonials.store') }}" class="card p-4 mt-3">@csrf @if ($item->exists)
            @method('PUT')
        @endif
        <input name="name" class="form-control mb-3" placeholder="Name" value="{{ $item->name }}" required><input name="designation" class="form-control mb-3" placeholder="Designation" value="{{ $item->designation }}">
        <textarea name="message" class="form-control mb-3" required>{{ $item->message }}</textarea><input name="rating" type="number" min="1" max="5" class="form-control mb-3" value="{{ $item->rating ?: 5 }}"><button class="btn btn-primary">Save</button>
    </form>
@endsection
